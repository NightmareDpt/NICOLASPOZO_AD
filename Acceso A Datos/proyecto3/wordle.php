<html>
    <?php 
    var_export($_POST);
    $palabra="RUEDA";
    $aInputs= array();
    if (isset($_POST["boton"])) {
    for ($i=0; $i < strlen($palabra); $i++) { 
        //echo "$palabra[$i]";
        if ($palabra[$i]==$_POST["letra".$i]) {
            echo $aInputs[$i]= "green";
        } else{
            $aInputs[$i] = "white";
        }
    }
    var_export($aInputs);
    }
    ?>

    <head></head>

    <body>
        <form action="wordle.php" method="post">
            <?php 
            for ($i=0; $i < strlen($palabra); $i++) { 
                $color=(isset($aInputs[$i]))?$aInputs[$i]:"white";
                $valor=(isset($_POST["letra".$i]))?$_POST["letra".$i]: "";
                echo '<input type="text" value="'.$valor.'" name="letra'.$i.'" style="background-color:'.$color.';">';
            }
            ?>
            <input type="submit" value="GIMME" name="boton" >
        </form>
    </body>
</html>