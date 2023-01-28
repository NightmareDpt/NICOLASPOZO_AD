<html>
    <head><title>chofi</title></head>
    <style>
        body {text-align: center;}
    </style>
    <body>
    <h1>CHOFO</h1>
        <form action="./batallafinal.php" method="post">
        <?php 
        // var_export($_POST);batalla1num
        $numeroB1 = $_POST['batalla1num'];
        echo "<input type='hidden' name='batalla1num' value='$numeroB1'>";
        ?>
        <input type="number" name="numero" min="1" max="10">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="¡Segundo Asalto!">
        <br><br><br>
        <select name="dificultad">
            <option value="1">Diferencia de 1</option>
            <option value="2">Diferencia de 2</option>
            <option value="3">iguales</option>
        </select>
        <br><br>
        <select name="dificultad2">
            <option value="1">Diferencia de 1</option>
            <option value="2">Diferencia de 2</option>
            <option value="3">iguales</option>
        </select>
        </form>
    </body>
</html>