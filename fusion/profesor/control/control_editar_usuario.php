<?php

    include("../include/sesionadmin.php");

    if(isset($_POST) && !empty($_POST)){

            include("../include/conexion.php");
            $con = conexion();
            date_default_timezone_set('America/Caracas');
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $usuario = $_POST["usuario"];
            $clave = password_hash($_POST["clave"], PASSWORD_BCRYPT);
            $email = $_POST["email"];
            $telefono = $_POST["telefono"];
            $tipo = $_POST["tipo"];
            $fecha_m = date(DATE_ATOM);
            $editor = $_SESSION["usuario"];

            $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', usuario='$usuario', clave='$clave', email='$email',
                        telefono='$telefono', tipo='$tipo', fecha_m='$fecha_m', editor='$editor' WHERE id_usuario='$id'";
            $query = mysqli_query($con, $sql);

            if($query)
                header("location: ../vistas/administrador.php");
                
    }
?>