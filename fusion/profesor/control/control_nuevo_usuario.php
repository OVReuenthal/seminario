<?php

    include("../include/sesionadmin.php");


    if(isset($_POST) && !empty($_POST)){
    
        include("../include/conexion.php");
        $con = conexion();
        date_default_timezone_set('America/Caracas');
        $id = null;
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $usuario = $_POST["usuario"];
        $clave = password_hash($_POST["clave"], PASSWORD_BCRYPT);
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $tipo = $_POST["tipo"];
        $fecha_c = date(DATE_ATOM);
        $fecha_m = date(DATE_ATOM);
        $editor = $_SESSION["usuario"];

        $sql = "INSERT INTO usuarios VALUES('$id', '$nombre', '$apellido', '$telefono', '$email',  '$clave', '$usuario', '$tipo', 
                    '$fecha_c', '$fecha_m', '$editor')";
        $query = mysqli_query($con, $sql);

        if($query)
            header("location: ../vistas/administrador.php");
            

    }

?>