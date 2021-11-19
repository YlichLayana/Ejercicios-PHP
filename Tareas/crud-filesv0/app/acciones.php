<?php
include_once 'funciones.php';


function accionDetalles($id)
{
    $usuario = $_SESSION['tuser'][$id];
    $nombre  = $usuario[0];
    $login   = $usuario[1];
    $clave   = $usuario[2];
    $comentario = $usuario[3];
    $orden = "Detalles";
    include_once "layout/formulario.php";
    exit();
}

function accionAlta()
{
    $nombre  = "";
    $login   = "";
    $clave   = "";
    $comentario = "";
    $orden = "Nuevo";
    include_once "layout/formulario.php";
    exit();
}

function accionPostAlta()
{
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $nuevo = [$_POST['nombre'], $_POST['login'], $_POST['clave'], $_POST['comentario']];
    $_SESSION['tuser'][] = $nuevo;
}

function accionTerminar()
{
    volcarDatos($_SESSION['tuser']);
    session_destroy();
}


function accionBorrar($id)
{
    //unset() destruye las variables especificadas.
    unset($_SESSION['tuser'][$id]);

    //array_values() devuelve todos los valores del array array e indexa numéricamente el array.
    $_SESSION['tuser'] = array_values($_SESSION['tuser']); 
}

function accionModificar($id)
{
    $usuario = $_SESSION['tuser'][$id];
    $nombre  = $usuario[0];
    $login   = $usuario[1];
    $clave   = $usuario[2];
    $comentario = $usuario[3];
    $orden = "Modificar";
    include_once "layout/formulario.php";
    exit();
}

function accionPostModificar()
{
    $modifiDatos = [$_POST['nombre'], $_POST['login'], $_POST['clave'], $_POST['comentario']];
    $user = $_SESSION['tuser'];

    for ($i = 0; $i < count($user); $i++) {
        if ($user[$i][1] == $_POST['login']) {
            $_SESSION['tuser'][$i] = $modifiDatos;
        }
    }
}
