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
    border-spacing: 5px;
    border-color: grey;
    
  }



  footer {

    margin-top: 9em;
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
  define('PIEDRA1',  "&#x1F91C;");
  define('PIEDRA2',  "&#x1F91B;");
  define('TIJERAS',  "&#x1F596;");
  define('PAPEL',    "&#x1F91A;");

  $Valor = array(PIEDRA1, TIJERAS, PAPEL, PIEDRA2);
  $TamanioArray = count($Valor) - 1;
  $indice1 = rand(0, $TamanioArray - 1);
  $indice2 = rand(1, $TamanioArray);
  $jugador1 = $Valor[$indice1];
  $jugador2 = $Valor[$indice2];


  function juega($jugadorA, $jugadorB)
  {
    if ($jugadorA == PIEDRA1 && $jugadorB == PIEDRA2 or $jugadorA == PAPEL && $jugadorB == PAPEL or $jugadorA == TIJERAS && $jugadorB == TIJERAS) {
      $mensaje = '¡Empate!';
    } elseif ($jugadorA == PIEDRA1 && $jugadorB == TIJERAS or $jugadorA == PAPEL && $jugadorB == PIEDRA2 or $jugadorA == TIJERAS && $jugadorB == PAPEL) {
      $mensaje = '¡Ha ganado el jugador 1!';
    } else {
      $mensaje = '¡Ha ganado el jugador 2!';
    }

    return $mensaje;
  }




  ?>

  <table>
    <tbody>
      <tr>
        <th>Jugador 1</th>
        <th>Jugador 2</th>
      </tr>
      <tr>
        <td><span style="font-size: 9rem"><?= $jugador1 ?></span></td>
        <td><span style="font-size: 9rem"><?= $jugador2 ?></span></td>
      </tr>
      <tr>
        <th colspan="2"><?= juega($jugador1, $jugador2); ?></th>
      </tr>
    </tbody>
  </table>

  <footer>
    <p>Ylich Layana</p>
  </footer>

</body>

</html>