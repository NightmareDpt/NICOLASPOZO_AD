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

function getHortizaFromTam($conDb, $tam)
{
    try {
        $sql = "SELECT * FORM HORTALIZAS WHERE tam =" . $tam;
        $stmt = $conDb->query($sql);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        echo ("Error al conectar" . $ex->getMessage());
    }
    return $fila;
}

function getAllHortalizasFromTam($conDb, $tam)
{
    $vectortotal = array();
    try {
        $sql = "SELECT * FORM HORTALIZAS WHERE tam =" . $tam;
        $stmt = $conDb->query($sql);
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $vectortotal[] = $fila;
        }
    } catch (PDOException $ex) {
        echo ("Error al conectar" . $ex->getMessage());
    }
    return $fila;
}