<?php

// Estrutura basica do grafico
$grafico = array(
    'dados' => array(
        'cols' => array(
            array('type' => 'number', 'label' => 'Velocidade'),
            array('type' => 'number', 'label' => 'velocidade')
        ),  
        'rows' => array()
    ),
    'config' => array(
        'title' => 'Velocidade',
        'width' => 400,
        'height' => 300
    )
);

// Consultar dados no BD
$pdo = new PDO('mysql:host=localhost;dbname=testinho', 'root', '');
$sql = 'SELECT velocidade, distancia FROM tentativa1';
//echo $sql;
$stmt = $pdo->query($sql);
while ($obj = $stmt->fetchObject()) {
    $grafico['dados']['rows'][] = array('c' => array(
        array('v' => $obj->velocidade),
        array('v' => $obj->velocidade)
    ));
}

// Enviar dados na forma de JSON
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($grafico);
exit(0);

?>