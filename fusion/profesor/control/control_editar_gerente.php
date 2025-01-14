<?php

    include("../include/sesionproy.php");


    if(isset($_POST) && !empty($_POST)){
    
        include("../include/conexion.php");
        $con = conexion();
        date_default_timezone_set('America/Caracas');
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $fecha_m = date(DATE_ATOM);
        $editor = $_SESSION["usuario"];

        $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', email='$email', telefono='$telefono', 
        fecha_m='$fecha_m', editor='$editor' WHERE id_usuario='$id'";
        $query = mysqli_query($con, $sql);

        if($query)
            header("location: ../vistas/gerente.php");
            

    }

?>