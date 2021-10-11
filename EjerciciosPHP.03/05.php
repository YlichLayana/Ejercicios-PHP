<?php

function obtenerNumeros()
{
    $numAleatorio = []; //una manera mas actual de declarar un array vacio
    // $numAleatorio = array(); //otra forma mas antigua de declararlo

    for ($i = 0; $i < 6; $i++) {
        $aleatorios = random_int(1, 49);
        while (in_array($aleatorios, $numAleatorio)) { //buscamos que no este repetido
            $aleatorios = random_int(1, 49);
        }
        array_push($numAleatorio, $aleatorios);
    }

   /* foreach ($numAleatorio as $clave => $valor) {
        echo " $clave -> $valor <br> "; // No falla
    }*/

    return $numAleatorio;
}

function mostrarBonoLoto($arrayNums)
{
    echo "<table border=$1>";
    $complementario = array_rand($arrayNums); //posicion
    // echo "Indice o clave: $complementario";
    $BonoLoto = [];

    foreach ($arrayNums as $clave => $value) {
        if ($clave == $complementario) {
            $valorComplementario = $value;
        } else {
            array_push($BonoLoto, $value);
           sort($BonoLoto);
        }
    }
    //echo " => Valor Contenido [$valorComplementario]<br>";

    for ($fila = 1; $fila <= 1; $fila++) {
        echo "<tr>";
        foreach ($BonoLoto as $clave => $valor) {
            echo  "<td> $valor </td>";
        }
        echo "<td> complementario $valorComplementario </td>";
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
    <h4>Realizar un programa en PHP que muestre un posible resultado de la bonoloto:
        Se presentarán 6 números obtenidos aleatoriamente en el rango de 1 a 49 (ambos inclusives) Los 5 primeros forman la jugada ganadora y deberán presentar ordenados de menor a mayor en una tabla html; el sexto es el número complementario. Por supuesto los números no pueden repetirse.</h4>
    <?php
    $nums = obtenerNumeros();
    mostrarBonoLoto($nums)
    ?>
</body>

</html>