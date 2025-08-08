<?php
session_start();

// Simulación de métodos de pago
$metodos_pago = ["Pago en sucursal", "Efectivo", "Transferencia bancaria"];

// Procesar selección de método de pago
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["metodo"])) {
    $_SESSION["metodo_pago"] = $_POST["metodo"];
    header("Location: entrega.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pago</title>
    <style>
        body { background-color: purple; color: white; text-align: center; font-family: Arial; }
        .metodo { background: limegreen; padding: 15px; margin: 10px auto; width: 300px; border-radius: 10px; color: black; }
        h1 { background: black; padding: 10px; }
    </style>
</head>
<body>
    <h1>● PAGO</h1>
    <h2>MÉTODOS DE PAGO DISPONIBLES</h2>

    <form method="POST" action="">
        <?php foreach ($metodos_pago as $metodo): ?>
            <div class="metodo">
                <label>
                    <input type="radio" name="metodo" value="<?= $metodo ?>" required>
                    <?= $metodo ?>
                </label>
            </div>
        <?php endforeach; ?>
        <button type="submit">Continuar</button>
    </form>
</body>
</html>
                                           