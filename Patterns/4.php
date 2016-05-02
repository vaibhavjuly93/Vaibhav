<html>
<body>
<table align="left" border="1" cellpadding="3" cellspacing="0">
    <?php
    for($i=1;$i<=20;$i++)
    {
        echo "<tr>";
        for ($j=1;$j<=10;$j++)
        {
            echo "<td>$i * $j = ".$i*$j."</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>