<style>
    body {
        padding: 0 20px;
        background-color: #F6F6FF;
        font-family: sans-serif;
    }

    h1 {
        margin: 10px;
        font-size: 150%;
        text-align: center;
        text-transform: uppercase;
    }

    p {
        display: block;
        margin-block-start: 2em;
        margin-block-end: 2em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
    }

    table {
        display: table;
        border-collapse: separate;
        box-sizing: border-box;
        text-indent: initial;
        border-spacing: 8px;
        border-color: grey;

    }

    td{
       font-size: 7rem;
    }

    footer {

        margin-top: 9em;
    }
</style>

<?php
function ValoresDados()
{
    $arregloNums = array();
    define('CANTIDAD', 6);
    /*Con este primer ciclo for relleno un array con 5 numeros aleatorios */
    for ($i = 1; $i < CANTIDAD; $i++) {
        $numAleatorio = random_int(1, 6);
        array_push($arregloNums, $numAleatorio);
    }
    return $arregloNums;
}

function muestraDados($array)
{
    foreach ($array as $valor) {
      //  echo  ' ' . $valor;
        switch ($valor) {
            case '1':
                echo '&#9856';
                break;
            case '2':
                echo '&#9857';
                break;
            case '3':
                echo '&#9858';
                break;
            case '4':
                echo '&#9859';
                break;
            case '5':
                echo '&#9860';
                break;
            case '6':
                echo '&#9861';
                break;
        }
    }
}

$jugador1 = ValoresDados();
$jugador2 = ValoresDados();
$puntos1 = array_sum($jugador1);
$puntos2 = array_sum($jugador2);


function CalculaGanandor($jugadorA, $jugadorB)
{
    if ($jugadorA == $jugadorB) {
        $mensaje = '¡Empate!';
    } elseif ($jugadorA > $jugadorB) {
        $mensaje = '¡Ha ganado el jugador 1!';
    } else {
        $mensaje = '¡Ha ganado el jugador 2!';
    }
    return $mensaje;
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
    <h1>¡Juego Cinco Dados!</h1>

    <p>Actualice la página para mostrar otra partida.</p>
    <table>
        <tbody>
            <tr>
                <th>Jugador 1</th>
                <td style="background-color: royalblue"><?= muestraDados($jugador1); ?></td>
                <th> <?= $puntos1.' Puntos'?></th>
            </tr>
            <tr>
                <th>Jugador 2</th>
                <td style="background-color:salmon "><?= muestraDados($jugador2); ?></td>
                <th> <?= $puntos2.' Puntos'?></th>
            </tr>
            <tr>
                <th colspan="3"><?= CalculaGanandor($puntos1, $puntos2); ?></th>
            </tr>
        </tbody>
    </table>

    <footer>
        <p>Ylich Layana</p>
    </footer>

</body>

</html>