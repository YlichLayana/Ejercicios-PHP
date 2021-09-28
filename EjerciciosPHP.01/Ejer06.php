<div style="margin: 10px 5px; border: 1px solid black; padding: 10px; background-color: blue ">
    <h1 style="text-align: center; color: white;">TABLA DE</h1>
    <h1 style="text-align: center; color: white;">MULTIPLICAR</h1>
</div>

<div style="padding-left: 40px;">
    <table border="0" align="center">
        <?php
        $numero = random_int(1, 10);
        echo "<table text-align:center; border=5>";
        echo "<tr>";

        echo "<td>Tabla del </td>";
        echo "<td> $numero </td>";


        echo "</tr>";
        echo "<tr>";

        for ($multiplicador = 1; $multiplicador <= 10; $multiplicador++) {

            echo "<td>$numero X $multiplicador =";
            $resu = $numero * $multiplicador;
            echo "<td>$resu</td>";
            echo "</td>";

            echo "</tr>";
        }
        echo "</table>";
        ?>
    </table>
</div>