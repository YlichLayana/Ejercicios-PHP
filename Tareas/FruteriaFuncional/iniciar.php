<?php
session_start();

if (isset($_GET['cliente'])) {
    $_SESSION['cliente'] = $_GET['cliente'];
    $Cliente = $_SESSION['cliente'];

    header('Location:lafruteria.php');
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
    <h1>La fruteria del siglo XXI</h1>
    <form action="" method="get">
        Introduzca su nombre de cliente <input type="text" name="cliente">
    </form>


</body>

</html>