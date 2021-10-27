<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="01 dni-estilo.css">
    <title>Document</title>
</head>

<body>
    <div id="container" style="width: 380px;">
        <div id="header">
            <h1>Calculo de la letra del DNI</h1>
        </div>
        <div id="content">
           
            <?php
            //comprobamos que el campo nif enviado por el formulario no esté vacío.
            if (empty($_POST['nif'])) {
                echo "ERROR: El campo DNI no puede estar vacio.";
            } else {
                $n = $_POST['nif']; //aqui tomo el valor introduccido en el formulario y lo asigno en la variable $n
                if (strlen($n) != 8) { //aqui analizo si el numero contiene 8 digitos en la parte de servidor
                    echo "ERROR: El DNI debe al menos tener 8 numeros.";
                } else {
                    //comprobamos que sean números los primeros 8 caracteres
                    if (is_numeric($n)) {
                        //calculamos la letra del dni introducido mediante la función LetraNIF
                        
                        echo "Este es el resultado del cálculo realizado.</br> DNI: ";
                        $resto = $n % 23;
                        $letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
                        echo $n . "<b>" . $letras[$resto] . "</b>";
                    }
                }
            }
            ?>
            <br><br>
            <p>
                <button><a href="01 dni.html" style="text-decoration: none;">Volver al Formulario</a></button>
            </p>
        </div>
    </div>
</body>

</html>