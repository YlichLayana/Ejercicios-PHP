<?php

$codigosErrorSubida = [
	UPLOAD_ERR_OK         => 'Subida correcta',  // Valor 0
	UPLOAD_ERR_INI_SIZE   => 'El tamaño del archivo excede el admitido por el servidor',  // directiva upload_max_filesize en php.ini
	UPLOAD_ERR_FORM_SIZE  => 'El tamaño del archivo excede el admitido por el cliente',  // directiva MAX_FILE_SIZE en el formulario HTML
	UPLOAD_ERR_PARTIAL    => 'El archivo no se pudo subir completamente',
	UPLOAD_ERR_NO_FILE    => 'No se seleccionó ningún archivo para ser subido',
	UPLOAD_ERR_NO_TMP_DIR => 'No existe un directorio temporal donde subir el archivo',
	UPLOAD_ERR_CANT_WRITE => 'No se pudo guardar el archivo en disco',  // permisos
	UPLOAD_ERR_EXTENSION  => 'Una extensión PHP evito la subida del archivo',  // extensión PHP
];

$sum = 0;
$cantidadArc=count($_FILES['archivo']['name']);
$mensaje = '';

foreach ($_FILES["archivo"]['tmp_name'] as $key => $tmp_name) {
	$nameArchivo = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
	$temporal = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
	$tipoFichero     =   $_FILES['archivo']['type'][$key];
	$tamanioFichero  =   $_FILES['archivo']['size'][$key];
	$errorFichero    =   $_FILES['archivo']['error'][$key];

	$sum+= $tamanioFichero;

	$mensaje .= 'Intentando subir el archivo: ' . ' <br />';
	$mensaje .= "- Nombre: $nameArchivo" . ' <br />';
	$mensaje .= '- Tamaño: ' . number_format(($tamanioFichero / 1000), 1, ',', '.') . ' KB <br />';
	$mensaje .= "- Tipo: $tipoFichero" . ' <br />';
	$mensaje .= "- Nombre archivo temporal: $temporal" . ' <br />';
	$mensaje .= "- Código de estado: $errorFichero" . ' <br />';


	$permitidos = array('jpg', 'png'); //Archivos permitido
	//Obtenemos la extensión del archivo
	$arregloArchivo = explode(".", $_FILES['archivo']['name'][$key]);
	$extension = strtolower(end($arregloArchivo));

	//Validamos que el archivo exista en origen y cargemos a temp
	if ($_FILES["archivo"]["name"][$key]) {

		'<br>'.$mensaje .= '<br />RESULTADO<br />';
		$directorio = 'C:\Users\ylich\OneDrive\Documentos\imgusers'; //Declaramos un  variable con la ruta donde 

		$dir = opendir($directorio); //Abrimos el directorio de destino
		$destino = $directorio . '/' . $nameArchivo; //Indicamos la ruta de destino, así como el nombre del archivo

		if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida


			if (($tamanioFichero  > 200000) ) {
				$mensaje .= 'Archivo demasiado grande : ' . $tamanioFichero. ' <br />';
			}

			if (($sum  > 100000) ) {
				$mensaje .= 'Archivo demasiado grande : ' . $tamanioFichero. ' <br />';
				break;
			}

			if (file_exists($destino)){
				$mensaje .= 'ERROR: EL archivo ya ha sido guardado antes: <br />';
			}

			//El primer campo es el origen y el segundo el destino
			else if (move_uploaded_file($temporal, $destino)) {
				$mensaje .= 'Archivo guardado en: ' . $directorio  . ' <br />';
					//. $codigosErrorSubida[$errorFichero] . '</em> <br />';
			} else {
				$mensaje .= 'ERROR: Archivo no guardado correctamente <br />';
			}
			closedir($dir); //Cerramos el directorio de destino

		} else {
			//$mensaje .= '<br />RESULTADO<br />';
			$mensaje .= 'ERROR: Formato no soportado <br />';
		}
	} else {
		$mensaje .= '<br />RESULTADO<br />';
	}
	if ($errorFichero > 0) {

		'<br>'.$mensaje .= "Se ha producido el error nº $errorFichero: <em>"
			. $codigosErrorSubida[$errorFichero] . '</em> <br />';
	}
	else{
		'<br>'. $mensaje.= $codigosErrorSubida[$errorFichero] . '</em> <br />';
	}
}


?>
<?= $mensaje; '<br>'.print_r('Total: '.$sum. ' bytes');?>
<br>
<a href="subirFicheros.html">Volver</a>