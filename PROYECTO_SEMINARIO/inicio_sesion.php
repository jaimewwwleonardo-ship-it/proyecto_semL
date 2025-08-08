<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesión - TIENDA EL SANTI</title>
    <link rel="stylesheet" href="estilos css/inicioses.css">
    <script>
        function regre() {
            window.location.href = 'index.html'; 
        }
    </script>
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="imagenes/stock1.jpg" alt="Logo TIENDA EL SANTI" class="logo-img">
            <h1>TIENDA EL SANTI</h1>
        </div>
    </header>
    
    <div class="container">
        <h2 class="title">Iniciar Sesión</h2>
        
        <form method="post" action="validar_cuenta.php" id="form-validation">
            <div class="form-group">
                <label>Ingrese su usuario:</label>
                <input type="text" placeholder="Usuario" name="nombre_usu" required>
            </div>

            <div class="form-group">
                <label>Ingrese su contraseña:</label>
                <input type="password" placeholder="Contrasena" name="contrasena_usu" required>
            </div>
            
            <div class="button">
                <button type="submit">INICIAR SESIÓN</button>
                <br><br>
                <button type="button" onclick="regre()">REGRESAR</button>
            </div>
        </form>
    </div>
    
    <footer>
        <div class="footer-content">
            <p>© 2025 TIENDA EL SANTI | Todos los derechos reservados</p>
        </div>
    </footer>
</body>
</html>