<!DOCTYPE html>
<html lang="esp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MENU</title>
</head>

<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
    exit;
}
if (isset($_POST['cerrar_sesion'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}
?>

<body id="cuerpo_ochentero">
    <form action="./workspace.php" method="post" id="form_cerrar_sesion">
        <input type="text" name="cerrar_sesion" hidden value="true">
        <button class="btn btn-primary btn-lg bt_iniciar" onclick="cerrarSesion()">INICIAR &nbsp;&nbsp; SESION</button>
    </form>
    <div id="cuerpo_ochentero_centrado"  class="row">
        <div class="card text-center mb-3 text-bg-dark" id="cuerpo_ochentero" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Cartas</h5>
                <p class="card-text">Crea, modifica o borra cartas en mazos especificos</p>
                <a href="./crear/cartas.php" class="btn btn-primary m-1">Agregar</a>
                <a href="./crear/modificarCartas.php" class="btn btn-primary m-1">Modificar</a>
                <a href="./crear/borrarCarta.php" class="btn btn-primary m-1">Borrar</a>
            </div>
        </div>
        &nbsp;&nbsp;&nbsp;
        <div class="card text-center mb-3 text-bg-dark" id="cuerpo_ochentero" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Mazos</h5>
                <p class="card-text">Crea, modifica o borra un mazo</p><br>
                <a  href="./crear/mazos.php" class="btn btn-primary m-1">Agregar</a>
                <a  href="./crear/modificarMazos.php" class="btn btn-primary m-1">Modificar</a>
                <a  href="./crear/borrarMazos.php" class="btn btn-primary m-1">Borrar</a>

            </div>
        </div>
        &nbsp;&nbsp;&nbsp;
        <div class="card text-center text-bg-dark mb-3" id="cuerpo_ochentero" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Users</h5>
                <p class="card-text">Crear un Usuario nuevo</p>
                <a href="./crear/usuarios.php" class="btn btn-primary">Crear Usuario</a>
            </div>
        </div>
    </div>
</body>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="../js/index.js"></script>

</html>