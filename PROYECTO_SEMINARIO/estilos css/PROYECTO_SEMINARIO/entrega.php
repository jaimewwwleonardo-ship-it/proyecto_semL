<?php
session_start();

if (!isset($_SESSION['metodo_pago'])) {
    header("Location: pago.php");
    exit();
}

// Procesar finalización de compra
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["entrega"])) {
    $_SESSION["metodo_entrega"] = $_POST["entrega"];

    // Aquí podrías guardar la compra en una base de datos, enviar correo, etc.
    $mensaje = "¡Compra finalizada exitosamente con método de pago: " . $_SESSION["metodo_pago"] .
               " y entrega: " . $_SESSION["metodo_entrega"] . "!";

    // Limpiar sesión si deseas reiniciar el flujo
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Finalizar Compra</title>
    <style>
        body { background-color: purple; color: white; text-align: center; font-family: Arial; }
        .opciones { background: limegreen; padding: 20px; margin: 20px auto; width: 400px; border-radius: 10px; color: black; }
        h1 { background: black; padding: 10px; }
    </style>
</head>
<body>
    <h1>● COMPRA</h1>

    <?php if (isset($mensaje)): ?>
        <h2><?= $mensaje ?></h2>
        <a href="Pro.php" style="color:white;">Volver a productos</a>
    <?php else: ?>
        <form method="POST" action="">
            <div class="opciones">
                <label>
                    <input type="radio" name="entrega" value="Domicilio" required>
                    Recibir a domicilio
                </label><br><br>
                <label>
                    <input type="radio" name="entrega" value="Tienda" required>
                    Recoger en tienda
                </label>
            </div>
            <button type="submit">Finalizar la compra</button>
        </form>
    <?php endif; ?>
</body>
</html>
