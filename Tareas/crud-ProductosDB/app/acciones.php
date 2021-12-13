<?php
include_once "Producto.php";

function accionBorrar ($produc){    
    $db = AccesoDatos::getModelo();
    $tprod = $db->borrarUsuario($produc);
}

function accionTerminar(){
    AccesoDatos::closeModelo();
    session_destroy();
}
 
function accionAlta(){
    $produc = new Producto();
    $produc->PRODUCTO_NO  = "";
    $produc->DESCRIPCION   = "";
    $produc->PRECIO_ACTUAL   = "";
    $produc->STOCK_DISPONIBLE = "";
    $orden= "Nuevo";
    include_once "layout/formulario.php";
}

function accionDetalles($nprod){
    $db = AccesoDatos::getModelo();
    $produc = $db->get1Prod($nprod);
    $orden = "Detalles";
    include_once "layout/formulario.php";
}

function accionModificar($nprod){
    $db = AccesoDatos::getModelo();
    $produc = $db->get1Prod($nprod);
    $orden="Modificar";
    include_once "layout/formulario.php";
}

function accionPostAlta(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $produc = new Producto();
    $produc->PRODUCTO_NO  = $_POST['PRODUCTO_NO'];
    $produc->DESCRIPCION   = $_POST['DESCRIPCION'];
    $produc->PRECIO_ACTUAL   = $_POST['PRECIO_ACTUAL'];
    $produc->STOCK_DISPONIBLE = $_POST['STOCK_DISPONIBLE'];
    $db = AccesoDatos::getModelo();
    $db->addProducto($produc);
    
}

function accionPostModificar(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $produc = new Producto();
    $produc->PRODUCTO_NO = $_POST['PRODUCTO_NO'];
    $produc->DESCRIPCION   = $_POST['DESCRIPCION'];
    $produc->PRECIO_ACTUAL   = $_POST['PRECIO_ACTUAL'];
    $produc->STOCK_DISPONIBLE = $_POST['STOCK_DISPONIBLE'];
    $db = AccesoDatos::getModelo();
    $db->modProducto($produc);
    
}

