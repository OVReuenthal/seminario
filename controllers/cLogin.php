<?php

if (!empty($_POST["btningresar"])) {

    if (empty($_POST["usuario"]) and empty($_POST["contraseña"])) {
        echo '<div class = "alert alert-danger">LOS CAMPOS ESTAN VACIOS</div>';
    } else {
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];
        $sql = $conexion ->query("select * from usuarios where usuario= '$usuario' and contraseña = '$contraseña'");
        if ($datos= $sql ->fetch_object()) {
            header("location:biblioteca.php");
        } else {
            echo '<div class = "alert alert-danger">ACCESO DENEGADO</div>';
        }
        
    }
    
}
?>