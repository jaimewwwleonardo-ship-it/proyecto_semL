<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Productos - TIENDA EL SANTI</title>
    <link rel="stylesheet" href="estilos css/estilosEdi.css">
</head>
<body>
    <header>
        <h1><img src="imagenes/stock1.jpg" alt="TIENDA EL SANTI" class="logo-circular"> TIENDA EL SANTI</h1>
    </header>
    <div class="button-container"> 
        <a href="Menu_admini.html" class="button-back">Menú</a> 
    </div>
    <h1>Editar Productos</h1>
    <hr>
    <p><a href="productos.php">Consultar Productos</a> &raquo; Editar:</p>
    <?php
    if(isset($_GET["id_producto"])){
        $id_producto = $_GET["id_producto"];
        require_once("conexion.php");
        $consulta2 = mysqli_query($conex,"SELECT * FROM productos WHERE id_producto='$id_producto'");
        $fila = mysqli_fetch_array($consulta2);
        printf('
        <form action="#" method="POST">
        <fieldset>
        <legend><em>Llena los campos del formulario</em></legend>
        <table>
            <tr>
                <td><label>Nombre:</label></td>
                <td><input type="text" name="nombre" id="nombre" placeholder="Nombre del producto" value="%s"></td>
            </tr>
            <tr>
                <td><label>Categoría:</label></td>
                <td><input type="text" name="categoria" id="categoria" placeholder="Categoría del producto" value="%s"></td>
            </tr>
            <tr>
                <td><label>Precio:</label></td>
                <td><input type="text" name="precio" id="precio" placeholder="Precio en pesos" value="%s"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_producto" value="%s"></td>
                <td><input type="submit" value="Actualizar" name="enviar"></td>
            </tr>
        </table>
        </fieldset>
        </form>
        ', $fila["nombre"], $fila["categoria"], $fila["precio"], $fila["id_producto"]);
    }
    ?>
    <?php
    if(isset($_POST["enviar"])){
        $id_producto = $_POST["id_producto"];
        $nombre = $_POST["nombre"];
        $categoria = $_POST["categoria"];
        $precio = $_POST["precio"];

        require_once("conexion.php");
        $actualizar = mysqli_query($conex,"UPDATE productos SET nombre='$nombre', categoria='$categoria', precio='$precio' WHERE id_producto='$id_producto'");
        echo "<h2 class='registrado'>Producto actualizado con éxito</h2>";
    }
    ?>
</body>
</html>