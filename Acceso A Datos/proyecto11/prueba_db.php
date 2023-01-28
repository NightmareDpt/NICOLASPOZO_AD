<?php

    require_once("dbutils.php");

    $myconection= conectarDB();
    $miFila = getHortizaFromTam($myconection,20);
    var_export($miFila);
    echo "El color es".$miFila["COLOR"];
?>