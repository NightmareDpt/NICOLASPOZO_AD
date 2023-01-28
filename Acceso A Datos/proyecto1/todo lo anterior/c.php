<html>

<head>

</head>
<body>

<h1>
    <?php
        //var_export($_POST);
        $Salida = $_POST['a']+$_POST['b']+$_POST['c'];
        echo "EL VALOR DE a ES: ";
        
    ?>
    <input type="text" value="<?php echo $Salida;?>"></input>
</h1>

</body>

</html>