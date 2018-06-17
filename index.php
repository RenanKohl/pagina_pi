<?php

//require_once('includes/phplot.php');
/*
require_once('includes/db.php');
	
$objDb = new db();
$link = $objDb->conecta_mysql();	

//-----------------CÓDIGO PARA FILTRAR A STRING-----------------
$string = file_get_contents('http://10.10.20.9/',0);
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
		echo '<br>' . $processado1[0];
		$vel = $processado1[0];
	}
	
	
	if(preg_match('/[0-9]{3}/', $var2, $processado2)){
		echo '<br>' . $processado2[0];
		$dist = $processado2[0];
	}
	
	if(preg_match('/[0-9]{3}/', $var3, $processado3)){
		echo '<br>' . $processado3[0];
		$temp = $processado3[0];
	}
	
	//CÓDIGO SQL PARA FAZER A INSERÇÃO NO BANCO
	//$sql = "INSERT INTO tentativa1(velocidade, distancia, Temperatura) values ('$vel','$dist' ,'$temp')";

	
	//INSERE NO BANCO
	//mysqli_query($link, $sql);
/* */
	echo '
			 <fieldset>
                 <img src="getGraph.php" alt="Dados da telemetria" title="Gráfico gerado com os dados coletados" />
             </fieldset>';	
?>