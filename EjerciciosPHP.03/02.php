<?php

function ListaDiarios()
{
    $diarios = array(
        'Marca' => "https://www.marca.com",
        'EL Pais' => '"https://www.elpais.com"',
        'El Mundo' => "https://www.elmundo.es",
        'La Vanguardia' => 'https://www.lavanguardia.com/',
        "La Razón" => "https://www.larazon.es"
    );
    echo "<ul>";
    
    foreach ($diarios as $clave => $valor) {
        echo "<li> <a href=\"$valor\">$clave</a> </li>"; // Muestra los paises con sus capitales
    }
    echo "</ul>";
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
    <h2>Lista de medios </h2>
    <?= ListaDiarios() ?>
</body>

</html>