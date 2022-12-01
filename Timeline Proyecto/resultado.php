<html>
    <?php
    session_start();
    if(!isset($_SESSION['victoria']))
        echo header("Location:./menu.php");
    $color="";
    if($_SESSION['victoria'])
        $color="url('./medios/confeti.png')";
    else
        $color="url('./medios/derrota.jpg')";
    ?>
    <head></head>
    <style>
    body {
    background-image: <?php echo $color ?>;
    background-repeat: no-repeat;
    background-size: contain;    }
    center{
        margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    }
    </style>

        <body>
        <center>
        <?php
            if($_SESSION['victoria'])
                echo '<h1>Has ganado '.$_SESSION['nombre'].'<br>Numero de fallos: '.(count($_SESSION['repes'])-4).'.</h1>
                <form action="menu.php" method="post"><button type="submit"><h1>Volver a jugar</h1></button> </form>';
            else
                echo '<h1 style="color:"white";">Has perdido '.$_SESSION['nombre'].'.</h1>
                    <form action="menu.php" method="post"><button type="submit"><h1>Reintentar</h1></button> </form>
                ';
        session_destroy();        
        ?>    
          
        </center>
    </body>
</html>
