<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexión a la base de datos (usando tus variables exactas)
    $conexion = mysqli_connect("localhost", "root", "", "el_santi");
    
    if (!$conexion) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    // Obtener datos del formulario (tus variables originales)
    if (isset($_POST['nombre_usu'], $_POST['contrasena_usu'])) {
        $usuario = mysqli_real_escape_string($conexion, trim($_POST['nombre_usu']));
        $contrasena = trim($_POST['contrasena_usu']);

        if (empty($usuario) || empty($contrasena)) {
            echo "<script>alert('Por favor, complete todos los campos.');</script>";
            echo "<script>location.href='inicio_sesion.html'</script>";
            exit;
        }

        // Buscar en tabla CLIENTE (tus tablas y campos originales)
        $queryCliente = "SELECT * FROM usuario WHERE nombre_usu = '$usuario'";
        $resultCliente = mysqli_query($conexion, $queryCliente);

        if ($resultCliente && mysqli_num_rows($resultCliente) > 0) {
            $cliente = mysqli_fetch_assoc($resultCliente);
            if ($contrasena === $cliente['contrasena_usu']) { // Comparación directa (no recomendado)
                $_SESSION['rol'] = 'cliente';
                $_SESSION['nombre_usu'] = $usuario;
                header("Location: Menu_usu.html");
                exit();
            }
        }

        // Buscar en tabla ADMINISTRADOR (tus tablas y campos originales)
        $queryAdmin = "SELECT * FROM administrador WHERE nombre_admini = '$usuario'";
        $resultAdmin = mysqli_query($conexion, $queryAdmin);

        if ($resultAdmin && mysqli_num_rows($resultAdmin) > 0) {
            $admin = mysqli_fetch_assoc($resultAdmin);
            if ($contrasena === $admin['contraseña_admini']) { // Comparación directa (no recomendado)
                $_SESSION['rol'] = 'admin';
                $_SESSION['nombre_admini'] = $usuario;
                header("Location: Menu_admini.html");
                exit();
            }
        }

        // Si no se encontró el usuario
        echo "<script>alert('Usuario o contraseña incorrectos.');</script>";
        echo "<script>location.href='inicio_sesion.php'</script>";
    }
    
    mysqli_close($conexion);
} else {
    // Redireccionar si se accede directamente al script
    header("Location: inicio_sesion.php");
    exit();
}
?>