<html>
    <head></head>

    <body>
        <?php 
            session_start();
            if (isset($_SESSION['check'])==false) {
                header('Location:a.php');
            }
        ?>
    <form action="d.php">
        <input type="submit" value="dale">
    </form>
    </body>
</html>