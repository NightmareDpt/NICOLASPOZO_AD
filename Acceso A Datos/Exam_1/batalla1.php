<html>
    <head></head>
    <style>
        body {text-align: center;}
    </style>
    <body>
<form action='chofo.php' method='post'>
        <?php 
        // var_export($_POST);
        $numeroAleatorio = rand(1,3);
        if ($_POST['dificultad']== 1) {
            if ($_POST['numero']< $numeroAleatorio) {
                echo "<h1>CHOFI SACA</h1><br>";
                echo "<h2>$numeroAleatorio</h2><br><br><br>";
                echo "<input type='hidden' name='batalla1num' value='$numeroAleatorio'>";
            } else {
                echo "<h1>CHOFI SACA</h1><br>";
                echo "<h2>$numeroAleatorio</h2><br><br><br>";
            }
        }
        if ($_POST['dificultad']== 2) {
            if ($_POST['numero']> $numeroAleatorio) {
                echo "<h1>CHOFI SACA</h1><br>";
                echo "<h2>$numeroAleatorio</h2><br><br><br>";
                echo "<input type='hidden' name='batalla1num' value='$numeroAleatorio'>";
            } else {
                echo "<h1>CHOFI SACA</h1><br>";
                echo "<h2>$numeroAleatorio</h2><br><br><br>";
            }
        }
        if ($_POST['dificultad']== 3) {
            if ($_POST['numero']== $numeroAleatorio) {
                echo "<h1>CHOFI SACA</h1><br>";
                echo "<h2>$numeroAleatorio</h2><br><br><br>";
                echo "<input type='hidden' name='batalla1num' value='$numeroAleatorio'>";
            } else {
                echo "<h1>CHOFI SACA</h1><br>";
                echo "<h2>$numeroAleatorio</h2><br><br><br>";
            }
        }
        ?>
            <input type='submit' value='Continuas!' id="botonSeguir">
            <input type='button' value='Mueres!' id="botonMuerte" onclick="window.location.href='chofi.php'">
        </from>

        <script>
        if (<?php echo $_POST['dificultad'];?> == 1) {
        if (<?php echo $_POST['numero'];?> < <?php echo $numeroAleatorio;?>){const botonMuerte = document.getElementById('botonMuerte');botonMuerte.disabled = true; 
        } else{const botonSeguir = document.getElementById('botonSeguir');botonSeguir.disabled = true; }
        }
        if (<?php echo $_POST['dificultad'];?> == 2) {
        if (<?php echo $_POST['numero'];?> > <?php echo $numeroAleatorio;?>){
            const botonMuerte = document.getElementById('botonMuerte');
            botonMuerte.disabled = true; 
        } else{
            const botonSeguir = document.getElementById('botonSeguir');
            botonSeguir.disabled = true; }
        }   
        if (<?php echo $_POST['dificultad'];?> == 3) {
        if (<?php echo $_POST['numero'];?> == <?php echo $numeroAleatorio;?>){
            const botonMuerte = document.getElementById('botonMuerte');
            botonMuerte.disabled = true; 
        } else{
            const botonSeguir = document.getElementById('botonSeguir');
            botonSeguir.disabled = true; 
            }
        }
        </script>
            </body>
</html>