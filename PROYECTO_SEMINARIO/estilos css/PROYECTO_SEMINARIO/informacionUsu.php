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

// Búsqueda
$busqueda = "";
if (isset($_GET['buscar'])) {
    $busqueda = $conn->real_escape_string($_GET['buscar']);
    $sql = "SELECT * FROM informacion WHERE titulo LIKE '%$busqueda%'";
} else {
    $sql = "SELECT * FROM informacion";
}
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Información de Productos</title>
 <link rel="stylesheet" href="estilos css/informacionUsu.css">
</head>
<body>

    <h1>● INFORMACIÓN</h1>

    <div class="contenedor">

        <!-- Barra de búsqueda -->
        <div class="busqueda">
            <form method="get" action="">
                <input type="text" name="buscar" placeholder="Buscar producto..." value="<?= htmlspecialchars($busqueda) ?>">
                <button type="submit">Buscar</button>
            </form>
        </div>

        <!-- Resultados -->
        <?php if ($resultado->num_rows > 0): ?>
            <?php while($row = $resultado->fetch_assoc()): ?>
                <div class="producto">
                    <h3><?= htmlspecialchars($row['titulo']) ?></h3>
                    <p><?= nl2br(htmlspecialchars($row['contenido'])) ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>

    </div>

</body>
</html>
<?php $conn->close(); ?>
