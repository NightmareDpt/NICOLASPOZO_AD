<html>
    <head><title>Menu Inicial</title></head>
    <body>
        <?php
            session_start();
            $bolas = array();
            $numero_cartones1 = array();
            $numero_cartones2 = array();
            $repesBolas = array();
        ?>
        <?php 
        if (isset(($_POST["nombre"])) && $_POST["nombre"]!=""){
            $_SESSION["bolas"] = $bolas;
            $_SESSION["numero_cartones1"] = $numero_cartones1;
            $_SESSION["numero_cartones2"] = $numero_cartones2;
            $_SESSION["repesBolas"]= $repesBolas;
            echo header("Location:./juego.php");
        }
        ?>
    <center>
        <h1>BIENVENIDO A EL BINGO PEREZOSO</h1>
        <form action="Index.php" method="post" id="formInicio">
        <br><br><br><br><br>
            <input type="text" name="nombre" class="nombre" placeholder="Inserte su nombre"><br><br>
            <input type="text" name="primero" id="primero" hidden value="Noexisto">
            <br><br>
            <button role="button" type="submit"><span class="text">Iniciar el juego</span></button>
        </form>
    </center>
    </body>
</html>