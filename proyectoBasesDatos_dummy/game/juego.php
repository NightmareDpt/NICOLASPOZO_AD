<!DOCTYPE html>
<html lang="esp">
<?php
session_start();
//Preguntamos si viene de la pagina de login viendo si existe una sessión de tipo nombre
if(isset($_SESSION["puntuar"])){
    //Conectamos con la base de datos
    require_once('../dbutils.php');
    $conexion = conecctDB();
    //recogemos el nombre del mazo que selecciono el usuario
    $dato = obtenerNombreMazo($conexion,$_SESSION["opcion"]);
    //Verificar si le ha dado a algún boton
if(isset($_POST["Iniciar"])){
    //verificar si le ha a Guardar.
    if($_POST["Iniciar"]=="ranking"){
        if(isset($_POST["Puntuacion"])){
                //Destruimos la varaible opcion ya que no la utilizaremos
                unset($_SESSION["puntuar"]);
                //Agregamos la puntuación a la session para utilizarlo luego
                $_SESSION["Puntuacion"]=$_POST["Puntuacion"];
                $_SESSION["PrimeraVez"]=true;
                //redirigimos a la pagina de ranking con las tablas de posiciones
                header('location:./ranking.php');
        }
    }else{ //Devolvemos al index si ha dado al boton de volver al inicio
        header("location:../index.php");
    }        
}}else{ //Devolvemos al index si viene de otro lado
    header("location:../index.php");
}     
       
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Puntuación</title>
</head>

<!--INICIO DE BODY -->
<body id="cuerpo_ochentero">
        <!--INICIO DE FORM -->
    <form action="juego.php" method="post">
    <button type="submit" class="btn btn-primary btn-lg bt_iniciar" name="Iniciar" value="inicio">VOLVER &nbsp;&nbsp; A &nbsp;&nbsp; INICIO</button>
    <div id="cuerpo_ochentero_centrado">
        <!--CABECERA -->
        <h1 class="texto_centrado"><?php echo "Inserta &nbsp;&nbsp; tu &nbsp;&nbsp; puntuacion &nbsp;&nbsp;  con &nbsp;&nbsp;  el &nbsp;&nbsp; mazo &nbsp;&nbsp; ".$dato[0]["NOMBRE"]; ?></h1>
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg">PUNTUACION</span>
            <!--INPUT PARA PUNTUACIÓN -->
            <input type="text" class="form-control" aria-label="Sizing example input" name="Puntuacion" aria-describedby="inputGroup-sizing-lg" pattern="^[0-9]{0,9}" maxlength="9">
            <!--A -->
            <button type="submit" class="btn btn-primary btn-lg" name="Iniciar" value="ranking">Guardar</button>
        </div>
    </div>
    </form>
</body>

<!--BONITO BONITO -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>