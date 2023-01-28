<html>
    <head>
        <title>Busca Banderas</title>
        <script>
            function go(x,y){
                var idBanValue=document.getElementById("idBandera").value;
                if(idBanValue==("i"+x+y)){
                    alert("Lo has logrado")
                }else{
                document.getElementById("form1").submit();
                }
            }
        </script>
    </head>
    <?php
    var_export($_POST);
    $dimension = 3;
    
    ?>
    <body>
        <form id="form1" action="./buscabanderas.php" method="post">
            <input type="hidden" name="lastHit" id="lastHit1">
            <?php
            //primera vez
            if(count($_POST)==0){
                $x= rand(0,$dimension-1);
                $y= rand(0,$dimension-1);
                echo '<input id="idBandera" type="hidden" name="bandera" value="i'.$x.$y.'"/>';
            } else
            echo '<input id="idBandera" type="hidden" name="bandera" value="'.$_POST['bandera'].'"/>';

            for ($i=0; $i < $dimension; $i++) { 
                
                for ($j=0; $j < $dimension; $j++) { 
                    echo '<input onclick="go('.$i.','.$j.')" type="text" name="i'.$i.$j.'" id="">';
                }
                echo '<br>';
            }

            ?>
            </form>

    </body>
</html>