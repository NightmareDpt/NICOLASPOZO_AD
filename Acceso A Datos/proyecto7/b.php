<html>
    <head></head>
    <body>
        <?php
        echo "<ul>";
        for ($i=0; $i <=$_POST['numero']; $i++) { 
            echo "<li>$i</li>";

        }
        echo "</ul>"
        ?>
    </body>
</html>