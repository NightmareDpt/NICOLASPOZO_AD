<!DOCTYPE html>
<html lang="esp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>

<?php
if (isset($_SESSION)) {
    session_destroy();
}
if (isset($_POST['username']) && isset($_POST['password'])) {
    require_once('../dbutils.php');
    $miconexion = conecctDB();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $validar = validateUser($miconexion, $username, $password);
    if ($validar) {
        session_start();
        $_SESSION['user_name'] = $_POST['username'];
        header('Location: workspace.php');
        exit;
    } else {
        echo ('<script>alert("El usuario o la contraseña no estan bien escritos")</script>');
    }
}
?>

<body id="cuerpo_ochentero">
<a href="../index.php"> 
        <button class="btn btn-primary btn-lg bt_iniciar" id="link_admin">VOLVER &nbsp;&nbsp; A &nbsp;&nbsp; INICIO</button>
    </a>
    <div id="hoja">
        <form action="./login.php" method="post">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Usuario&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <input type="text" class="form-control" name="username" placeholder="Inserte su usuario" aria-describedby="addon-wrapping">
            </div>
            <br>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Contraseña</span>
                <input type="password" class="form-control" name="password" placeholder="Inserte su contraseña" aria-describedby="addon-wrapping">
            </div>
            <button ttype="submit" value="Log in" class="btn btn-primary btn-lg bt_iniciar" id="link_admin">INICIAR &nbsp;&nbsp; SESION</button>
        </form>
    </div>    
</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="../css/style.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>