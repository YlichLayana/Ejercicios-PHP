<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleDefaul.css">
    <title>Document</title>
</head>

<body>
    <h3>
    Crear el fichero 03.html donde se defina un formulario que incluya diversos 
    controles html 5 y que sea procesado por el archivo 03.php que mostrará mediante 
    la función print_r($_REQUEST) y var_dump($_REQUEST);la lista de todos los valores 
    recibidos.
    </h3>
    <div id="container" style="width: 600px;">
        <div id="header">
            <h1>FORMULARIOS CONTROLES HTML5</h1>
        </div>

        <div id="content">
            <form autocomplete="on" action="03.php">
                1. NUMERO (type number) <input type="number" name="numero"></br>
                2. NUMERO (type range) <input type="range" name="rango" min="10" max="100" value="20">100</br>
                3. ESTACIONES (List) <input list="lista-rango" name="Estación del año">
                <datalist id="lista-rango">
                    <option value="Primavera">
                    <option value="Verano">
                    <option value="Otoño">
                    <option value="Invierno">
                </datalist></br>
                4. COLOR (type color)<input type="color" name="colorElegido" value="#ffff"></br>
                5. BUCAR (type search): <input type="search" name="busqueda" size="20"></br>
                6. NOMBRE (type text): <input type="text" name="nombre" size="20"></br>
                7. APELLIDO (type text): <input type="text" name="nombre" size="20"></br>
                8. E-MAIL (type email): <input type="email" name="correo" autocomplete="off"></br>
                9. FECHA DE NACIMIENTO (type date): <input type="date" name="fecha"></br>
                10. EDAD (type number)<input type="number" name="edad" min="0" max="100"></br>
                11. WEB PERSONAL (type url): <input type="url" name="direccion"></br>
                12. HORARIO (type time) <input type="time" name="horaEntra"> a <input type="time" name="horaSale"></br>

                <input type="submit">
            </form>

        </div>
    </div>
</body>

</html>


<?php
print "<hr><pre>";
print_r($_REQUEST);
print "</hr></pre>";
print "<hr><pre>";
var_dump($_REQUEST);


?>

