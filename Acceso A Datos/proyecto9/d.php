
<html>
    <head></head>
    <body>
    <?php
session_start();
;
if (isset($_SESSION['check'])==false) {
    header('Location:a.php');
}
var_export($_SESSION);
?>  
<form action="e.php" method="post">
    <input type="submit" value="Terminar">
</form>    
</body>
</html>