<?php
function elMayor($a, $b, &$c)
{
    if ($a == $b) {
        $c = 0;
    } elseif ($a > $b) {
        $c = $a;
    } else {
        $c = $b;
    }
}
?>

<html>

<head>
    <title>Online PHP Script Execution</title>
</head>

<body>
    <h3>Realizar y probar una función en PHP llamada elMayor que reciba tres números: A,B y C.
        La función almacenará en C el valor que sea mayor A o B.
        En el caso sean iguales almacenará el valor 0 en C
        ¿Qué parámetros se deberían pasar por valor o copia y cuales por referencia?</h3>

    <h4> Los numeros son </h4>    
    <?php
    
    $uno = 5;
    $dos = 9;
    $resu = 0;

    
    echo "A: " . $uno ."</br>";
    echo "B: " . $dos ."</br>";
    echo "C: " . $resu."</br>"."</br>";

    elMayor($uno, $dos, $resu);
    echo "El Valor Mayor es: " . $resu;
    ?>

</body>

</html>