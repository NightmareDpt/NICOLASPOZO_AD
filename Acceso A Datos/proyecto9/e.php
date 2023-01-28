<?php 
    session_start();
    unset($_SESSION);
    session_destroy();
    echo "sesión destruida";
    session_start();
    var_export($_SESSION);
    header('Location:a.php');
?>