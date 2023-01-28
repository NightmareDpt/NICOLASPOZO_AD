<html>
    <head>
        <?php 
        session_start();
        var_export($_POST);
        $loginOK = false;
        if(isset($_POST["snombre"])){
            //peticion a base de datos
            if ($_POST["snombre"] == "a") {
                $passDB ="1";
                if($passDB == $_POST["spass"]){
                    $loginOK = true;
                    $_SESSION["user"] = $_POST["snombre"];
                    $_SESSION["pass"] = $_POST["spass"];
                    echo header('Location:b.php');
                }
            }
            else {
                $loginOK=false;
            }
        }
        ?>
    </head>
    <body>
        <form action="a.php" method="post">
            <label for="">User:</label><input type="text" name="snombre" id="">
            <label for="">Password:</label><input type="password" name="spass" id="">
            <input type="submit" value="Ya ta">
            <br>
            <label> <?php 
            if (isset($_POST["snombre"])){
                echo(($loginOK)?"Estas dentro":"Error credenciales");
        }
             ?></label>
        </form>
    </body>
</html>