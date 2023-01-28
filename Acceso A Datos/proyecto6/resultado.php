<html>
    <head></head>

    <body>
        <?php 
        var_export($_POST);
        if ($_POST["numero1"]==0||$_POST["numero2"]==0) {
            echo "<h1>pero tu eres tonto o te has dado contra un poyete?</h1>";
        }
        ?>

<a href="./calculadora.php"><input type="button" value="Volver a la calculadora"></a>
    </body>
</html>