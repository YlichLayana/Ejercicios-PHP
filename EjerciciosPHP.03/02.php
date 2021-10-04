<?php

function ListaDiarios()
{
    $diarios = array('Marca' => 'yyyy', 'Pais' => 'xxxx', 'El Mundo' => 'oooo', 'La Vanguardia' => 'sssss', 'El ABC' => 'zzzz');

    foreach ($diarios as $clave => $valor) {
        echo "Diario: $clave direccion Web: $valor </br>"; // Muestra los paises con sus capitales
    }
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
    <?=ListaDiarios()?>
</body>

</html>