<?php

function generarHTMLTable ( $filas, $columnas, $borde,$contenido){
    echo "<table border=$borde>";
    for($fila=1; $fila<=$filas; $fila++){
        echo "<tr>";
        for($columna=1; $columna<=$columnas; $columna++){
            echo "<td>  $contenido</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
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
    <h2>Realizar y probar una función que genere el código HTML de tablas
        con un borde determinado, incluyendo en cada casilla el mismo texto.
    </h2>

    <?php
        $cantFilas= 5;
        $cantColumas=4 ;
        $bordes=4;
        $contenido="Ylich";

        generarHTMLTable($cantFilas, $cantColumas, $bordes, $contenido)
    ?>    

</body>

</html>