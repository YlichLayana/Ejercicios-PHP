<?php
include_once 'app/config.php';


// Cargo los datos segun el formato de configuración
function cargarDatos()
{
    $funcion = __FUNCTION__ . TIPO; // cargarDatos TXT o ( Ya sea el archivo que este definido)
    return $funcion();
}

function volcarDatos($valores)
{
    $funcion = __FUNCTION__ . TIPO;
    $funcion($valores);
}

// ----------------------------------------------------
// FICHERO DE TEXT 
//Carga los datos de un fichero de texto
function cargarDatostxt()
{
    // Si no existe lo creo
    $tabla = [];
    if (!is_readable(FILEUSER)) {
        // El directorio donde se crea tiene que tener permisos adecuados
        $fich = @fopen(FILEUSER, "w") or die("Error al crear el fichero.");
        fclose($fich);
    }
    $fich = @fopen(FILEUSER, 'r') or die("ERROR al abrir fichero de usuarios"); // abrimos el fichero para lectura

    while ($linea = fgets($fich)) {
        $partes = explode('|', trim($linea));
        // Escribimos la correspondiente fila en tabla
        $tabla[] = [$partes[0], $partes[1], $partes[2], $partes[3]];
    }
    fclose($fich);
    return $tabla;
}

//Vuelca los datos a un fichero de texto
function volcarDatostxt($tvalores)
{
    $ficheroText = @fopen(FILEUSER, 'w') or die("Error al escribir en el fichero");
    $separator = "|";
    foreach ($tvalores as $usuario) {
        $LineaDatos = implode($separator, $usuario) . "\n";
        fwrite($ficheroText, $LineaDatos);
    }
    fclose($ficheroText);
}


// ----------------------------------------------------
// FICHERO DE CSV
//Carga los datos de un fichero de csv
function cargarDatoscsv()
{
    $tabla = [];
    if (!is_readable(FILEUSER)) {
        // El directorio donde se crea tiene que tener permisos adecuados
        $fileCSV = @fopen(FILEUSER, "w") or die("Error al crear el fichero.");
        fclose($fileCSV);
    }

    $fileCSV = @fopen(FILEUSER, 'r') or die("ERROR al abrir fichero de usuarios"); // abrimos el fichero para leer;
    while($lineaCSV = fgetcsv($fileCSV)){
        //var_dump ($linea);
        $tabla[] = $lineaCSV;
    } 
    fclose($fileCSV);
    return $tabla;
}

//Vuelca los datos a un fichero de csv
function volcarDatoscsv($tvalores)
{
    $fp = @fopen(FILEUSER, 'w');
    foreach ($tvalores as $value) {
        # code...
        fputcsv($fp, $value);
    }
    fclose($fp);
}



// ----------------------------------------------------
// FICHERO DE JSON
//Carga los datos de un fichero de json
function cargarDatosjson()
{
    $tabla = [];
    $datos_userJSON = file_get_contents(FILEUSER);
    $tabla= json_decode($datos_userJSON, true);

    return $tabla;
}

//Vuelca los datos a un fichero de json
function volcarDatosjson($tvalores)
{
    
    $jsonData = json_encode($tvalores);
    file_put_contents(FILEUSER, $jsonData);
    
}


// MOSTRA LOS DATOS DE LA TABLA DE ALMACENADA EN AL SESSION 
function mostrarDatos()
{
    $titulos = ["Nombre", "login", "Password", "Comentario"];
    $msg = "<table>\n";
    // Identificador de la tabla
    $msg .= "<tr>";
    for ($j = 0; $j < CAMPOSVISIBLES; $j++) {
        $msg .= "<th>$titulos[$j]</th>";
    }
    $msg .= "</tr>";
    $auto = $_SERVER['PHP_SELF'];
    $id = 0;
    $nusuarios = count($_SESSION['tuser']);
    for ($id = 0; $id < $nusuarios; $id++) {
        $msg .= "<tr>";
        $datosusuario = $_SESSION['tuser'][$id];
        for ($j = 0; $j < CAMPOSVISIBLES; $j++) {
            $msg .= "<td>$datosusuario[$j]</td>";
        }
        $msg .= "<td><a href=\"#\" onclick=\"confirmarBorrar('$datosusuario[0]',$id);\" >Borrar</a></td>\n";
        $msg .= "<td><a href=\"" . $auto . "?orden=Modificar&id=$id\">Modificar</a></td>\n";
        $msg .= "<td><a href=\"" . $auto . "?orden=Detalles&id=$id\" >Detalles</a></td>\n";
        $msg .= "</tr>\n";
    }
    $msg .= "</table>";

    return $msg;
}

/*
 *  Funciones para limpiar la entreda de posibles inyecciones
 */
// Función para limpiar todos elementos de un array
function limpiarArrayEntrada(array &$entrada)
{
    // Sin implementar

}
