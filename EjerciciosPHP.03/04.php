<?php

$ArrayDeportes = array(
    'Futbol'         => "img/futbol.jpg",
    'Baloncesto'     => "img/baloncesto.jpg",
    'Natacion'       => "img/natacion.jpg",
    'Karate'         => "img/karate.jpg",
    'Baseball'       => "img/baseball.jpg",
);

//funcion con la que muestro el array y su contenido en tabla
function MostrarArrayEnTabla($array)
{
    echo "<table border=$1>";
    echo "<tr>";
    echo "<th>Deporte</th>";
    echo "<th>logo</th>";
    echo "</tr>";

    foreach ($array as $clave => $valor) {
        echo "<tr>";
        echo "<td> $clave </td>";
        echo "<td> <img src= '$valor' alt='$clave'</td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>

<style>
    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 100;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h3>Crear una carpeta que se llame img y copiar en ella 5 ficheros de imágenes
        que muestre el logo de un deporte. Crear una array asociativo que almacene
        como clave el nombre del deporte y como valor la dirección de la imagen.
    </h3>
    <?php
    MostrarArrayEnTabla($ArrayDeportes);
    ?>

</body>

</html>