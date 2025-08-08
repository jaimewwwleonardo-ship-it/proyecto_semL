<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
   <link rel="stylesheet" href="estilos css/registro.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="imagenes/stock1.jpg" alt="Logo TIENDA EL SANTI" class="logo-img">
            <h1>TIENDA EL SANTI</h1>
        </div>
    </header>
    <div class="container">
        <h2 class="title">REGISTRO</h2>
        <form method="post" id="form-validation" novalidate>
            <div class="form-group">
                <label for="nombreUsuario">Ingrese su Nombre:</label>
                <input type="text" id="nombre_apellidos" name="nombre_apellidos" required>
            </div>

            <div class="form-group">
                <label for="contraseña">Ingrese un Email:</label>
                <input type="text" id="email_usu" name="email_usu" required>
            </div>

            <div class="form-group">
                <label for="contraseña">Ingrese un Numero de Télefono:</label>
                <input type="text" id="telefono_usuario" name="telefono_usuario" required>
            </div>

            <div class="form-group">
                <label for="contraseña">Ingrese un Nombre de Usuario:</label>
                <input type="text" id="nombre_usu" name="nombre_usu" required>
            </div>

            <div class="form-group">
                <label for="contraseña">Ingrese una Contraseña:</label>
                <input type="password" id="contrasena_usu" name="contrasena_usu" required>
            </div>

            <div class="form-group">
                <label for="contraseña">Ingrese una Dirección:</label>
                <input type="text" id="direccion_usu" name="direccion_usu" required>
            </div

            <div class="button">
                <button type="submit"value="guardar" name="btnGuardar" id="btnGuardar" >REGISTRARSE</button>
            </div>
        </form>
    </div>

   </div>
    <?php
        include "conexion.php";
        include "registrousu.php";
        ?>
    <footer>
        <div class="footer-content">
            <p>© 2025 TIENDA EL SANTI | Todos los derechos reservados</p>
        </div>
    </footer>
</body>
</html>
