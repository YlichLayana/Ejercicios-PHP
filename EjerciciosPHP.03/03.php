<?php

function ListaDiariosAleatorio()
{
    $diarios = array(
        'Marca' => "https://www.marca.com",
        'EL Pais' => '"https://www.elpais.com"',
        'El Mundo' => "https://www.elmundo.es",
        'La Vanguardia' => 'https://www.lavanguardia.com/',
        "La Razón" => "https://www.larazon.es"
    );
    
    
    $claveDiario = array_rand($diarios);
	echo "<h4>El Medio recomendado es: <a href=\"". $diarios[$claveDiario]. "\">$claveDiario</a></h4>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Diario Aleatorio </h2>
    <?= ListaDiariosAleatorio() ?>
</body>
</html>