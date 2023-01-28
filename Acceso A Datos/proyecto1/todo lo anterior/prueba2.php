<html>
    <head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>

    <form type="POST" method="Post" action="prueba2v2.php">
        <p>Elige un numero</p>
        <input name="n" type="text"/>
        <br>
        <p>Elige un signo</p>
        <input name="s" type="text"/>
        <br>
        <p>Elige otro signo</p>
        <select name="signo">
    <optgroup label="Elige un Signo">
    <option value="+">+</option>
    <option value="*">*</option>
    </optgroup>
    <input type="submit" value="dame">
</form>

    <script>
        var numeroCaja;
        var textoError;

        window.onload = function(){
            numeroCaja = document.getElementById("Numero");
            textoError = document.getElementById("textoError")
        }
        function verificar(){
            var numero = cajaNumero.value;
            if(!(numeroCaja.value%2)){
                Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
  footer: '<a href="">Why do I have this issue?</a>'
})

            }
        }
    </script>

    </body>

</html>
