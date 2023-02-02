<html>
<?php
if(isset( $_SESSION["nombre"])){
    session_destroy();
}
//conexion a base de datos y sacar todos los mazos
require_once('./dbutils.php');
$conexion = conecctDB();
$array = parametrosMazo($conexion);

//Verificar si le ha dado a algún boton
if(isset($_POST["Iniciar"])){
    //verificar si le ha dado a jugar o a iniciar sesión
    if($_POST["Iniciar"]=="jugar"){
        //verificamos si ha elegido un mazo y lanzamos un mensaje en caso contrario
        if($_POST["opcion"]=="vacio"){
                echo '<script language="javascript">alert("¡DEBES DE ELEGIR UN MAZO!");</script>';
        //verificamos si ha introducido 3 caracteres y lanzamos un mensaje en caso contrario        
        }else if($_POST["nombre"]==""||strlen($_POST["nombre"])!=3){
               echo '<script language="javascript">alert("¡EL NOMBRE DEBE DE TENER 3 CARACTERES!");</script>';
        }else{
        //verificamos si todo está bien pasamos a la siguiente ventana y pasamos los datos por session    
            session_start();
            $_SESSION["nombre"]=$_POST["nombre"];
            $_SESSION["opcion"]=$_POST["opcion"];
            header("Location:./game/juego.php");
        }
    
    } else{
        //en caso de darle al boton de Iniciar sesión nos manda a la página de inicio de sesión de admin
        header("Location:./admin/login.php");
    }
}
?>
<link rel="stylesheet" href="./css/style.css">
    <head>
   </head>
    <body>
    
    <center><h1 style="font-family:Century Gothic;font-size:400%;color:white;">BIENVENIDO AL TIMELINE</h1></center>
        <center>
            <!-- INICIO DE FORM -->
        <form action="./index.php" method="post" id="formInicio">
        <button type="submit" class="btn btn-primary btn-lg bt_iniciar" name="Iniciar" value="admin">ADMINISTRACION</button>
         <div id="hoja">
         <br><br><br><br><br>
            <!-- INSERTAR INICIALES -->
            <input type="text" name="nombre" class="nombre" placeholder="INSERTE SUS 3 INICIALES" maxlength="3" minlength="3"><br><br>
            <br><br>
            <!-- LISTA DE MAZOS -->
            <select class="form-select" aria-label="Default select example" name="opcion" id="select_mazo">
                <option selected  value="vacio">Selecciona un mazo para jugar</option>
                <?php
                foreach ($array as $row) {
                    echo ('<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>');
                }
                ?>
            </select>
            <!-- BOTON INICIAR -->
            <br><br><br><br>
            <button type="submit" class="btn btn-primary btn-lg" name="Iniciar" value="jugar">JUGAR</button>
         </div>
        </form>
        </center>
    </body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>