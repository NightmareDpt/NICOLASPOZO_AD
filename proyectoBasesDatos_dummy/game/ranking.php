<!DOCTYPE html>
<html lang="en">
<?php
    session_start();

        require_once('../dbutils.php');
        $conexion = conecctDB();
        //consultamos la tabla de ranking
        $ranking_bd=mostrarRankingPrincipal($conexion);
        $mazos=parametrosMazo($conexion);
        //meter el ultimo metido si viene de juego.php 
        if(isset($_SESSION["Puntuacion"])){
            $ranking_bd=comprobarUltimaPuntuacion($ranking_bd,$_SESSION["Puntuacion"],$_SESSION["opcion"]);
        }
         
        //Comprobamos si le ha dado al boton de guardar para guardar los datos introducidos anteriormente
        if(isset($_POST["Iniciar"])&&$_POST["Iniciar"]=="guardar"){
            //Comprobar si ha introducido el nombre
            if($_POST["letra_1"]!=""&&$_POST["letra_2"]!=""&&$_POST["letra_3"]!=""){
                //En caso de haber introducido todo bien creamos la partida
                $nombre=strtoupper($_POST["letra_1"]).strtoupper($_POST["letra_2"]).strtoupper($_POST["letra_3"]);
                crearPartida($conexion,$nombre,$_SESSION["Puntuacion"],$_SESSION["opcion"]);
                //Actualizamos la tabla para tener los nuevos datos
                $ranking_bd=array();
                $ranking_bd=mostrarRankingPrincipal($conexion);
                //Sacamos un mensaje para que el usuario sepa que se han registrado sus datos
                echo "<script>alert('!Felicidades ".$nombre.", se ha registrado tu partida\nPuntuacion: ".$_SESSION["Puntuacion"]."\nMazo: ".$_SESSION["opcion"]." ')</script>";
                //Destruimos la sesion para no crear posibles problemas
                session_destroy();
            }else{//Sino están las 3 siglas escritas sacamos una alerta
                echo "<script>alert('Debe de introducir las 3 siglas para registrar su puntuación')</script>";
            }
        
        }else if(isset($_POST["Iniciar"])&&$_POST["Iniciar"]=="inicio"){
                //Destruimos la sesion para no crear posibles problemas
                session_destroy();            
            header("location:../index.php");
        }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Ranking</title>
</head>

<body id="cuerpo_ochentero">

    <form action="./ranking.php" method="post">

    <button type="submit" class="btn btn-primary btn-lg bt_iniciar" name="Iniciar" value="inicio">VOLVER &nbsp;&nbsp; A &nbsp;&nbsp; INICIO</button>
    <div >
        <!-- Cabecera de la tabla -->
        <h1 id="centrado_titulo" style="color:#cc0000;">RANKING GENERAL</h1>        
    <table class="table" id="tabla_ranking">
    <thead>
        <tr>
        <th scope="col">POSICION</th>
        <th scope="col" >SIGLAS</th>
        <th scope="col">MAZO</th>
        <th scope="col">PUNTUACION</th>
        </tr>
    </thead>
    <!-- CUERPO DE LA TABLA -->
    <tbody>
<?php
    for($i=0; $i < 10;$i++){
        if($i==0){
            $color="#efb810";
        }else if($i==1){
            $color="#c0c0c0";
        }else if($i==2){
            $color="#cd7f32";
        }else{
            $color="#8cc895";
        }

        if(isset($ranking_bd[$i])&&$ranking_bd[$i]["nombre"]=="ZZZZ"){
            echo '
            <tr style="color:'.$color.';">
            <th scope="row">'.($i+1).'</th>
            <td>
            <input type="text" name="letra_1" id="input_alineado" class="col-3" value="'.(isset($_POST["letra_1"]) ? $_POST["letra_1"] :"").'"  maxlength="1" minlength="1">
            <input type="text" name="letra_2" id="input_alineado" class="col-3" value="'.(isset($_POST["letra_2"]) ? $_POST["letra_2"] :"").'" maxlength="1" minlength="1">
            <input type="text" name="letra_3" id="input_alineado" class="col-3" value="'.(isset($_POST["letra_3"]) ? $_POST["letra_3"] :"").'" maxlength="1" minlength="1">
          </td>
          <td>
          '.$mazos[array_search($ranking_bd[$i]["ID_mazo"],array_column($mazos, 'id'))]["nombre"].'
          </td>
            <td>
            '.$ranking_bd[$i]["puntuacion"].'
            </td>
            <td>
            <button type="submit" class="btn btn-primary btn-lg" name="Iniciar" value="guardar">GUARDAR</button>
            </td>
            </tr>
            ';
        }else if(isset($ranking_bd[$i])){
            echo '
            <tr style="color:'.$color.';">
            <th scope="row">'.($i+1).'</th>
            <td>
            '.$ranking_bd[$i]["nombre"].' 
            </td>
            <td>
            '.$mazos[array_search($ranking_bd[$i]["ID_mazo"],array_column($mazos, 'id'))]["nombre"].'
            </td>
            <td>
            '.$ranking_bd[$i]["puntuacion"].'
            </td>
            </tr>
            ';
        }else{
            echo '
            <tr style="color:'.$color.';">
            <th scope="row">'.($i+1).'</th>
            <td>
             _ _ _
          </td>
          <td>
          _ _ _ _ _
          </td>
            <td>
            0
            </td>
            </tr>
            ';
        }
    }
//    if(is_numeric(array_search("ZZZZ",array_column($ranking_bd,'nombre'))))
 //  
?>

  </tbody>

</table>

</form>

</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>