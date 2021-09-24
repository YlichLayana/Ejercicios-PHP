<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Realizar un programa en php que genere 50 números aleatorios entre 1 y 100
        y que muestre en una tabla html el valor máximo, el mínimo y la media con el siguiente
        formato:
        Nota definir los valores 50 y 100 como constantes en PHP (define)</h2>

    <table>
        <tr>
            <th colspan="2" ;>Generación de 50 valores aletorios</th>
        </tr>

        <tr>
            <td><?= "Minimo" ?></td>
            <td> <?= "2" ?> </td>
        </tr>

        <tr>
            <td><?= "Máximo" ?></td>
            <td><?= "82" ?> </td>
        </tr>

        <tr>
            <td><?= "Media" ?></td>
            <td><?= "45" ?> </td>
        </tr>

    </table>

    <style>
        table {
            width: 40%;
            border-collapse: collapse;
        }

        th {
            border: 1px solid #000;
            color: white;
            background: black;
            text-align: center;
            font-size: 27px;
        }

        td {
            text-align: left;
            vertical-align: top;
            border: 1px solid #000;
            font-size: 20px;
        }
    </style>
</body>

</html>