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

if (isset($_POST['opcion3'])) {
    elminarCartas($conexion, $_POST['opcion3']);
    echo ('<script>alert("Carta Borrada")</script>');
}
$array = parametrosMazo($conexion);
$arraycartas = mostrarCartas($conexion);
?>

<body>
    <a href="../workspace.php">
        <button id="link_admin">Volver</button>
    </a>
    <div id="hoja">

        <form action="./borrarCarta.php" method="post" id="formulario_usuarios" enctype="multipart/form-data">
            <select class="form-select" aria-label="Default select example" name="opcion2" id="select2">
                <option selected value="vacio">¿En que mazo?</option>
                <?php
                foreach ($array as $row) {
                    echo ('<option value="' . $row['nombre'] . '">' . $row['nombre'] . '</option>');
                }
                ?>
            </select>
            <select class="form-select" aria-label="Default select example" name="opcion3" id="select3"
                aria-placeholder="Cartas">
                <option selected value="nada">Elige Carta</option>
            </select>
            <div class="mb-3">
                <label for="nombrecarta" class="form-label">Nombre de la carta</label>
                <input type="text" class="form-control" id="nombrecarta" name="nombrecarta" disabled>
            </div>
            <div class="mb-3">
                <label for="annocarta" class="form-label">Año de la carta</label>
                <input type="text" class="form-control" id="annocarta" name="annocarta" disabled>
            </div>
            <img src="..." class="rounded mx-auto d-block" id="imagenVer" height="200" width="200">
            <button type="submit" class="btn btn-primary">Borrar Carta</button>
        </form>
    </div>
</body>
<script>
var datos_php = <?php
                    echo json_encode($array); ?>;
var datos_carta = <?php
                        echo json_encode($arraycartas);
                        ?>;

document.getElementById("select2").addEventListener("change", function() {
    var opcionSeleccionada = this.value;
    var select = document.querySelector("#select3")
    var longitud = select.options.length;
    for (var i = 0; i < longitud; i++) {
        select.remove(1);
    }
    datos_carta.forEach(function(dato) {
        var option = document.createElement("option");
        if (dato['mazo'] == opcionSeleccionada) {
            option.text = dato['nombre']
            option.value = dato['id']
            select.add(option)
        }
        if (opcionSeleccionada == "vacio") {
            document.querySelector("#nombrecarta").value = ""
            document.querySelector("#annocarta").value = ""
            document.querySelector("#imagenVer").src = "..."
        }
    });
});
document.querySelector("#select3").addEventListener("change", function() {
    var opcion2 = this.value
    datos_carta.forEach(function(dato) {
        if (dato.id == opcion2) {
            document.querySelector("#nombrecarta").value = dato.nombre;
            document.querySelector("#annocarta").value = dato.anno;
            document.querySelector("#imagenVer").src = `../../media/${dato.imagen}`
        }
        if (opcion2 == "nada") {
            document.querySelector("#nombrecarta").value = ""
            document.querySelector("#annocarta").value = ""
            document.querySelector("#imagenVer").src = "..."
        }
    });
})
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="../../js/index.js"></script>

</html>