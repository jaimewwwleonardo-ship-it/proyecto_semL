<?php
include "conexion.php";
if(isset($_POST["btnGuardar"])){
    if(strlen($_POST['nombre']) >=1 &&strlen($_POST['categoria']) >=1 && strlen($_POST['precio']) >=1 ){
        $nombre = trim($_POST['nombre']);
        $categoria= trim($_POST['categoria']);
        $precio= trim($_POST['precio']);
       
        $consulta ="INSERT INTO productos(id_producto,nombre,categoria,precio,id_admini) VALUES (null,'$nombre', '$categoria', '$precio', null)";
        $resultado = mysqli_query($conex,$consulta);
        if($resultado){
            ?>
            <h3 class="ok">¡El registro se ha guardado correctamente!</h3>
            <?php
        }else{
            ?>
            <h3 class="bad">¡upps ha ocurrido un error al intentar registrarse!</h3>
            <?php
        }
    }   else{
        ?>
        <h3 class="bad">¡Por favor complete los campos!</h3>
        <?php

    }
}
?>