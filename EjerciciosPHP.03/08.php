<?php

//include_once 'infopaises.php';// Incluyo la tabla de paises

function mostrarPais()
{
    include_once 'infopaises.php'; // Incluyo la tabla de paises
    echo "<table border=1>
    <tr>
        <th>País</th>
        <th>Capital</th>
        <th>Población</th>
        <th>Ciudades</th>
    </tr>
    <tr>";
    foreach ($paises as $pais => $dato) {
        echo "<tr></tr><td> $pais </td>";
        echo "<td> $dato[Capital] </td>";
        echo "<td> $dato[Poblacion]</td>";
        echo "<td>";
        foreach ($ciudades[$pais] as $ciudad) {
            echo " $ciudad, ";
        }
        echo "</td>";
    }
    echo "</tr></table>";
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
    <h1>Tabla de paises </h1>
    <?php mostrarPais(); ?>
</body>

</html>