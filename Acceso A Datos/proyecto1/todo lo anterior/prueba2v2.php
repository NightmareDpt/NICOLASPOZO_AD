<html>
    <head>

    </head>
    <body>
        <?php 
        echo "<table border = '1'>";
        $sum=0;
        for($i=0;$i <=$_POST['n']-1;$i++){
        echo"<tr>";
            for ($j=0; $j <=$_POST['n']-1;$j++){
                if($i==$j||$j==$_POST['n']-1-$i||
                 $i==($_POST['n']-1)/2 ||
                $j == ($_POST['n']-1)/2){
                    echo "<td style='background-color:red'>".$_POST['s']."</td>";

                } else{
                $sum++;
                    echo"<td style='background-color:yellow'>".$_POST['n']."</td>";
                }
            }
            echo "</tr>";
        }

        echo "</table>";
        if($_POST['signo']=="+") echo "Total suma:".($sum);
        else echo "Total: ".($_POST['a']**($sum/$_POST['n']));  
        ?>
    </body>

</html>