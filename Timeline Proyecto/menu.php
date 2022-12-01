<html>
<?php
session_start();
$repes = array();
$cartasMostrar = array();
$mazo = array();
$restantes = 3;

if (isset(($_POST["nombre"])) && $_POST["nombre"]!=""){
    for ($i=0; $i < 4; $i++) { 
        $numero = random_int(0,55);
        if (in_array($numero,$repes)) {
            $i--;
        } else {
            if ($i <1) {
                $cartasMostrar[] = $numero;
            }
            if($i >0){
                $mazo[] = $numero;
            }
            $repes[] = $numero;
        }
    }
    
        $_SESSION["repes"]=$repes;
        $_SESSION["cartasMostrar"]=$cartasMostrar;
        $_SESSION["mazo"]=$mazo;
        $_SESSION["restantes"]=$restantes;
        $_SESSION["nombre"] = $_POST["nombre"];
        $_SESSION["tamanio"] = 1800;
        echo header("Location:./rondas.php");
}

?>
<link rel="stylesheet" href="./estilos/styles2.css">
    <head></head>
    <body>
    <center><h1 style="font-family:Century Gothic;font-size:400%;color:white;">BIENVENIDO AL TIMELINE</h1></center>
        <center>
        <form action="menu.php" method="post" id="formInicio">
            <br><br><br><br><br>
            <input type="text" name="nombre" class="nombre" placeholder="Inserte su nombre"><br><br>
            <br><br>
            <button class="button-64" role="button" type="submit"><span class="text">Iniciar el juego</span></button>
                
        </form>
        </center>
    </body>
</html>