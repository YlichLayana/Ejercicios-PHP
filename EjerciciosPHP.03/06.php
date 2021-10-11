<?php
function mostrarPais()
{
    include_once 'infopaises.php';// Incluyo la tabla de paises
    $MaxPoblacion = 0; //variable con la cual comenzare a comparar la cantidad del dato de poblacion
    $PaisPoblacionMayor = ""; //variable donde guardare el nombre del pais

    /* Aqui recorro el array paises que este a su vez contiene como clave un pais, que hace de un subarray el cual contiene claves que seria los datos del que contendran los paises como la capital y la poblacionejemplo:
    $paises = array('Nombrepais'=> array("Capital" => "nombre", "Poblacion" => "cantidad poblacion"))*/
    foreach ($paises as $Nombrepais => $dato) {
        if ($dato['Poblacion'] > $MaxPoblacion) {
            $PaisPoblacionMayor = $Nombrepais;
            $MaxPoblacion = $dato['Poblacion'];
        }
    }
    echo "País con más población: " . $PaisPoblacionMayor . " , Tiene " . $MaxPoblacion . " habitantes<br/>";
    // Obtengo sus ciudades

    echo "<table border=1><tr><td> Ciudades: </td>";
    $NombresCiudades = $ciudades[$PaisPoblacionMayor];
    foreach ($NombresCiudades as $valor) {
        echo "<td> $valor </td>";
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
    <h3>6. Incluir el archivo infopaises.php en un programa php (06.php) que me muestre el país que tiene mas población y el nombre de sus ciudades. El programa debe buscar en las tablas. Hacer otra versión (06v2.php) que ordene el array de países usando funciones de la librería y me muestre directamente la última posición, donde debe estar el máximo.</h3>
    <?php
    mostrarPais();
    ?>
</body>

</html>