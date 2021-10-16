<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleDefaul.css">
    <title>Document</title>
</head>

<body>
    <h3>2. Crear página que simule un calculadora sencilla, mediante un único archivo 02.php 
        que mostrará un formularios con dos campos numéricos y 4 botones con los 4 tipos 
        de operaciones + - * / posibles. Se incluirá también 3 controles de tipo radio 
        que indicarán como queremos que se muestre el resultado en decimal, binario o hexadecimal.
        El programa php debe comprobar que se han recibido los dos valores numéricos y detectará 
        el error de intento de división por cero. Mostrará el resultado calculado según el formato 
        elegido. Por omisión se mostrará en decimal.</h3>
    <div id="container" style="width: 400px;">
        <div id="header">
            <h1>Calculadora</h1>
        </div>

        <div id="content">
            <form>

                NUMERO 1 <input type="text" name="operadorA" size="10"><br>
                NUMERO 2 <input type="text" name="operadorB" size="10">
                <button name='borrar' value="Borrar" onclick='borrarvalores()'>Borrar</button>
                <br><br>
                <fieldset>
                    <h3 style="text-align: center;">OPERACIÓN A REALIZAR </h3>
                    Sumar <button name='operacion' value='+'> +</button> &nbsp &nbsp &nbsp;
                    Multiplicar <button name='operacion' value='*'> *</button><br>
                    Restar <button name='operacion' value='-'> -</button>&nbsp &nbsp &nbsp &nbsp;
                    Dividir <button name='operacion' value='/'> /</button><br>
                </fieldset>
                <fieldset>
                    <h3 style="text-align: center;">FORMATO DEL RESULTADO </h3>
                    <!-- Por defecto es decimal -->
                    <input type="radio" name="formato" value="dec" checked='checked'>Decimal<br>
                    <input type="radio" name="formato" value="bin">Binario<br>
                    <input type="radio" name="formato" value="hex">Hexadecimal<br>
                </fieldset>


            </form>
            <?= Operacion(); ?>
        </div>
    </div>
</body>

</html>

<?php

// FUNCIONES AUXILIARES





// Si fuera por POST podia chequear $_SERVER['REQUEST_METHOD'] == 'POST'
function Operacion()
{
    # code...
    if (isset($_GET["operacion"]) && $_GET['formato']) {
        $numOperadorA = $_REQUEST['operadorA'];
        $numOperadorB = $_REQUEST['operadorB'];
        $oper = $_REQUEST['operacion'];
        $formato = $_REQUEST['formato'];
        $error = false;

        if (!is_numeric($numOperadorA) || !is_numeric($numOperadorB)) {
            $error = true;
            $msg = " Error: los valores introducidos no son numéricos.";
        }

        if ($numOperadorA == 0 && $oper == '/') {
            $error = true;
            $msg = " Error: División por cero";
        }

        if (!$error) {
            $valorResultado = EscogeOper($oper, $numOperadorA, $numOperadorA);
            $msg = "El resultado es " . Formato($formato, $valorResultado);
        }

        return $msg;
    }
}

function EscogeOper($op, $oper1, $oper2)
{
    switch ($op) {
        case '+':
            $resul = $oper1 + $oper2;
            break;
        case '-':
            $resul = $oper1 - $oper2;
            break;
        case '*':
            $resul = $oper1 * $oper2;
            break;
        case '/':
            $resul = $oper1 / $oper2;
            break;
    }
    return $resul;
}

function Formato($forma, $valorResu)
{
    switch ($forma) {
        case "dec":
            $valorf = $valorResu;
            break;
        case "hex":
            $valorf = dechex($valorResu);
            break;
        case "bin":
            $valorf = decbin($valorResu);
            break;
        default:
            $valorf = $valorResu;
    }
    return $valorf;
}


?>