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

// Si se envió el formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['titulo'], $_POST['contenido'])) {
    $id = intval($_POST['id']);
    $titulo = $conn->real_escape_string($_POST['titulo']);
    $contenido = $conn->real_escape_string($_POST['contenido']);

    $conn->query("UPDATE informacion SET titulo='$titulo', contenido='$contenido' WHERE id_informacion=$id");
    header("Location: admin_informacion.php"); // Redireccionar para evitar reenvío
    exit;
}

// Obtener toda la información
$resultado = $conn->query("SELECT * FROM informacion");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Información</title>
      <link rel="stylesheet" href="estilos css/GesIn.css">
   
</head>
<body>

<h1>● GESTIÓN DE INFORMACIÓN</h1>

<div class="contenedor">
    <?php while($row = $resultado->fetch_assoc()): ?>
        <div class="producto">
            <strong><?= htmlspecialchars($row['titulo']) ?></strong>
            <p><?= nl2br(htmlspecialchars($row['contenido'])) ?></p>

            <!-- Formulario para editar -->
            <form class="editar-form" method="post" action="">
                <input type="hidden" name="id" value="<?= $row['id_informacion'] ?>">
                <input type="text" name="titulo" value="<?= htmlspecialchars($row['titulo']) ?>" required>
                <textarea name="contenido" rows="3" required><?= htmlspecialchars($row['contenido']) ?></textarea>
                <button type="submit">💾 Guardar Cambios</button>
            </form>
        </div>
    <?php endwhile; ?>
</div>

</body>
</html>
<?php $conn->close(); ?>
