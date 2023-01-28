<?php
function conectarDB()
{
    try {
        $db = new PDO("mysql:host=localhost; dbname=db_fruitis; charset=utf8mb4", "root");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $ex) {
        echo ("Error al conectar" . $ex->getMessage());
    }
}
function getfilteredHortalizas($conDB, $tam, $color)
{
    $vectorTotal = array();
    try {
        $arr = array();
        if ($tam != "") {
            $arr[":tam"] = $tam;
            $sql = "SELECT * FROM hortalizas WHERE TAM=:tam";
        }
        if ($color != "") {
            $arr[":color"] = $color;
            'SELECT * FROM hortalizas WHERE COLOR =:color';
        }
        if (count($arr) == 2) {
            $sql = 'SELECT * FROM hortalizas WHERE TAM>:tam AND COLOR =:color';
        }
        $stmt = $conDB->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute($arr);
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $vectorTotal[] = $fila;
        }
    } catch (PDOException $ex) {
        echo ("Error al conectar" . $ex->getMessage());
    }
    return $vectorTotal;
}