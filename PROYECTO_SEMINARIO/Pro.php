<?php
session_start();

// Conexión a la base de datos
$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "el_santi";
$conn = new mysqli($host, $usuario, $clave, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Agregar producto al carrito
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_producto'])) {
    $id = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    $nuevoProducto = ["id" => $id, "nombre" => $nombre, "precio" => $precio, "cantidad" => 1];

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    $productoExistente = false;

    // Buscar si ya está en el carrito
    foreach ($_SESSION['carrito'] as &$producto) {
        if ($producto['id'] == $id) {
            $producto['cantidad']++;
            $productoExistente = true;
            break;
        }
    }
    unset($producto); // Buenas prácticas al usar referencias

    // Si no estaba, se agrega
    if (!$productoExistente) {
        $_SESSION['carrito'][] = $nuevoProducto;
    }

    header("Location: carrito.php");
    exit();
}

// Consultar productos
$sql = "SELECT id_producto, nombre, categoria, precio FROM productos";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
     <link rel="stylesheet" href="estilos css/Pros.css">
    
</head>
<body>

    <h1>● PRODUCTOS</h1>

    <div class="slider">
     

        <?php if ($resultado->num_rows > 0): ?>
            <?php while($fila = $resultado->fetch_assoc()): ?>
                <div class="producto">
                    <h3><?= $fila["nombre"] ?></h3>
                    <p>Categoría: <?= $fila["categoria"] ?></p>
                    <p>Precio: $<?= $fila["precio"] ?></p>
                    <form method="POST" action="">
                        <input type="hidden" name="id_producto" value="<?= $fila["id_producto"] ?>">
                        <input type="hidden" name="nombre" value="<?= $fila["nombre"] ?>">
                        <input type="hidden" name="precio" value="<?= $fila["precio"] ?>">
                        <button class="boton-agregar" type="submit">Agregar al carrito</button>
                    </form>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No hay productos disponibles</p>
        <?php endif; ?>
    </div>

    <a class="boton-carrito" href="carrito.php">BOTÓN PARA IR AL CARRITO</a>

</body>
</html>
<?php $conn->close(); ?>
