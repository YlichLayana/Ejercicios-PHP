<?php

session_start();  //Tiene que estar en la primera linea
$varsesion = $_SESSION['cliente'];
$cesta = $_SESSION['cesta'];


//Si no existe el dato para crear la session no se cargara el formulario de carrito
if ($varsesion == null || $varsesion == '') {
    echo 'No hay session iniciada';
    die();
}


//En caso contrario si existe la session de usuario y carrito, muestra el formulario, si no.. muestra el contenido de lo comprado

if ($_POST) { // Si tenemos datos de formulario...
    //var_dump ($_POST);
    if (isset($_POST['NombreProducto'])) {
        $producto = $_POST['NombreProducto'];
    }

    if (isset($_POST['cunidades'])) {
        $unidades = $_POST['cunidades'];
    }

    //aqui me daba error
    //$cesta = $_SESSION['cesta'];  // Creamos el array  // La primera vez, se guarda vacia

    if (!isset($cesta)) { // Si no existe nada en la cesta

        $cesta[$producto] = intval($unidades); //$unidades;    // Grabo el primer producto en la ceta
    } else { // si la cesta ya existe
        $encontrado = 0;
        foreach ($cesta as $codigo => $cantidad) { // Para cada producto metido en la cesta...
            if ($codigo == $producto) { // Si el producto coincide con el introducido por el usuario (no es la primera vez q lo compra)
                $cesta[$codigo] += intval($unidades); //$unidades;
                $encontrado = 1;
            }
        }
        if (!$encontrado)
            $cesta[$producto] = intval($unidades); //$unidades;
    }
    $_SESSION["cesta"] = $cesta;
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>La fruteria del siglo XXI</h1>
    <h3>Realice su compra: <?= $_SESSION["cliente"] ?></h3>
    <form action="carrito_formulario.php" method="post">
        <label for="producto">Selecciona Fruta:</label>
        <select name="NombreProducto">
            <option value="Platano">Platano</option>
            <option value="Melon">Melon</option>
            <option value="Piña">Piña</option>
        </select>

        <label for="unidad">Cantidad: </label><input type="text" name="cunidades" />

        <input type="submit" name="accion" value="Añadir a cesta" />
        <button name="termina"> <a style="text-decoration: none;" href="cierre_session.php">Terminar</a> </button>
    </form>



    </textarea>
    <?php

    if (isset($cesta)) {
        //  LISTAR EL CONTENIDO DE $cesta

        echo "<br>Este es su pedido:<br />";
        foreach ($cesta as $NomProducto => $ncantidad) {
            if ($NomProducto != null || $ncantidad != null) {
                echo "Producto: $NomProducto => Cantidad: $ncantidad <br />";
            }
        }
    }

    

    ?>
</body>

</html>