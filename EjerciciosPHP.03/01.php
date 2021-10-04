<?php
//Funcion con la que creo y lleno el array
function CreaArrayConAleatorios()
{
    $arregloNums = array();
    define('CANTIDAD', 20);
    /*Con este primer ciclo for relleno un array con 20 numeros aleatorios */
    for ($i = 0; $i < CANTIDAD; $i++) {
        $numAleatorio = random_int(1, 10);
        array_push($arregloNums, $numAleatorio);
    }
    return $arregloNums;
}

//funcion con la que muestro el array en tabla
function MostrarArrayEnTabla($array){
    // con este ciclo foreach recorro el array y muestro su contenido en una tabla
    echo "<table border=$1>";

    for ($fila = 1; $fila <= 1; $fila++) {
        echo "<tr>";
            foreach ($array as $valor) {
                echo "<td> $valor </td>";
            }
        echo "</tr>";
    }
    echo "</table>";

    /*foreach ($array as $clave => $valor) {
        echo "clave [$clave] => $valor </br>";
    }*/
}

//funcion para encontrar el mayor de los valores contenidos en el array
function Mayor($array){
    $mayor=$array[0];
    foreach ($array as $value){
        
        if ($value > $mayor){
            $mayor =$value;
        }
    }
    return $mayor;
}

 //metodo para encotrar el minimo 
function menor($array){
    $minimo = $array[0]; // Declaramos e inicializamos el máximo.

		for ($i = 0; $i < sizeof($array); $i++){	
			if ($minimo > $array[$i]){
                $minimo = $array[$i];
		    }
        }		
    return $minimo;
}

//Metodo para encontrar el mas repetido o moda
function masRepetido($array){
    $masRepetido=0;
    $maximoNumRepeticiones= 0;
    for ($i = 0; $i < sizeof($array); $i++) {
        $numRepeticiones= 0;
        for ($j = 0; $j < sizeof($array); $j++) {
            if ($array[$i]==$array[$j]) {
                $numRepeticiones++;
            }

            if($numRepeticiones>$maximoNumRepeticiones)
            {
                $masRepetido = $array[$i];
                $maximoNumRepeticiones= $numRepeticiones;
            }  
        }
       // echo "El  valor: ". $array[$i]." Se repite ".$numRepeticiones ."</br>";  
    }
    return $masRepetido;
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

    $numeros=CreaArrayConAleatorios();
     MostrarArrayEnTabla($numeros);
     echo "<hr>";
     echo "Mayor: ".Mayor($numeros);
     echo "<hr>";
     echo 'Otra manera de encontar el mayor: '.max($numeros);
     echo "<hr>";
     echo 'Menor: '.menor($numeros);
     echo "<hr>";
     echo 'Otra manera de encontar el menor: '.min($numeros);
     //echo "<hr>";
     //print_r ( array_count_values($numeros));
     echo "<hr>";
     echo "Mas repetido: ".masRepetido($numeros);

    ?>
    
</body>

</html>