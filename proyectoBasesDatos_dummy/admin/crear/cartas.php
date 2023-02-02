<!DOCTYPE html>
<html lang="esp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Cartas</title>
</head>
<?php
session_start();
require_once('../../dbutils.php');
$conexion = conecctDB();
if (!isset($_SESSION['user_name'])) {
    header('Location: ../login.php');
    exit;
}
$array = parametrosMazo($conexion);
if (isset($_POST['nombrecarta'])) {
    $errors = array();
    $file_name = $_FILES['imagen']['name'];
    $file_size = $_FILES['imagen']['size'];
    $file_tmp = $_FILES['imagen']['tmp_name'];
    $file_type = $_FILES['imagen']['type'];

    move_uploaded_file($_FILES['imagen']['tmp_name'], "../../media/" . $_FILES['imagen']['name']);

    $extensions = array("jpeg", "jpg", "png", "jwepb");
    crearCartas($conexion, $_POST['nombrecarta'], $_POST['annocarta'], $_FILES['imagen']['name'], $_POST['opcion']);
    echo ('<script>alert("Carta Creada")</script>');
}
?>

<body>
    <a href="../workspace.php">
        <button id="link_admin">Volver</button>
    </a>
    <div id="hoja">
        <form action="./cartas.php" method="post" id="formulario_usuarios" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombrecarta" class="form-label">Nombre de la carta</label>
                <input type="text" class="form-control" id="nombrecarta" name="nombrecarta">
            </div>
            <div class="mb-3">
                <label for="annocarta" class="form-label">Año de la carta</label>
                <input type="text" class="form-control" id="annocarta" name="annocarta">
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input class="form-control" type="file" id="imagen" name="imagen">
            </div>
            <select class="form-select" aria-label="Default select example" name="opcion" id="select">
                <option selected value="vacio">¿En que mazo?</option>
                <?php
                foreach ($array as $row) {
                    echo ('<option value="' . $row['nombre'] . '">' . $row['nombre'] . '</option>');
                }
                ?>
            </select>
            <button type="submit" class="btn btn-primary">Crear Mazo</button>
        </form>
    </div>


</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="../js/index.js"></script>

</html>