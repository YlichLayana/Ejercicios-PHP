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
    $nombreCookie = 'contCookie'; //nomre de la cookie
    $numCookie = 0; //valor que contendra la cookie
    $exipiraCookies = time() + 60 * 3; //esta cookie solo exitira por tres minutos puedo cambiar su tiempo cuando quiera 

    //La función isset() nos permite evaluar si una variable está definida o no. Osea si la Cookie existe o no. 
    if (isset($_COOKIE['contCookie'])) {
        // En caso de que existe sea TRUE, este valor que contiene mi cookie se asignara a la variable $numCookie
        $numCookie = $_COOKIE['contCookie'];
    }
    $numCookie++;

    //La función setcookie () define una cookie que se enviará junto con el resto de los encabezados HTTP.
    setcookie($nombreCookie, $numCookie, $exipiraCookies);


    //esta es una manera de definir una constante que sera un fichero
    //const FICHERO = 'contador.txt';

    //otra manera de definir una constante
    define('FICHERO', 'contador.txt');

    function contadorvisitas()
    {
        
        
        # Si no existe, lo creamos vacio
        if (!file_exists(FICHERO)) {
            file_put_contents(FICHERO, '');
        }

        # Obtenemos su contenido
       // $contenido = trim(file_get_contents(FICHERO));
        $contenido = @file_get_contents(FICHERO);
        # Si está vacío, lo igualamos a cero
        if ($contenido == "") {
            $visitas = 0;
        } else {
            # Si no, las visitas son lo que tenga el archivo
            $visitas = intval($contenido);
        }
        # Ya sea que las visitas son 0 o las que hayamos leído, las aumentamos
        $visitas++;
        # Y volvemos a escribir el valor en el archivo
        file_put_contents(FICHERO, $visitas);


        return $visitas;
    }



    echo "cantidad de veces de la cookie: " . $numCookie;
    echo "<br> visitas: " . contadorvisitas();

    ?>
</body>

</html>