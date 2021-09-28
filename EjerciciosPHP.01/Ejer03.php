<h2> Ejercicio2 </h2>
    <?php

    $filas = random_int(1, 9);
    $colum= $filas-1;
    

    for ($i = 1; $i <= $filas; $i++) {
        for ($j = $colum; $j > 0; $j--) {
            echo  "&nbsp";
        }
        
        $colum--;

        for($k =1; $k <= 2*$i -1; $k++){
            echo "*";
        }
        echo "</br>";
    }


    ?>
    <h2> Fin del Ejercicio </h1>