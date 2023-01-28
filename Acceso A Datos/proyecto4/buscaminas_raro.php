<html>
    <head>
    </head>
    <body>
        <table>
        <?php 
        $contador=rand(0,$_POST["cuaritos"]-1);
        $contador1=rand(0,$_POST["cuaritos"]-1);
        for ($i=0; $i < $_POST["cuaritos"]; $i++) {
            echo "<tr>";
            for ($j=0; $j < $_POST["cuaritos"]; $j++) {
                if ($contador ==$i && $contador1 == $j) {
                    echo "<td><a href='./hasganado.php'><button style='height: 20px;width:20px;'></button></a></td>";
                }else
                echo "<td><button style='height: 20px;width:20px;'></button></td>";
            }
            echo "</tr>";
        }
        ?>
                </table>
            </body>
</html>