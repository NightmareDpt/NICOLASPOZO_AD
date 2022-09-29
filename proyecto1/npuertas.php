<html>
    <head>
    <style>
        body{
            background-image: url(../medios/textura.jpg);
        }
    </style>
    </head>
    <body>
    <form method="post" id="form1">
    <?php
        //
        $puerta=rand(0,1);
        for ($i=0; $i < 2; $i++) { 
            if ($puerta == $i) {
                echo '<img onclick="seguir()"  src="../medios/puertas/door'.rand(1,12).'.png" alt="" style="float: left;">';
                
            } else echo '<img onclick="morir()"  src="../medios/puertas/door'.rand(1,12).'.png" alt="" style="float: left;">';
        }
     ?>        

        </form>
     <script>
        function seguir(){
            document.getElementById("form1").action="npuertas2.php";
            document.getElementById("form1").submit();
        }
        function morir(){
            document.getElementById("form1").action="menu.php";
            document.getElementById("form1").submit();
        }
     </script>

    </body>
</html>