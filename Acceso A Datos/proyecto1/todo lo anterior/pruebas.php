<html>
    <head>
        
    </head>
    <body>
        <h1>
            El numero de la suerte es 
            <?php echo rand(1,200) ?>
        </h1>
        <br><br><br>
        <h2>
            <?php 

            echo '<span style="color:rgb('.rand(0,255).",".rand(0,255).",".rand(0,255).')">Color</span>';?>
        </h2>
        <?php 
        echo '<img src="'."../medios/".rand(1,2).".png".'">'
        
        ?>

        <table border=1px>
            <?php 
            $random = rand(1,20);

            for ($i=0; $i < $random; $i++) { 
                
                for($j=0; $j < $random; $j++) { 
                    if ($i+$j=$random-1) {
                        echo "<td>*</td>";
                    } 
                    if ($i == $j) {
                        echo "<td>*</td>";
                    } else{
                        echo "<td>$random</td>";
                    }

                }
                echo '<tr></tr>';
            }
            ?>
        </table>
    </body>
</html>