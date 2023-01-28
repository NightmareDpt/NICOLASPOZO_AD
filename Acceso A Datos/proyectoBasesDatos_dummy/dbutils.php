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
    $stmt = $conDB->prepare('SELECT * FROM usuarios WHERE usuario = ? AND password = ?');
    $stmt->execute([$user, $passwd]);
    $validar = $stmt->fetch();
    if ($validar) {
        return true;
    }
}