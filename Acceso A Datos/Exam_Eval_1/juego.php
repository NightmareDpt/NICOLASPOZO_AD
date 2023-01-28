<html>
    <?php session_start();
    ?>
    <head><title>El bingo perezoso</title></head>

    <style>
    table, th, td {
    border: 1px solid;
    }
    .tachado{
        background-color: red;
    }
    </style>


    <body>
        <?php
        if (isset(($_POST["primero"]))){
            for ($i=0; $i < 1; $i++) { 
                $random_ball = random_int(1,69);
                if (!in_array($random_ball,$_SESSION["repesBolas"]))
                {
                    $_SESSION["bolas"][] =$random_ball;
                    $_SESSION["repesBolas"][] =$random_ball;
                }else $i--;
            }
        }
        if (count($_SESSION["numero_cartones1"])!= 12 && count($_SESSION["numero_cartones2"])!= 12) {
            for ($i=0; $i < 12; $i++) { 
                for ($j=0; $j < 1; $j++) { 
                    $random = random_int(1,69);
                    if (!in_array($random,$_SESSION["numero_cartones1"]))
                    {
                        $_SESSION["numero_cartones1"][] =$random;
                    }else $j--;
                }
                for ($j=0; $j < 1; $j++) { 
                    $random = random_int(1,69);
                    if (!in_array($random,$_SESSION["numero_cartones2"]))
                    {
                        $_SESSION["numero_cartones2"][] =$random;
                    }else $j--;
                }
            }
        }
        ?>
        <h1><?php 
        for ($i=0; $i < count($_SESSION["bolas"]); $i++) { 
            echo '/'.$_SESSION["bolas"][$i].'/ ';
        }
        ?></h1>
        <form action="juego.php" method="POST">
            <input type="text" name="primero" id="primero" hidden value="existo mi rey">
            <button type="submit" id="boton_bola">Bola</button>
        </form>
        <div id="carton1">
            <table>
                <tr>
                    <?php $cp1 = false; $cp2 = false;$cp3 = false;$cp4 = false;$cp5 = false;$cp6 = false;$cp7 = false;$cp8= false;$cp9 = false;$cp10 = false;$cp11 = false;$cp12 = false;
                    $cs1 = false; $cs2 = false;$cs3 = false;$cs4 = false;$cs5 = false;$cs6 = false;$cs7 = false;$cs8= false;$cs9 = false;$cs10 = false;$cs11 = false;$cs12 = false;  ?>
                    <td id="cartonp1" <?php if (in_array($_SESSION["numero_cartones1"][0],$_SESSION["bolas"])){$cp1= true; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones1"][0]; ?></td>
                    <td id="cartonp2"<?php if (in_array($_SESSION["numero_cartones1"][1],$_SESSION["bolas"])) {$cp2= true; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones1"][1]; ?></td>
                    <td id="cartonp3"<?php if (in_array($_SESSION["numero_cartones1"][2],$_SESSION["bolas"])) {$cp3= true; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones1"][2]; ?></td>
                    <td id="cartonp4"<?php if (in_array($_SESSION["numero_cartones1"][3],$_SESSION["bolas"])) {$cp4= true; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones1"][3]; ?></td>
                </tr>
                <tr>
                    <td id="cartonp5"<?php if (in_array($_SESSION["numero_cartones1"][4],$_SESSION["bolas"])) {$cp5= true; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones1"][4]; ?></td>
                    <td id="cartonp6"<?php if (in_array($_SESSION["numero_cartones1"][5],$_SESSION["bolas"])) {$cp6= true; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones1"][5]; ?></td>
                    <td id="cartonp7"<?php if (in_array($_SESSION["numero_cartones1"][6],$_SESSION["bolas"])) {$cp7= true; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones1"][6]; ?></td>
                    <td id="cartonp8"<?php if (in_array($_SESSION["numero_cartones1"][7],$_SESSION["bolas"])) {$cp8= true; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones1"][7]; ?></td>
                </tr >
                <tr>
                    <td id="cartonp9"<?php if (in_array($_SESSION["numero_cartones1"][8],$_SESSION["bolas"]))   {$cp9= true; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones1"][8]; ?></td>
                    <td id="cartonp10"<?php if (in_array($_SESSION["numero_cartones1"][9],$_SESSION["bolas"]))  {$cp10= true; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones1"][9]; ?></td>
                    <td id="cartonp11"<?php if (in_array($_SESSION["numero_cartones1"][10],$_SESSION["bolas"])) {$cp11= true; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones1"][10]; ?></td>
                    <td id="cartonp12"<?php if (in_array($_SESSION["numero_cartones1"][11],$_SESSION["bolas"])) {$cp12= true; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones1"][11]; ?></td>
                </tr>
            </table>
        </div>
        <br><br><br><br><br>
        <div id="carton2">
            <table>
                <tr>
                    <td id="cartons2"<?php if (in_array($_SESSION["numero_cartones2"][1],$_SESSION["bolas"])) {$cs1=True; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones2"][1]; ?></td>
                    <td id="cartons3"<?php if (in_array($_SESSION["numero_cartones2"][2],$_SESSION["bolas"])) {$cs2=True; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones2"][2]; ?></td>
                    <td id="cartons1"<?php if (in_array($_SESSION["numero_cartones2"][0],$_SESSION["bolas"])) {$cs3=True; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones2"][0]; ?></td>
                    <td id="cartons4"<?php if (in_array($_SESSION["numero_cartones2"][3],$_SESSION["bolas"])) {$cs4=True; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones2"][3]; ?></td>
                </tr>
                <tr>
                    <td id="cartons5"<?php if (in_array($_SESSION["numero_cartones2"][4],$_SESSION["bolas"])) {$cs5=True; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones2"][4]; ?></td>
                    <td id="cartons6"<?php if (in_array($_SESSION["numero_cartones2"][5],$_SESSION["bolas"])) {$cs6=True; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones2"][5]; ?></td>
                    <td id="cartons7"<?php if (in_array($_SESSION["numero_cartones2"][6],$_SESSION["bolas"])) {$cs7=True; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones2"][6]; ?></td>
                    <td id="cartons8"<?php if (in_array($_SESSION["numero_cartones2"][7],$_SESSION["bolas"])) {$cs8=True; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones2"][7]; ?></td>
                </tr >
                <tr>
                    <td id="cartons9"<?php if (in_array($_SESSION["numero_cartones2"][8],$_SESSION["bolas"])) {$cs9=True; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones2"][8]; ?></td>
                    <td id="cartons10"<?php if (in_array($_SESSION["numero_cartones2"][9],$_SESSION["bolas"])) {$cs10=True; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones2"][9]; ?></td>
                    <td id="cartons11"<?php if (in_array($_SESSION["numero_cartones2"][10],$_SESSION["bolas"])) {$cs11=True; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones2"][10]; ?></td>
                    <td id="cartons12"<?php if (in_array($_SESSION["numero_cartones2"][11],$_SESSION["bolas"])) {$cs12=True; echo 'class="tachado"';}?>><?php echo $_SESSION["numero_cartones2"][11]; ?></td>
                </tr>
            </table>
        </div>
        <br><br><br><br>
        <div>
            <h1>
                Carton 1: 
                <?php 
                $cantidad1h= 0;
                $cantidad1v= 0;
                $completado1=0;
                if ($cp1 and $cp2 and  $cp3 and  $cp4) {
                    $cantidad1h=10;
                }
                if($cp8 and $cp5 and  $cp6 and  $cp7){
                    $cantidad1h=10;
                }
                if($cp9 and $cp10 and  $cp11 and  $cp12){
                    $cantidad1h=10;
                }
                if ($cp1 and $cp5 and  $cp9) {
                    $cantidad1v=10;
                }
                if($cp2 and $cp6 and  $cp10){
                    $cantidad1v=10;
                }
                if($cp3 and $cp7 and  $cp11){
                    $cantidad1v=10;
                }
                if($cp4 and $cp8 and  $cp12){
                    $cantidad1v=10;
                }
                if($cp1 and $cp2 and  $cp3 and  $cp4 and $cp8 and $cp5 and  $cp6 and  $cp7 and $cp9 and $cp10 and  $cp11 and  $cp12){
                    $completado1 = 20;
                }
                echo $cantidad1h+$cantidad1v+$completado1."€";

                if(($cantidad1h+$cantidad1v+$completado1)==40){ echo "       Ganador!!!!";}
                ?>
            </h1>
            <h1>
                Carton 2: 
                <?php 
                $cantidad2h= 0;
                $cantidad2v= 0;
                $completado2=0;
                if ($cs1 and $cs2 and  $cs3 and  $cs4) {
                    $cantidad2h=10;
                }
                if($cs8 and $cs5 and  $cs6 and  $cs7){
                    $cantidad2h=10;
                }
                if($cs9 and $cs10 and  $cs11 and  $cs12){
                    $cantidad2h=10;
                }
                if ($cs1 and $cs5 and  $cs9) {
                    $cantidad2v=10;
                }
                if($cs2 and $cs6 and  $cs10){
                    $cantidad2v=10;
                }
                if($cs3 and $cs7 and  $cs11){
                    $cantidad2v=10;
                }
                if($cs4 and $cs8 and  $cs12){
                    $cantidad2v=10;
                }

                if($cs1 and $cs2 and  $cs3 and  $cs4 and $cs8 and $cs5 and  $cs6 and  $cs7 and $cs9 and $cs10 and  $cs11 and  $cs12){
                    $completado2=20;
                }
                
                echo $cantidad2h+$cantidad2v+$completado2."€";

                if(($cantidad2h+$cantidad2v+$completado2)==40){ echo "       Ganador!!!!";}
                ?>
            </h1>
        </div>
    </body>
</html>