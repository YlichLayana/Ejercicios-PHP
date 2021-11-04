<?php
    session_start();

    if (isset($_GET['nombre'])) {
        $cliente=$_GET['nombre'];
        $_SESSION['cliente'] = $cliente;
        //$_SESSION['pedidos'] = [];
        $_SESSION['cesta']= [];
        header("Location:carrito_formulario.php");
    }


   // $cliente=$_GET['nombre'];

   // $_SESSION["cliente"] = $cliente;//esto es una variable global o super global
    //header("Location:carrito_formulario.php");
    
?>