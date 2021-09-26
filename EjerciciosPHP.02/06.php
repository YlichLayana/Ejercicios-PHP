<?php

function CreaMuralla($valor)
{
    for ($fila = 1; $fila <= 3; $fila++) {
        for ($columna = 1; $columna <= $valor * 5 - 1; $columna++) {
            if ($fila == 1 || $fila == 2) {
                if ($columna % 5 == 0) {
                    echo "&nbsp" . "&nbsp" . "&nbsp" . "&nbsp" . "&nbsp" . "&nbsp" . "&nbsp" . "&nbsp";
                } else
                    echo '<img src="./Imagenes/ladrillo.png" width=50" height="45">' . " ";
            } else
                echo '<img src="./Imagenes/ladrillo.png" width="50" height="45">' . "&nbsp";
        }
        echo "</br>";
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

    <h2> Generar un número entre 1 y 10 y mostrar una muralla de asteriscos
        con tantas almenas como indique el usuario.
        Nota: una almena está formada dos filas de cuatro asterisco,
        y entre almena y almena hay un espacio.</h2>

    <?php
    $tamanio = 3;

    CreaMuralla($tamanio);
    ?>

</body>

</html>