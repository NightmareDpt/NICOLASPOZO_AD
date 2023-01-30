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

<body>
    <a href="../index.php">
        <p id="link_admin">Volver</p>
    </a>
    <form action="./login.php" method="post">
        <input type="text" placeholder="Nombre de usuario" name="username">
        <input type="text" placeholder="Contraseña" name="password">
        <input type="submit" value="Log in">
    </form>
</body>

</html>