<?php
session_start();

// Inicializar carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Manejar acciones de aumentar/disminuir
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'], $_POST['accion'])) {
    $id = $_POST['id'];
    $accion = $_POST['accion'];

    foreach ($_SESSION['carrito'] as $index => $producto) {
        if ($producto['id'] == $id) {
            if ($accion === 'aumentar') {
                $_SESSION['carrito'][$index]['cantidad']++;
            } elseif ($accion === 'disminuir') {
                $_SESSION['carrito'][$index]['cantidad']--;
                if ($_SESSION['carrito'][$index]['cantidad'] <= 0) {
                    unset($_SESSION['carrito'][$index]); // Eliminar si es 0
                }
            }
            break;
        }
    }

    // Reordenar índices
    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
    header("Location: carrito.php");
    exit();
}

$productosCarrito = $_SESSION['carrito'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
      <link rel="stylesheet" href="estilos css/carrito.css">
     

   
</head>
<body>

<h1>● COMPRA</h1>
<h2>LISTA DE PRODUCTOS EN EL CARRITO</h2>


<?php if (count($productosCarrito) > 0): ?>
    <?php foreach ($productosCarrito as $producto): ?>
        <div class="producto">
            <div class="info">
                <strong><?= $producto['nombre'] ?></strong><br>
                Precio: $<?= $producto['precio'] ?>
            </div>
            <div class="controles">
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                    <input type="hidden" name="accion" value="disminuir">
                    <button class="boton-control">-</button>
                </form>

                <span><strong><?= $producto['cantidad'] ?></strong></span>

                <form method="POST">
                    <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                    <input type="hidden" name="accion" value="aumentar">
                    <button class="boton-control">+</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No hay productos en el carrito</p>
<?php endif; ?>


<a class="boton" href="pago.php">IR A MÉTODOS DE PAGO</a>
 <a class="boton" href="Pro.php">PRODUCTOS</a>

</body>
</html>
