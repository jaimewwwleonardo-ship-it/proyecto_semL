<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Producto eliminado - TIENDA EL SANTI</title>
    <link rel="stylesheet" href="estilos css/eliminar.css" />
</head>
<body>
    <header>
        <h1>
            <img src="imagenes/stock1.jpg" alt="TIENDA EL SANTI" class="logo-circular" />
            TIENDA EL SANTI
        </h1>
    </header>

    <div class="button-container">
        <a href="Productos.php" class="button-back">Menú</a>
    </div>

    <h1>Producto eliminado</h1>
    <hr>
    <p><a href="Productos.php">Consultar Productos</a> &raquo; Eliminado</p>

    <?php
    include("conexion.php");
    if (!$conex) {
        echo "<h2 class='error'>Error de conexión.</h2>";
        exit;
    }

    if (isset($_GET["id_producto"])) {
        $id_producto = $_GET["id_producto"];

        $stmt = $conex->prepare("DELETE FROM productos WHERE id_producto = ?");
        $stmt->bind_param("i", $id_producto);
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "<h2 class='eliminado'>Producto eliminado con éxito</h2>";
                echo "<script>
                        setTimeout(function() {
                            window.location.href = 'Productos.php';
                        }, 1500);
                      </script>";
            } else {
                echo "<h2 class='error'>No se encontró el producto para eliminar.</h2>";
            }
        } else {
            echo "<h2 class='error'>Error al eliminar el producto: " . htmlspecialchars($stmt->error) . "</h2>";
        }
        $stmt->close();
    } else {
        echo "<h2 class='error'>No se especificó producto a eliminar</h2>";
    }
    ?>
</body>
</html>
