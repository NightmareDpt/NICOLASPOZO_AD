<html>
    <head></head>
    <style>
        body {text-align: center;}
    </style>

    <body>
    <?php 
    echo "<h1>CHOFO SACA </h1> <br><br>";
    //var_export($_POST);
    $numeroAleatorio = rand(1,10);
    echo "<h2>$numeroAleatorio</h2><br><br><br>";
    $victoria = false;

    if($_POST['dificultad'] == 3 || $_POST['dificultad2']== 3){
    if ($numeroAleatorio == $_POST['numero']) {
        $victoria = true;
    }
    if($_POST['batalla1num'] == $_POST['numero']) {
        $victoria = true;
    }}



    if ($victoria == true) {
        echo "<h1>Enhorabuena de la buena</h1>";
    }else {
        echo "<h1>OHHHHHHHHHHHHHHHHHHH!</h1>";
    }
    ?>    
    </body>
</html>