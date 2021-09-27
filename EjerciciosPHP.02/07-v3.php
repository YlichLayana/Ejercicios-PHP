<?php
//Esta funcion genera la tabla 
function generarHTMLTable($filas, $columnas)
{
    $BgColor=array('#B71C1C','#1B5E20','#1A237E ','#FFFFFF','#000000');
    $TamanioArray=count($BgColor)-1;
    
    echo "<table border=2>";
    for ($fila = 1; $fila <= $filas; $fila++) {
        echo "<tr>";
        for ($columna = 1; $columna <= $columnas; $columna++) {
            $indice=rand(0, $TamanioArray);
            $randomBGColor=$BgColor[$indice];
            echo "<td style='background-color:$randomBGColor'>  </td>";
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

        <h3>1º Versión  elegir entre 5 posibles valores: rojo,verde, azul, blanco y negro. </h3>
    <?php
    generarHTMLTable(10, 10)
    ?>
</body>

</html>