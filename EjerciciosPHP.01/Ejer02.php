<h2> Ejercicio2 </h1>
<?php

$alturaEscalera=random_int(1,9);

for ($numero=1;$numero<=$alturaEscalera;$numero++){

            //Este bucle pinta los asteriscos en cada fila
            for($i=0;$i<$numero;$i++){
                if ($numero%2==0){
                    echo '<font color = "red">', $numero,'</font>';
                }else{
                    echo '<font color = "blue">', $numero,'</font>';
                }
            }
            //Saltamos de linea
            echo "<br>";
}

?>
<h2> Fin del Ejercicio </h1>