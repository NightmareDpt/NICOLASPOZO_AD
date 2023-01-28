<!DOCTYPE html>
<html lang="esp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<?php
require_once('../dbutils.php');
if (isset($_POST['username']) && isset($_POST['password'])) {
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
    <form action="./login.php" method="post">
        <input type="text" placeholder="Nombre de usuario" name="username">
        <input type="text" placeholder="Contraseña" name="password">
        <input type="submit" value="Log in">
    </form>
</body>

</html>