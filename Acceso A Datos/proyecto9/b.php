<html>
    <head></head>

    <body>
    <?php
    session_start();
    if (isset($_SESSION['check'])==false) {
        header('Location:a.php');
    }
    $_SESSION["nums"]= array(1,2,3,4,5,6,7,8,9,10);
    ?> 
    <form action="c.php">
        <input type="submit" value="dale">
    </form>
    </body>
</html>