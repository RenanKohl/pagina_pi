<?php

// requisição da classe PHPlot
require_once 'includes/phplot.php';

/*------------------ COLETOR DE DADOS ------------------ */

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

/*	------------------ FIM COLETOR DE DADOS ------------------ */ 
  
// Array com dados de Ano x Índice de fecundidade Brasileira 1940-2000
// Valores por década
$data = array(
			array('' , 0 ),
             array('Velocidade' , $vel ), 
             array('Distancia' , $dist ),
             array('Temperatura' , $temp )
            /* array('1970' , 5.8 ),
             array('1980' , 4.4 ),
             array('1991' , 2.9 ),
             array('2000' , 2.3 )*/
             );     
# Cria um novo objeto do tipo PHPlot com 500px de largura x 350px de altura                 
$plot = new PHPlot(500 , 350);     
  
// Organiza Gráfico -----------------------------
$plot->SetTitle('Dados da telemetria');
# Precisão de uma casa decimal
$plot->SetPrecisionY(2);
# tipo de Gráfico em barras (poderia ser linepoints por exemplo)
$plot->SetPlotType("linepoints");
# Tipo de dados que preencherão o Gráfico text(label dos anos) e data (valores de porcentagem)
$plot->SetDataType("text-data");
# Adiciona ao gráfico os valores do array
$plot->SetDataValues($data);
// -----------------------------------------------
  
// Organiza eixo X ------------------------------
# Seta os traços (grid) do eixo X para invisível
$plot->SetXTickPos('none');
# Texto abaixo do eixo X
$plot->SetXLabel("");
# Tamanho da fonte que varia de 1-5
$plot->SetXLabelFontSize(2);
$plot->SetAxisFontSize(2);
// -----------------------------------------------
  
// Organiza eixo Y -------------------------------
# Coloca nos pontos os valores de Y
$plot->SetYDataLabelPos('plotin');
// -----------------------------------------------
  
// Desenha o Gráfico -----------------------------
$plot->DrawGraph();
// -----------------------------------------------


?>