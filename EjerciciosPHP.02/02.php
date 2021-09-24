<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Definir dos variables asignándoles un valor entero aleatorio entre 1 y 10,
        mostrar su suma, su resta, su división, su multiplicación, su módulo y su potencia
        Crea un archivo llamado funcionesvar.php donde estén definidas las cinco operaciones:
        suma, resta, división, producto, módulo y potencia. Incluir ese fichero dentro de fichero
        principal (require_once) y llamar a las funciones para obtener el resultado.</h2>

    <h4>Valores ingresados para realizar operaciones </h4>

    <?php
    //require_once ('EjerciciosPHP.02/funcionesvar.php');
    require_once "funcionesvar.php";
    $A = 5;
    $B = 2;

    echo "1º Numero: " . $A . "</br>";
    echo "2º Numero: " . $B . "</br>" . "</br>";

    echo $A . " + " . $B . " = " . calSuma($A, $B) . "</br>";
    echo $A . " - " . $B . " = " . calResta($A, $B) . "</br>";
    echo $A . " * " . $B . " = " . calMultiplicaion($A, $B) . "</br>";
    echo $A . " / " . $B . " = " . calDivision($A, $B) . "</br>";
    echo $A . " % " . $B . " = " . calModulo($A, $B) . "</br>";
    echo $A . " ** " . $B . " = " . calPotencia($A, $B);

    ?>
</body>

</html>