<!DOCTYPE html>
<html lang="esp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Mazos</title>
</head>
<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: ../login.php');
    exit;
}
if (isset($_POST['nombremazo'])) {
    require_once('../../dbutils.php');
    $conexion = conecctDB();
    crearMazo($conexion, $_POST['nombremazo'], $_POST['descripcion']);
    echo ('<script>alert("Mazo Creado")</script>');
}
?>

<body id="cuerpo_ochentero">
    <a href="../workspace.php">
        <button id="link_admin">Volver</button>
    </a>
    <div id="hoja">
        <form action="./mazos.php" method="post" id="formulario_usuarios">
            <div class="mb-3">
                <label for="nombremazo" class="form-label">Nombre del Mazo</label>
                <input type="text" class="form-control" id="nombremazo" name="nombremazo">
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Descripcion" id="floatingTextarea2" style="height: 100px"
                    name="descripcion"></textarea>
                <label for="floatingTextarea2">Descripcion</label>
            </div>
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