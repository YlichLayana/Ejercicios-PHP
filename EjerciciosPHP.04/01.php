<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="default.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="container" style="width: 400px;">
        <div id="header">
            <h1>Procesando formulario</h1>
        </div>

        <div id="content">
            <?php

            $tusuarios = array(
                'ylich' => '1402',
                "jose" => "1234",
                "admin" => "admin");

            if (empty($_REQUEST['nombre']) ||  !isset($_REQUEST['clave'])) {
                echo " Error: falta valores introducir los valores de usuario y contraseña.<br> ";
                echo " <button onclick='window.history.back();'>Volver</button> ";
                exit;
            }
            // PELIGRO: No controlo la seguridad de las entradas
            $usuario = $_REQUEST['nombre'];
            $clave   = $_REQUEST['clave'];

            if (array_key_exists($usuario, $tusuarios) &&  $tusuarios[$usuario] == $clave) {
                echo " Bienvenido $usuario al sistema ";
            } else {
                // Cargo de nuevo el formulario  después de 3 segundos 
                header("refresh:3;url=01.html");
                echo "Error: Usuario y contraseña no válidos.<br> ";
            }


            ?>
        </div>
    </div>
</body>

</html>