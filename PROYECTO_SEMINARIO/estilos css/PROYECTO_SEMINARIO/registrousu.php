<?php
include "conexion.php";
if(isset($_POST["btnGuardar"])){
    if(strlen($_POST['nombre_apellidos']) >=1 &&strlen($_POST['nombre_usu']) >=1 && strlen($_POST['contrasena_usu']) >=1 && strlen($_POST['email_usu'])>=1 && strlen($_POST['telefono_usuario']) >=1 && strlen($_POST['direccion_usu'])>=1 ){
        $nombre_apellidos = trim($_POST['nombre_apellidos']);
        $nombre_usu= trim($_POST['nombre_usu']);
        $contrasena_usu= trim($_POST['contrasena_usu']);
        $email_usu = trim($_POST['email_usu']);
        $telefono_usu = trim($_POST['telefono_usuario']);
        $direccion_usu = trim($_POST['direccion_usu']);
        $consulta ="INSERT INTO usuario(id_usu,nombre_apellidos,nombre_usu, contrasena_usu, email_usu, telefono_usu, direccion_usu) VALUES (null,'$nombre_apellidos', '$nombre_usu', '$contrasena_usu', '$email_usu','$telefono_usu', '$direccion_usu')";
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