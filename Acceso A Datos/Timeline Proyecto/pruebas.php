<html>
    <head></head>
    <style>
        #carrusel {
    float:left;
    width:600px;
    overflow:hidden;
    height:203px;
    position:relative;
    margin-top:20px;
    margin-bottom:20px;
}
 
#carrusel .left-arrow {
    position:absolute;
    left:10px;
    z-index:1;
    top:50%;
    margin-top:-9px;
}
 
#carrusel .right-arrow {
    position:absolute;
    right:10px;
    z-index:1;
    top:50%;
    margin-top:-9px;
}
 
.carrusel {
    width:4000px;
    left:0px;
    position:absolute;
    z-index:0;
}
 
.carrusel>div {
    float: left;
    height: 203px;
    margin-right: 5px;
    width: 195px;
    text-align:center;
}
 
.carrusel img {
    cursor:pointer;
}
 
.product {
    border:#CCCCCC 1px solid;
}
    </style>
    <body>
    <div id="carrusel">
    <a href="#" class="left-arrow"><img src="images/left-arrow.png" /></a>
    <a href="#" class="right-arrow"><img src="images/right-arrow.png" /></a>
    <div class="carrusel">
        <div class="product" id="product_0">
            <img src="gallery/01.jpg" width="195" height="100" />
            <h5>Lorem ipsum 1</h5>
            <p>165.00 €</p>
        </div>
        <div class="product" id="product_1">
            <img src="gallery/02.jpg" width="195" height="100" />
            <h5>Lorem ipsum 2</h5>
            <p>100.00 €</p>
        </div>
        <div class="product" id="product_2">
            <img src="gallery/03.jpg" width="195" height="100" />
            <h5>Lorem ipsum 3</h5>
            <p>250.00 €</p>
        </div>
        <div class="product" id="product_3">
            <img src="gallery/01.jpg" width="195" height="100" />
            <h5>Lorem ipsum 4</h5>
            <p>75.00 €</p>
        </div>
        <div class="product" id="product_4">
            <img src="gallery/02.jpg" width="195" height="100" />
            <h5>Lorem ipsum 5</h5>
            <p>65.00 €</p>
        </div>
        <div class="product" id="product_5">
            <img src="gallery/03.jpg" width="195" height="100" />
            <h5>Lorem ipsum 6</h5>
            <p>40.00 €</p>
        </div>
    </div>
</div>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script>
var current = 0;
var imagenes = new Array();
 
$(document).ready(function() {
    var numImages = 6;
    if (numImages <= 3) {
        $('.right-arrow').css('display', 'none');
        $('.left-arrow').css('display', 'none');
    }
 
    $('.left-arrow').on('click',function() {
        if (current > 0) {
            current = current - 1;
        } else {
            current = numImages - 3;
        }
 
        $(".carrusel").animate({"left": -($('#product_'+current).position().left)}, 600);
 
        return false;
    });
 
    $('.left-arrow').on('hover', function() {
        $(this).css('opacity','0.5');
    }, function() {
        $(this).css('opacity','1');
    });
 
    $('.right-arrow').on('hover', function() {
        $(this).css('opacity','0.5');
    }, function() {
        $(this).css('opacity','1');
    });
 
    $('.right-arrow').on('click', function() {
        if (numImages > current + 3) {
            current = current+1;
        } else {
            current = 0;
        }
 
        $(".carrusel").animate({"left": -($('#product_'+current).position().left)}, 600);
 
        return false;
    }); 
 });
</script>
</html>