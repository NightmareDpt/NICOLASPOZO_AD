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
        $npuertas=rand(2,3);
        $puerta=rand(0,$npuertas-1);
        do {
            $volver=rand(0,$npuertas-1);
        } while ($volver == $puerta);
        
        for ($i=0; $i < $npuertas; $i++) { 
            if ($puerta == $i) {
                echo '<img onclick="seguir()"  src="../medios/puertas/door'.rand(1,12).'.png" alt="" style="float: left;">';
            } if ($volver == $i) {
                echo '<img onclick="anterior()"  src="../medios/puertas/door'.rand(1,12).'.png" alt="" style="float: left;">';
            }
            else echo '<img onclick="morir()"  src="../medios/puertas/door'.rand(1,12).'.png" alt="" style="float: left;">';
            
        }
     ?>        

        </form>
     <script>
        function seguir(){
            document.getElementById("form1").action="npuertas3.php";
            document.getElementById("form1").submit();
        }
        function morir(){
            document.getElementById("form1").action="menu.php";
            document.getElementById("form1").submit();
        }
        function anterior(){
            document.getElementById("form1").action="npuertas.php";
            document.getElementById("form1").submit();
        }
     </script>

    </body>
</html>