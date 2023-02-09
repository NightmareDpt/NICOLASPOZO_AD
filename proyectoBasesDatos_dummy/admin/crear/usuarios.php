<!DOCTYPE html>
<html lang="esp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Users</title>
</head>
<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: ../login.php');
    exit;
}

if (isset($_POST['username']) && isset($_POST['pswd']) && isset($_POST['nombreC']) && isset($_POST['correo'])) {
    require_once('../../dbutils.php');
    $password = password_hash($_POST['pswd'], PASSWORD_DEFAULT);
    $conexion = conecctDB();
    crearUsur($conexion, $_POST['username'], $_POST['nombreC'], $_POST['pswd'], $_POST['correo']);
    echo ('<script>alert("Usuario Creado")</script>');
}
?>

<body>
    <a href="../workspace.php">
        <button id="link_admin">Volver</button>
    </a>
    <div id="hoja">
        <form action="./usuarios.php" method="post" id="formulario_usuarios">
            <div class="mb-3">
                <label for="nombreuser" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="nombreuser" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="pswd">
            </div>
            <div class="mb-3">
                <label for="nombrecompleto" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="nombrecompleto" name="nombreC">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <button type="submit" class="btn btn-primary">Nuevo Usuario</button>
        </form>
    </div>


</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="../js/index.js"></script>

</html>