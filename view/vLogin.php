<?php
/**
 * @author Ismael Ferreras García
 * @version 1.0
 * @since 14/01/2024
 */
?>
</div>
</nav>
<style>
    body {
        margin-bottom: 100px;
        font-family: Arial, sans-serif;
    }

    .navbar {
        background-color: #007BFF;
    }

    .navbar-brand {
        color: #fff;
    }

    h1 {
        text-align: center;
    }

    form {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        margin-top: 70px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }
    #f_actual{
        background-color: #bbb;
        color: black;
    }
    input[type = "text"],
    select {
        width: 200px;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type = "text"],
    input[type = "password"],
    .radioq
    select {
        width: 200px;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .obligatorio{
        background-color: #f5ec78;
    }

    input[type = "radio"] {
        margin: 10px;
    }
    .radio {
        display: flex; /* Hace que los elementos radio se muestren en línea */
        align-items: center; /* Centra verticalmente los elementos radio */
    }

    .radio input[type = "radio"] {
        margin-right: 10px; /* Agrega un margen derecho entre los elementos radio */
        width: auto; /* Ancho automático para evitar que los elementos se expandan */
    }
    input{
        min-width: 20px;
    }

    input[type = "reset"],
    input[type = "submit"] {
        background-color: #007BFF;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
        margin-right: 20px;

    }
    input[type = "submit"],.volver {
        background-color: #007BFF;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
        margin-right: 20px;

    }
    .error{
        color: red;
    }
    input[type = "reset"]:hover,
    input[type = "submit"]:hover {
        background-color: #0056b3;
    }
</style>
<form action="<?php echo $_SERVER ['PHP_SELF']; ?>" method="post">
    <table>
        <tr>
            <td><label for="usuario">Usuario:</label></td>
            <td><input class="obligatorio" type="text" id="usuario" name="usuario" value="<?php echo (isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : ''); ?>"></td>
        </tr>
        <tr>
            <td><label for="contrasena">Contraseña:</label></td>
            <td><input class="obligatorio" type="password" id="contrasena" name="contrasena" value="<?php echo (isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena'] : ''); ?>"></td>
        </tr>
    </table>
    <p class='error'><?php echo (!empty($aErrores["usuario"]) ? $aErrores["usuario"] : ''); ?></p>
    <input name="enviar" type="submit" value="Iniciar Sesion">
    <input class="volver" type="submit" name="volver" value="Volver">
</form>
<footer class ="bg-primary text-light py-4 fixed-bottom">
    <div class="container">
        <div class="row">
            <div class="col text-center text-white">
                <a href="/index.html">
                    <p class="text-white">&copy; 2023/24 Ismael Ferreras
                        García. Todos los derechos
                        reservados.</p>
                </a>
            </div>
            <div class="col text-end">
                <a href="../indexProyectoLoginLogoffTema5.html">
                    <img src="/webroot/imagenes/casa-removebg-preview.png" alt="Home" width="35" height="35">
                </a>
                <a href="https://github.com/IsmaelFG/208DWESProyectoLoginLogoffTema5" target="_blank">
                    <img src="/webroot/imagenes/github-removebg-preview.png" alt="GitHub" width="35" height="35">
                </a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
