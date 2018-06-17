<?php

require_once('includes/db.php');
  
$objDb = new db();
$link = $objDb->conecta_mysql();  


//-----------------CÓDIGO PARA FILTRAR A STRING-----------------
$string = file_get_contents('http://192.168.100.109/',0);
//echo $string;
$string2 = htmlspecialchars($string);
//echo $string2;
  if(preg_match('/Velocidade: [0-9]{3}/', $string2, $velocidade)){
    //echo '<br>' . $velocidade[0];
    $var1 = $velocidade[0];
  }

  if(preg_match('/Distancia: [0-9]{3}/', $string2, $distancia)){
    //echo '<br>' . $distancia[0];
    $var2 = $distancia[0];
  }

  if(preg_match('/Temperatura: [0-9]{3}/', $string2, $temperatura)){
    //echo '<br>' . $temperatura[0];
    $var3 = $temperatura[0];
  }

  if(preg_match('/[0-9]{3}/', $var1, $processado1)){
    //echo '<br>' . $processado1[0];
    $vel = $processado1[0];
  }
  
  
  if(preg_match('/[0-9]{3}/', $var2, $processado2)){
    //echo '<br>' . $processado2[0];
    $dist = $processado2[0];
  }
  
  if(preg_match('/[0-9]{3}/', $var3, $processado3)){
    //echo '<br>' . $processado3[0];
    $temp = $processado3[0];
  }
  
  //CÓDIGO SQL PARA FAZER A INSERÇÃO NO BANCO
  //$sql = "INSERT INTO tentativa1(velocidade, distancia, Temperatura) values ('$vel','$dist' ,'$temp')";

  
  //INSERE NO BANCO
  //mysqli_query($link, $sql);
?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>Exemplo de gráfico</title>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>


    <script type="text/javascript">
      google.load('visualization', '1.0', {'packages':['corechart']});
      google.setOnLoadCallback(function(){
        var json_text = $.ajax({url: "getDadosGrafico.php", dataType:"json", async: false}).responseText;
        var json = eval("(" + json_text + ")");
        var dados = new google.visualization.DataTable(json.dados);

        var chart = new google.visualization.LineChart(document.getElementById('area_grafico'));
        chart.draw(dados, json.config);
      });
    </script>
  </head>

  <body>
    <div id="area_grafico"></div>
  </body>
</html>


<!--
<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
      //montando o array com os dados
        var data = google.visualization.arrayToDataTable([
          ['m/s', 'Velocidade'],
          ['0',   0 ],
          ['1',  <?php  $vel; ?>  ],
          //['2',  <?php  $temp; ?> ],
          //['3',  1030  ]
        ]);
        //opçoes para o gráfico barras
        /*var options = {
          title: 'Performance',
          vAxis: {title: 'Anos',  titleTextStyle: {color: 'red'}}//legenda vertical
        };*/
        //instanciando e desenhando o gráfico barras
        //var barras = new google.visualization.BarChart(document.getElementById('barras'));
        //barras.draw(data, options);
        //opções para o gráfico linhas
        var options1 = {
          title: 'Velocidade',
          hAxis: {title: 'Segundos',  titleTextStyle: {color: 'red'}}//legenda na horizontal
        };
        //instanciando e desenhando o gráfico linhas
        var linhas = new google.visualization.LineChart(document.getElementById('linhas'));
        linhas.draw(data, options1);
         

         var options2 = {
          title: 'Distancia',
          hAxis: {title: 'metros por segundo',  titleTextStyle: {color: 'red'}}//legenda na horizontal
        };
        //instanciando e desenhando o gráfico linhas
        var linhas = new google.visualization.LineChart(document.getElementById('linhas1'));
        linhas.draw(data, options2); 
      }
    </script>
  </head>
  <body>
    <!-<div id="barras" style="width: 900px; height: 500px;"></div>
    <div id="linhas" style="width: 900px; height: 500px;"></div>
    <div id="linhas1" style="width: 900px; height: 500px;"></div>
  </body>
</html>
-->