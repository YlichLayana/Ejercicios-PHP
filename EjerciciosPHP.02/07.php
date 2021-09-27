<?php


function generarHTMLTable($filas, $columnas,  $contenidoColor)
{
   
    echo "<table border=2>";
    for ($fila = 1; $fila <= $filas; $fila++) {
        echo "<tr>";
        for ($columna = 1; $columna <= $columnas; $columna++) {
            
            echo "<td> &nbsp $contenidoColor</td>";
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
<?php
     
    $colores = array("rojo", "azul", "amarillo", "verde", "negro", "blanco");        
    $seleccionad= $colores[array_rand($colores)]; 
    echo $seleccionad;
    

    generarHTMLTable(5, 5,  $seleccionad)
    ?>
</body>
</html>