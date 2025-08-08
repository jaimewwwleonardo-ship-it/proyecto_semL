<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Consulta de Productos - TIENDA EL SANTI</title>
    <link rel="stylesheet" href="estilos css/estilosPro.css" />
    <script>
        function confirmacion() {
            return confirm("¿Deseas eliminar el producto?");
        }
    </script>
</head>
<body>
    <header>
    
            <img src="imagenes/stock1.jpg" alt="TIENDA EL SANTI LOGO" class="logo-circular" />
         <h1>TIENDA EL SANTI</h1>
    </header>

    <div class="button-container">
        <a href="Menu_admini.html" class="button-back">Menú</a>
    </div>

    <h1>Consulta de Productos</h1>
    <hr>
    <h2>Inventario de Abarrotes</h2>

    <table>
        <thead>
            <tr>
                <th>ID PRODUCTO</th>
                <th>NOMBRE</th>
                <th>CATEGORÍA</th>
                <th>PRECIO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("conexion.php");
            if (!$conex) {
                echo '<tr><td colspan="5">Error en la conexión a la base de datos.</td></tr>';
                exit;
            }
            $stmt = $conex->prepare("SELECT id_producto, nombre, categoria, precio FROM productos");
            $stmt->execute();
            $result = $stmt->get_result();
            while ($fila = $result->fetch_assoc()) {
                $id = htmlspecialchars($fila["id_producto"]);
                $nombre = htmlspecialchars($fila["nombre"]);
                $categoria = htmlspecialchars($fila["categoria"]);
                $precio = number_format($fila["precio"]);
                printf('
                <tr>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>$%s</td>
                    <td>
                    
                    
                        <a href="registroPro.php?id_producto=%s" class="btn-editar">Agregar</a>
                        <a href="editarPro.php?id_producto=%s" class="btn-editar">Editar</a>
                        <a href="eliminarPro.php?id_producto=%s" onclick="return confirmacion()" class="btn-eliminar">Eliminar</a>
                    </td>
                </tr>
                ', $id, $nombre, $categoria, $precio, $id, $id, $id);
            }
            $stmt->close();
            ?>
        </tbody>
    </table>
</body>
</html>
