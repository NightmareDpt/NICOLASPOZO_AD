<html>
<?php
session_start();?>
  <style>
    body {
    background-image:url('./medios/fondo_estrella.jpg');
    background-size:cover;
    width:
    <?php
    if (count($_SESSION["cartasMostrar"])>6) {
      $_SESSION["tamanio"]+=250;
      echo $_SESSION["tamanio"];
    }
    ?>;
    background-size:contain;
}
  </style>
<?php
$mensaje="SUERTE EN TU PARTIDA";
 

if (isset($_POST["elegir"])&&isset($_POST["elegir2"])) {
  $_SESSION["cartasMostrar"][]=(integer)$_POST["elegir2"];
  $indexMazo=array_search($_POST["elegir2"],$_SESSION["mazo"]);
  $indexMesa=array_search($_POST["elegir"],$_SESSION["cartasMostrar"]);
  if ($_POST['opcion']== "izquierda") {
    #fecha menor que que
    if($_POST["elegir2"]<$_POST["elegir"]&&($indexMesa>0?$_POST["elegir2"]>$_SESSION["cartasMostrar"][$indexMesa-1]:true)){
      unset($_SESSION["mazo"][$indexMazo]);
       $_SESSION["restantes"]--;
       $mensaje="HAS ACERTADO";
    } else {
      if (count($_SESSION["repes"])+1==53) {
        $_SESSION["victoria"] =false;
        echo header("Location:resultado.php");
      }
      cosas($indexMazo);
      $mensaje="HAS FALLADO";

    }
  }else if ($_POST['opcion']== "derecha") {
    #fecha mayor que
    $decision=$indexMesa<=count($_SESSION["cartasMostrar"])-2&&$_POST["elegir2"]!=$_SESSION["cartasMostrar"][$indexMesa+1];
    if($_POST["elegir2"]>$_POST["elegir"]&&($decision?$_POST["elegir2"]<$_SESSION["cartasMostrar"][$indexMesa+1]:true)){
      unset($_SESSION["mazo"][$indexMazo]);
      $_SESSION["restantes"]--;
      $mensaje="HAS ACERTADO";
    } else {
      if (count($_SESSION["repes"])+1==53) {
        $_SESSION["victoria"] =false;
        echo header("Location:resultado.php");
      }
      cosas($indexMazo);
      $mensaje="HAS FALLADO";
    }
  }
}
  
function cosas($index){
  for ($i=0; $i < 1; $i++) { 
    $numero = random_int(0,55);
    if (in_array($numero,$_SESSION["repes"])) {
        $i--;
      } else {
        $_SESSION["mazo"][$index] = $numero;
        $_SESSION["repes"][]=$numero;
      }
  }
}

if ($_SESSION["restantes"]==0) {
  $_SESSION["victoria"] =true;
  echo header("Location:resultado.php");
}

