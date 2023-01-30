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
function elminarCartas($db, $id)
{
    try {
        $stmt = $db->prepare("DELETE FROM cartas WHERE ID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: No tengo ni idea de porque paso..." . $e->getMessage();
    }
}