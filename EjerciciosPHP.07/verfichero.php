<?php
//abro el archivo para lectura
$archivo = fopen ("miarchivo.txt", "r");

//inicializo una variable para llevar la cuenta de las líneas y los caracteres
$num_lineas = 0;
$caracteres = 0;

//Hago un bucle para recorrer el archivo línea a línea hasta el final del archivo
while (!feof ($archivo)) {
    //si extraigo una línea del archivo y no es false
    if ($linea = fgets($archivo)){
       //acumulo una en la variable número de líneas
       $num_lineas++;
       //acumulo el número de caracteres de esta línea
       
       $caracteres += strlen($linea);
    }
}
fclose ($archivo);
echo "

Líneas: " . $num_lineas;
echo "
<br>Caracteres: " . $caracteres;
?>