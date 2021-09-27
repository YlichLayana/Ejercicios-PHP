<?php
//Esta funcion genera la tabla 
function generarHTMLTable($filas, $columnas)
{
    $r = mt_rand(60, 255);
    $g = mt_rand(60, 255);
    $b = mt_rand(60, 255);
    $a = 1;

    echo "<table border=2>";
    for ($fila = 1; $fila <= $filas; $fila++) {
        echo "<tr>";
        for ($columna = 1; $columna <= $columnas; $columna++) {
            
            echo "<td style='background-color:rgba($r, $g , $b , $a)'>  </td>";
            $a=$a-0.01;
        }
        echo "</tr>";
    }
    echo "</table>";
}

?>

<style>
    table {
        width: 35%;
        height: 70%;
        border: 1px solid #000;
    }

    td {
        height: 30px;
        width: 30px;
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
    <h2> Realizar un programa que genere una tabla html de 10x10
        con casillas de 30x30 px donde cada casilla tenga un color aleatorio
        obtenido mediante una función que genera un color diferente en cada casilla.</h2>

        <h3>3º Versión en done se elige un color aleatorio y mostrar un degradado.</h3>
    <?php
    generarHTMLTable(10, 10)
    ?>
</body>

</html>