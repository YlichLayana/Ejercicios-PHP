<?php
session_start();
if (!isset($_SESSION['cliente'])) {
  echo 'No hay session iniciada';
  die();
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
  <?php
  echo "<h1>La fruteria del siglo XXI</h1>";

  if (isset($_POST['boton'])) {
    $fruta = $_POST['fruta'];
    $cantidad = $_POST['cantidad'];
    $carrito;

    if ($_POST["boton"] == "Anotar") {

      if (isset($_SESSION['CARRITO'][$_POST['fruta']])) {
        $_SESSION['CARRITO'][$fruta] += $cantidad;
      } else {
        $_SESSION['CARRITO'][$fruta] = $cantidad;
      }
      //var_dump($_SESSION['CARRITO']);
      echo "Este es su pedido : <br>";

      foreach ($_SESSION['CARRITO'] as $key => $value) {
        echo "<br>* ";
        echo  $key . "  " . $value;
      }
    }


    if ($_POST["boton"] == "Terminar") {
      if (isset($_SESSION['CARRITO'])) {
        echo "Muchas gracias, por su pedido: <br>";
        foreach ($_SESSION['CARRITO'] as $key => $value) {
          echo "<br>* ";
          echo $key . "  " . $value;
        }
      }
      else{
        echo "El Cliente: ". $_SESSION['cliente']."<br> No realizo ninguna Compra";
      }

      echo "<br><br><button><a style='text-decoration: none;' href='iniciar.php'>NUEVO CLIENTE </a></button>";
      session_destroy();
      exit;
    }
  }
  ?>

  <h3>Realice su compra: <?= $_SESSION["cliente"] ?></h3>
  <form action="" method="post">
    <br>Selecciona la fruta: <select name="fruta">
      <option value="Platanos">Platanos</option>
      <option value="Naranjas">Naranjas</option>
      <option value="Limones">Limones</option>
      <option value="Manzanas">Manzanas</option>
    </select>
    Cantidad: <input name="cantidad" type="number" value=0 size=4>



    <input type="submit" name="boton" value="Anotar">
    <input type="submit" name="boton" value="Terminar"><br>


  </form>


</body>

</html>