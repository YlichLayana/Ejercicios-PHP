<table class="default">
    <?php

    $numero1 = 5;
    $numero2 = 2;
    $resu;

    ?>
    <tr>
        <th>Operación</td>
        <th>Resultado</td>
    </tr>

    <tr>
        <td><?php echo $numero1 . ' + ' . $numero2 ?></td>
        <td> <?= $resu = $numero1 + $numero2 ?> </td>
    </tr>

    <tr>
        <td> <?= $numero1 . '-' . $numero2 ?> </td>
        <td><?= $resu = $numero1 - $numero2 ?></td>
    </tr>

    <tr>
        <td><?= $numero1 . 'x' . $numero2 ?></td>
        <td><?= $resu = $numero1 * $numero2 ?></td>
    </tr>

    <tr>
        <td><?= $numero1 . '/' . $numero2 ?></td>
        <td><?= $resu = $numero1 / $numero2 ?></td>
    </tr>

    <tr>
        <td><?= $numero1 . '%' . $numero2 ?></td>
        <td><?= $resu = $numero1 % $numero2 ?></td>
    </tr>

    <tr>
        <td><?= $numero1 . ' pot ' . $numero2 ?></td>
        <td><?= $resu = pow($numero1, $numero2) ?></td>
    </tr>

</table>
<style>
    table {
        width: 25%;
        border: 1px solid #000;
    }

    td {
        width: 25%;
        text-align: left;
        vertical-align: top;
        border: 1px solid #000;
        font-size: 30px;
    }

    th {
        color: blue;
        background: gray;
        font-size: 40px;
    }
</style>