<!DOCTYPE html>
<html lang="esp ">
<?php
session_start();
//Preguntamos si viene de la pagina de login viendo si existe una sessión de tipo nombre
if(isset($_SESSION["nombre"])){
    //Conectamos con la base de datos
    require_once('../dbutils.php');
    $conexion = conecctDB();
    //recogemos el nombre del mazo que selecciono el usuario
    $dato = obtenerNombreMazo($conexion,$_SESSION["opcion"]);
        if(isset($_POST["Puntuacion"])){
            //Registramos la partida con la puntuación dada por el usuario
            crearPartida($conexion,$_SESSION['nombre'],$_POST["Puntuacion"],$_SESSION["opcion"]);
                //Se lanza una alerta para indicar que se ha hecho el registro
            echo '<script language="javascript">alert("Se ha registrado la partida de '.$_SESSION['nombre'].' con una puntuación de '.$_POST["Puntuacion"].'");</script>';
                //Cerramos la sesión de la partida
                session_destroy();
                //redirigimos a la pagina de ranking con las tablas de posiciones
                header("location: ./ranking.php");
        }
    }else{ //Devolvemos al index si hemos ingresado sin haber pasado antes por el index principal, por ejemplo: volver a la pagina anterior despues de pasar al ranking
        header("location:../index.php");
    }        

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>timeline</title>
</head>
<body id="hoja">
    <!--CABECERA -->
    <h1 class="texto_centrado"><?php echo "Puntuación de ".$_SESSION['nombre']."\ncon el mazo ".$dato[0]["NOMBRE"]; ?></h1>
    <!--INICIO DE FORM -->
    <form action="juego.php" method="post">
    <div class="input-group input-group-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg">PUNTUACIÓN</span>
        <!--INPUT PARA PUNTUACIÓN -->
        <input type="text" class="form-control" aria-label="Sizing example input" name="Puntuacion" aria-describedby="inputGroup-sizing-lg" pattern="^[0-9]{0,9}" maxlength="9">
        <!--A -->
        <button type="submit" class="btn btn-secondary btn-lg">Guardar</button>
    </div>
    </form>
    
</body>
<!--BONITO BONITO -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>