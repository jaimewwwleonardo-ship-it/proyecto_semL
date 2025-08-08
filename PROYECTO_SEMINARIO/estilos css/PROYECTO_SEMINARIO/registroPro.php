<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
   <link rel="stylesheet" href="estilos css/RegistroPro.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="imagenes/stock1.jpg" alt="Logo TIENDA EL SANTI" class="logo-img">
            <h1>TIENDA EL SANTI</h1>
        </div>
    </header>
    <div class="container">
        <h2 class="title">REGISTRO PRODUCTOS</h2>
        <form method="post" id="form-validation" novalidate>
            <div class="form-group">
                <label for="nombre">Ingrese el Nombre del Producto:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="categoria">Ingrese la categoria:</label>
                <input type="text" id="categoria" name="categoria" required>
            </div>

            <div class="form-group">
                <label for="precio">Ingrese El precio:</label>
                <input type="text" id="precio" name="precio" required>
            </div>
            

            

            <div class="button">
                <button type="submit"value="guardar" name="btnGuardar" id="btnGuardar" >REGISTRARSE</button>
            </div>
        </form>
    </div>

   </div>
    <?php 
        include "conexion.php";
        include "registroPro1.php";
        ?>
    <footer>
        <div class="footer-content">
            <p>© 2025 TIENDA EL SANTI | Todos los derechos reservados</p>
        </div>
    </footer>
</body>
</html>
