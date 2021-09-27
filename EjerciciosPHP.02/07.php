<?php

function generarHTMLTable($filas, $columnas)
{
    echo "<table border=2>";
    for ($fila = 1; $fila <= $filas; $fila++) {
        echo "<tr>";
        for ($columna = 1; $columna <= $columnas; $columna++) {
            $elegido = randomColor();
            echo "<td style='background-color:$elegido'>  </td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function randomColor()
{
    $str = "#";
    for ($i = 0; $i < 6; $i++) {
        $randNum = rand(0, 15);
        switch ($randNum) {
            case 10:
                $randNum = "A";
                break;
            case 11:
                $randNum = "B";
                break;
            case 12:
                $randNum = "C";
                break;
            case 13:
                $randNum = "D";
                break;
            case 14:
                $randNum = "E";
                break;
            case 15:
                $randNum = "F";
                break;
        }
        $str .= $randNum;
    }
    return $str;
}

?>

<style>
    table {
        width: 50%;
        height: 100%;
        border: 1px solid #000;
    }

    td {
        border: 1px solid #000;
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
    <?php
    generarHTMLTable(10, 10)
    ?>
</body>

</html>