<!DOCTYPE html>
<html lang="esp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
    exit;
}
?>

<body>
    <div id="Cartas" class="row">
        <div class="card text-center mb-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Cartas</h5>
                <p class="card-text">Crea cartas nuevas en mazos especificos</p>
                <a href="#" class="btn btn-primary">Añadir</a>
            </div>
        </div>
        <div class="card text-center mb-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Mazos</h5>
                <p class="card-text">Crea un mazo nuevo</p>
                <a href="#" class="btn btn-primary">Añadir</a>
            </div>
        </div>
        <div class="card text-center mb-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Users</h5>
                <p class="card-text">Crear un Usuario nuevo</p>
                <a href="#" class="btn btn-primary">Crear Usuario</a>
            </div>
        </div>
    </div>
</body>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

</html>