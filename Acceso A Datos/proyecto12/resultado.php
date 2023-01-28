<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<?php
var_export($_POST);
require_once("dbutils.php");
$conexion = conectarDB();
$tamanio = $_POST['tamanio'];
$color = $_POST['color'];
?>

<body>
    <table border="2px">
        <tr>
            <th>Nombre</th>
            <th>Color</th>
            <th>Tamaño</th>
        </tr>';
        <?php        
                $hortalizas = getfilteredHortalizas($conexion, $tamanio, $color);
                var_dump($hortalizas);
        foreach ($hortalizas as $value) {
            echo '
            <tr>
            <td>'.$value["NOMBRE"].'</td>
            <td>'.$value["COLOR"].'</td>
            <td>'.$value["TAM"].'</td>
            </tr>'; 
        }
        ?>

    </table>
</body>

</html>