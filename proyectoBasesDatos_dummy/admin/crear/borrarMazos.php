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
require_once('../../dbutils.php');
$conexion = conecctDB();
$array = array();
if (isset($_POST['opcion'])) {
    borrarMazo($conexion, $_POST['opcion']);
    echo ('<script>alert("Mazo Borrado")</script>');
}
$array = parametrosMazo($conexion);
?>

<body id="cuerpo_ochentero">
    <a href="../workspace.php">
        <button id="link_admin">Volver</button>
    </a>
    <div id="hoja">
        <form action="./borrarMazos.php" method="post" id="formulario_usuarios">
            <select class="form-select" aria-label="Default select example" name="opcion" id="select_mazo">
                <option selected value="vacio">¿Cúal quieres modificar?</option>
                <?php
                foreach ($array as $row) {
                    echo ('<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>');
                }
                ?>
            </select>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Descripcion" id="descripcion" style="height: 100px"
                    name="descripcion"></textarea>
                <label for="descripcion">Descripcion</label>
            </div>
            <button type="submit" class="btn btn-primary">Borrar Mazo</button>
        </form>
    </div>

</body>

<script>
var datos_php = <?php
                    $array_json = json_encode($array);
                    echo json_encode($array); ?>;
var nombre = document.getElementById("nombremazo")
var descripcion = document.getElementById("descripcion")

document.getElementById("select_mazo").addEventListener("change", function() {
    var opcionSeleccionada = this.value;
    datos_php.forEach(function(dato) {
        if (dato.id == opcionSeleccionada) {
            descripcion.value = dato.descripcion
        }
        if (opcionSeleccionada == "vacio") {
            descripcion.value = ""
        }
    });
});
</script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

</html>