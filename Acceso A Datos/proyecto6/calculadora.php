<html>
    <head>
    </head>

    <script>
    </script>


    <body>
        <form action="resultado.php" method="post">
            <input type="number" name="numero1">
            <input type="number" name="numero2">
            <br>
            <input type="button" value="+" onclick="myfunction()" id="sumar">
            <input type="button" value="-" onclick="myfunction()" id="restar">
            <input type="button" value="/" onclick="myfunction()" id="dividir">
            <input type="button" value="*" onclick="myfunction()" id="multiplicar">
            <input type="hidden" name="valor">
            <input type="submit" value="Resultado">
        </form>
    </body>
</html>