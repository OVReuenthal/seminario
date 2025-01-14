<?php

    include("../include/sesionproy.php");

    if(isset($_POST) && !empty($_POST)){

            include("../include/conexion.php");
            $con = conexion();
            date_default_timezone_set('America/Caracas');

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $inicio = date(DATE_ATOM,strtotime($_POST['inicio']));
            $fin = date(DATE_ATOM,strtotime($_POST['fin']));
            $ubicacion = $_POST['ubicacion'];
            $edicion = date(DATE_ATOM);
            $editor = $_SESSION['usuario'];
    
            $sql = "UPDATE proyectos SET Nombre='$nombre', fecha_in='$inicio', fecha_fin='$fin', ubicacion='$ubicacion', fecha_a='$edicion',
                        editor='$editor' WHERE id_proyecto='$id'";
            $query = mysqli_query($con, $sql);
    
            if($query)
                header("location: ../vistas/gerente.php");
                  
    }
?>