?>
  <head>
  <link rel="stylesheet" href="./estilos/style.css">
    <?php
    #info array
    $cartas = array(
      array(1967,"Tragedia Apolo 1"),
      array(1968,"Asesinato de Robert F. Kennedy"),
      array(1969,"Primer transplante de corazón artificial"),
      array(1970,"Separación de The Beatles"),
      array(1971,"Lanzamiento del segundo satelite de China"),
      array(1972,"Inauguración de los XI Juegos Olímpicos de Invierno, Japón"),
      array(1973,"Richard Nixon asume por segunda vez la presidencia EEUU"),
      array(1974,"París inaugura el aeropuerto Charles de Gaulle"),
      array(1975,"India lanza su primer satélite artificial, Aryabhata"),
      array(1976,"La pena capital es abolida en Canadá"),
      array(1977,"Yibuti se independiza del Imperio francés."),
      array(1978,"En Andalucía se aprueba el régimen preautonómico."),
      array(1979,"En el Desierto del Sahara se registra la primera nevada conocida."),
      array(1980,"En España se inaugura el nuevo Aeropuerto de Vitoria."),
      array(1981,"Queen se presentó por primera vez en Argentina."),
      array(1982,"España pasa a formar parte de la OTAN."),
      array(1983,"En Colombia, un terremoto destruye la ciudad de Popayán."),
      array(1984,"En EEUU a la venta la primera computadora Apple Macintosh."),
      array(1985,"En Brasil termina la dictadura militar."),
      array(1986,"La Unión Soviética lanza la estación espacial MIR."),
      array(1987,"Muere Manuel Viola, pintor español."),
      array(1988,"El español Pedro Delgado gana el Tour de Francia."),
      array(1989,"En Kabul (Afganistán) se cierra la embajada de Estados Unidos."),
      array(1990,"Estados Unidos lanza el telescopio espacial Hubble."),
      array(1991,"En Malí se firma un acuerdo de paz con los tuareg."),
      array(1992,"La compañía AT&T presenta el videoteléfono."),
      array(1993,"Bélgica se convierte en estado federal."),
      array(1994,"Estados Unidos lanza la sonda lunar Clementine."),
      array(1995,"Muere Doris Grau, actriz estadounidense ."),
      array(1996,"Palestina elige su primer parlamento democráticamente."),
      array(1997,"Creación de la Organización para la Prohibición de las Armas Químicas."),
      array(1998,"El Pentágono sufre el mayor ataque de piratas informáticos."),
      array(1999,"En Argentina, club de fútbol Racing Club es condenado a la quiebra."),
      array(2000,"Sony Computer Entertainment estrena la consola PlayStation 2."),
      array(2001,"Comienza oficialmente el proyecto de Wikipedia."),
      array(2002,"En Japón, científicos anuncian la creación del primer ojo artificial."),
      array(2003,"El cometa C/2002 V1 (NEAT) llega a su perihelio."),
      array(2004,"Se crea ESPN deportes."),
      array(2005,"En Dubái se inicia la construcción del edificio Burj Dubái."),
      array(2006,"Wikipedia en inglés edita su artículo número un millón."),
      array(2007,"Eslovenia adopta el euro."),
      array(2008,"En Latinoamérica se lanza el canal Playhouse Disney Channel."),
      array(2009,"En París se separa la banda de rock Oasis."),
      array(2010,"Steve Jobs presenta en conferencia de prensa el iPad."),
      array(2011,"En Sicilia (Italia) erupciona el volcán Etna."),
      array(2012,"Facebook compra Instagram."),
      array(2013,"Nintendo cesa las funciones del servicio en línea WiiConnect24."),
      array(2014,"La República de Crimea declara su independencia."),
      array(2015,"Se crea un billete de 100 bolivares."),
      array(2016,"Cierre definitivo de la enciclopedia paródica frikipedia."),
      array(2017,"Finaliza el soporte del sistema operativo Microsoft Windows Vista."),
      array(2018,"Es publicado el juego Deltarune."),
      array(2019,"En Japón, el Castillo Shuri sufrió un incendio."),
      array(2020,"Macedonia del norte Ingresa a la OTAN."),
      array(2021,"Fallece el compositor español Antón García Abril."),
      array(2022,"Se toma la foto de sagitario A."),
    );
    sort($_SESSION["cartasMostrar"]);
    ?>

    <style>
        .layout2 {
          left:<?php 
            if($_SESSION["restantes"]==3)
            echo "19%;";
            else if($_SESSION["restantes"]==2)
            echo "27%;";
            else
            echo "34%;";
            ?>
        }
    </style>
  </head>

  <body>

  <form action="rondas.php" method="post" id="myForm">
    <div class="layout">
    <?php 
        #Aleatorio Carta, Seleccion carta
        for ($i=0; $i < count($_SESSION["cartasMostrar"]); $i++) {
          if(isset($_POST["elegir2"])&&$_POST["elegir2"]==$_SESSION["cartasMostrar"][$i])
          echo '<input type="radio" hidden class="radios" name="elegir" value="'.$_SESSION["cartasMostrar"][$i].'" id="'.$_SESSION["cartasMostrar"][$i].'" checked>';
          else if (count($_SESSION["cartasMostrar"])!=1)
          echo '<input type="radio" hidden class="radios" name="elegir" value="'.$_SESSION["cartasMostrar"][$i].'" id="'.$_SESSION["cartasMostrar"][$i].'">';
          else
          echo '<input type="radio" hidden class="radios" name="elegir" value="'.$_SESSION["cartasMostrar"][$i].'" id="'.$_SESSION["cartasMostrar"][$i].'" checked>';
          echo '
            <label for="'.$_SESSION["cartasMostrar"][$i].'" id="fondo">
                <div id="imagen"><img src="./medios/imagen_carta/'.$cartas[$_SESSION["cartasMostrar"][$i]][0].'.jpg" ></div>
                <div id="titulo"><p>'.$cartas[$_SESSION["cartasMostrar"][$i]][1].'</p></div>
                <div id="fecha"><h2>'.$cartas[$_SESSION["cartasMostrar"][$i]][0].'</h2></div>
            </label>
           ';     
        }
      ?>
    </div>
    <br><br>
    <div class="layout2">
    <button class="button-64" role="button" type="submit" name="opcion" value="izquierda"><span class="text">Antes</span></button>
    <?php 
        #Aleatorio mazo
        for ($i=0; $i <3; $i++) {
        if(array_key_exists($i,$_SESSION["mazo"])){
        echo '
        <input type="radio" hidden class="radios" name="elegir2" id="'.$_SESSION["mazo"][$i].'" value="'.$_SESSION["mazo"][$i].'" checked>
        <label for="'.$_SESSION["mazo"][$i].'" id="fondo">
            <div id="imagen"><img src="./medios/imagen_carta/'.$cartas[$_SESSION["mazo"][$i]][0].'.jpg" ></div>
            <div id="titulo"><p>'.$cartas[$_SESSION["mazo"][$i]][1].'</p></div>
        </label>';
      }  
    }
      ?>
        <button class="button-64" role="button" type="submit" name="opcion" value="derecha"><span class="text">Despues</span></button>

    </div>

    <br>
    
    </form>
    <h1 class="puntaje">
      Fallos: <?php echo count($_SESSION["repes"])-4 ?>
    </h1>
    <?php echo "<h1 class='rest'>".$mensaje."</h1>"?>
  </body>
</html>