<?php
function usuarioOk($usuario, $contraseña): bool
{
   return (strlen($usuario) >= 8 && $contraseña == strrev($usuario));
}


function contarPalabras($texto)
{

   $palabras = explode(" ", $texto);//primero convierto mi texto en un array 

   $total = count($palabras);

   return $total;
}


function PalabraMasRepetida($texto)
{
   $limpiar=strip_tags($texto);
   $combierteArray = explode(" ", $limpiar); //primero convierto mi texto en un array 
   $palabras = array_count_values($combierteArray); //cuento los valores del array<<$combierteArray>> Y retorna un array<<$palabras>> usando los valores del array<<$combierteArray>> como keys y su frecuencia o cantidad repetida como valores

   arsort($palabras); // ordeno por valor 

   foreach ($palabras as $value) {
      $primeraClave="";
      //consulto que las palabra al menos se repita dos veces 
      if ($value > 1) {
         $primeraClave = array_key_first($palabras);
         //echo '<br>Palabra más Repetida: => ' . $primeraClave;
         break;
      } else {
         $primeraClave= "no hay palabras que se repitan";
         break;
      }
   }
   // aqui comentare la linea 41
   //escojo la primera clave o key luego de haber sido ordenada
   //$primeraClave = array_key_first($palabras);
   return $primeraClave;
}

function LetraMasRepetida($texto)
{
   $limpiar=strip_tags($texto);
   //variable tipo cadena en la que modifico el texto recibido eliminando espacion y caracteres especiales
   $nuevaCadena = preg_replace('/[0-9\@\.\;\?\,\" "]+/', '', $limpiar);

   //Dividimos la cadena por carácteres y lo almacenas en un array.
   $arrayLetras = str_split($nuevaCadena);

   $letras = array_count_values($arrayLetras); //cuento los valores del array<<$arrayLetras>> Y retorna un array<<$letras>> usando los valores del array<<$arrayLetras>> como keys y su frecuencia o cantidad repetida como valores

   arsort($letras); // ordeno por valor es decir mas repetida

   //escojo la primera clave o key luego de haber sido ordenada por su valor
   $primeraClave = array_key_first($letras);
   return $primeraClave;
}
