<?php

function conecctDB()
{
    try {
        $db = new PDO("mysql:host=localhost; dbname=timeline_proyecto_2;", "root");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $ex) {
        echo ("Error al conectar a la base de datos" . $ex->getMessage());
    }
}

function validateUser($conDB, $user, $passwd)
{
    try {
        $stmt = $conDB->prepare('SELECT * FROM usuarios WHERE usuario = ? AND password = ?');
        $stmt->execute([$user, $passwd]);
        $validar = $stmt->fetch();
        if ($validar) {
            return true;
        }
    } catch (PDOException $e) {
        echo "Error: No tengo ni idea de porque paso..." . $e->getMessage();
    }
}

function crearUsur($conDB, $nombreU, $nombreC, $pswd, $correo)
{
    try {
        $stmt = $conDB->prepare('INSERT INTO usuarios (id,usuario,password,nombre_completo,correo) VALUES (null,:nombre,:contra,:nombrec,:correo)');
        $stmt->bindParam(':nombre', $nombreU);
        $stmt->bindParam(':contra', $pswd);
        $stmt->bindParam(':nombrec', $nombreC);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: No tengo ni idea de porque paso..." . $e->getMessage();
    }
}
function crearMazo($conDb, $nombrem, $descripcion)
{
    if ($descripcion == "") {
        $descripcion = null;
    }
    try {
        $stmt = $conDb->prepare('INSERT INTO mazo (ID,NOMBRE,DESCRIPCION) VALUES (null,:nombrem,:descripcion)');
        $stmt->bindParam(':nombrem', $nombrem);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: No tengo ni idea de porque paso..." . $e->getMessage();
    }
}

function parametrosMazo($db)
{
    $stmt = $db->prepare("SELECT * FROM mazo");
    $stmt->execute();
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $array = array();
    foreach ($datos as $row) {
        $array[] = array(
            "id" => $row['ID'],
            "nombre" => $row['NOMBRE'],
            "descripcion" => $row['DESCRIPCION']
        );
    }
    return $array;
}
function cambiarMazo($db, $id, $nombre, $descripcion)
{

    try {
        $stmt = $db->prepare("UPDATE mazo SET NOMBRE = :nombre, DESCRIPCION = :descripcion WHERE ID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: No tengo ni idea de porque paso..." . $e->getMessage();
    }
}

function borrarMazo($db, $id)
{
    try {
        $stmt = $db->prepare("DELETE FROM mazo WHERE ID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error inesperado" . $e->getMessage();
    }
}

function crearCartas($conDB, $nombre, $anno, $imagen, $mazo)
{
    try {
        $stmt = $conDB->prepare('INSERT INTO cartas (ID,NOMBRE,anno,imagen,mazo) VALUES (null,:nombre,:anno,:imagen,:mazo)');
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':anno', $anno);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':mazo', $mazo);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: No tengo ni idea de porque paso..." . $e->getMessage();
    }
}
function mostrarCartas($db)
{
    $stmt = $db->prepare("SELECT * FROM cartas");
    $stmt->execute();
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $array = array();
    foreach ($datos as $row) {
        $array[] = array(
            "id" => $row['ID'],
            "nombre" => $row['NOMBRE'],
            "anno" => $row['anno'],
            "imagen" => $row['imagen'],
            "mazo" => $row['mazo']
        );
    }
    return $array;
}
function modificarCartas($db, $id, $nombre, $anno, $imagen, $mazo)
{
    try {
        $stmt = $db->prepare("UPDATE cartas SET NOMBRE = :nombre, anno = :anno, imagen = :imagen, mazo = :mazo WHERE ID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':anno', $anno);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':mazo', $mazo);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: No tengo ni idea de porque paso..." . $e->getMessage();
    }
}
function modificarCartas_noImagen($db, $id, $nombre, $anno, $mazo)
{
    try {
        $stmt = $db->prepare("UPDATE cartas SET NOMBRE = :nombre, anno = :anno, mazo = :mazo WHERE ID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':anno', $anno);
        $stmt->bindParam(':mazo', $mazo);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: No tengo ni idea de porque paso..." . $e->getMessage();
    }
}
function elminarCartas($db, $id)
{
    try {
        $delete = $db->prepare("SELECT * FROM CARTAS WHERE ID = :id");
        $delete->bindParam(':id', $id);
        $delete->execute();
        $dato = $delete->fetchAll(PDO::FETCH_ASSOC);
        unlink(__DIR__ . '/media/' . $dato[0]['imagen']);
        $stmt = $db->prepare("DELETE FROM cartas WHERE ID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: No tengo ni idea de porque paso..." . $e->getMessage();
    }
}
//COSAS DE DIEGO
function obtenerNombreMazo($db,$opcion)
{
    $stmt = $db->prepare("SELECT NOMBRE FROM mazo WHERE ID = :opcion");
    $stmt->bindParam(':opcion', $opcion);
    $stmt->execute();
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $datos;
}


function crearPartida($conDB,$nombre,$puntuacion,$mazo)
{
    try {
        $stmt = $conDB->prepare('INSERT INTO partidas(ID,nombre,puntuacion,ID_mazo) VALUES (null,:nombre,:puntuacion,:ID_mazo)');
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':puntuacion', $puntuacion);
        $stmt->bindParam(':ID_mazo', $mazo);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: No tengo ni idea de porque paso..." . $e->getMessage();
    }
}
function mostrarRankingPrincipal($conDB)
{
    $stmt =$conDB->prepare("SELECT * FROM partidas ORDER BY puntuacion DESC LIMIT 10;");
    $stmt->execute();
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $array = array();
    foreach ($datos as $row) {
        $array[] = array(
            "nombre" => $row['nombre'],
            "puntuacion" => $row['puntuacion'],
            "ID_mazo" => $row['ID_mazo']
        );
    }
    return $array;
}
function comprobarUltimaPuntuacion($partidas,$puntuacion,$mazo){
    if(isset(end($partidas)["puntuacion"])&&end($partidas)["puntuacion"]<$puntuacion
    ||isset(end($partidas)["puntuacion"])&&end($partidas)["puntuacion"]>$puntuacion&&count($partidas)<=9
    ||!isset(end($partidas)["puntuacion"])){
        $partidas[]=array(
            "nombre" =>"ZZZZ",
            "puntuacion"=>$puntuacion,
            "ID_mazo" => $mazo
        );
        $puntuacion = array_column($partidas, 'puntuacion');

        array_multisort($puntuacion, SORT_DESC, $partidas);
    }

    return $partidas;
}
