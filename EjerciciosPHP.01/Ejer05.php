<div style="padding-left: 100px;">
    <table border="0" align="center">
        <?php
        $numero1 = 5;
        $numero2 = 2;
        echo "<table text-align:center; border=5>";
        echo "<tr>";
        echo "<td> Operación</td>";
        echo "<td> Resultado </td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>$numero1 + $numero2 =";
        $suma = $numero1 + $numero2;
        echo "<td>$suma</td>";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>$numero1 - $numero2 =";
        $resta = $numero1 - $numero2;
        echo "<td>$resta</td>";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>$numero1 x $numero2 =";
        $multiplicar = $numero1 * $numero2;
        echo "<td>$multiplicar</td>";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>$numero1 / $numero2 =";
        $dividir = $numero1 / $numero2;
        echo "<td>$dividir</td>";
        echo "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>$numero1 % $numero2 =";
        $modulo = $numero1 % $numero2;
        echo "<td>$modulo</td>";
        echo "</td>";
        echo "</tr>";


        echo "<tr>";
        echo "<td>$numero1 potencia $numero2 =";
        $potencia = pow($numero1, $numero2);
        echo "<td>$potencia</td>";
        echo "</td>";
        echo "</tr>";

        echo "</table>";
        ?>
    </table>
</div>