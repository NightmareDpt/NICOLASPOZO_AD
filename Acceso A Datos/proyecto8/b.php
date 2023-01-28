


<html>
    <head></head>
    <?php
session_start();
var_export($_SESSION);
if(isset($_SESSION["user"])!="a" and isset($_SESSION["pass"])!="1"){
    header('Location:a.php');
}
if (empty($_SESSION)==true) {
    header('Location:a.php');
}
?>
    <body>
     <form action="c.php" method="post">
        <input type="submit" value="cerrar sesion.">
     </form>
    </body>
</html>