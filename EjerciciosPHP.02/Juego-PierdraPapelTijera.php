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

table.conborde, table.conborde td, table.conborde th {
  border: black 1px solid;
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
<h1>¡Piedra, papel, tijera!</h1>

<p>Actualice la página para mostrar otra partida.</p>

<?php
define ('PIEDRA1',  "&#x1F91C;");
define ('PIEDRA2',  "&#x1F91B;");
define ('TIJERAS',  "&#x1F596;");
define ('PAPEL',    "&#x1F91A;" );

$Valor=array(PIEDRA1,PIEDRA2,TIJERAS,PAPEL);
$TamanioArray=count($Valor)-1;
$indice1=rand(0, $TamanioArray);
$indice2=rand(0, $TamanioArray);
$jugador1=$Valor[$indice1];
$jugador2=$Valor[$indice2];

?>

<table>
    <tr>
      <th>Jugador 1</th>
      <th>Jugador 2</th>
    </tr>
    <tr>
      <td><span style="font-size: 7rem"><?=$jugador1?></span></td>
      <td><span style="font-size: 7rem"><?=$jugador2?></span></td>
    </tr>
    <tr>
      <th colspan="2">¡Ha ganado el jugador 1!</th>
    </tr>
  </table>

</body>
</html>