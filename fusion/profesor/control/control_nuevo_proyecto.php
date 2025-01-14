<?php

    include("../include/sesionproy.php");

    if(isset($_POST) && !empty($_POST)){
        include("../include/conexion.php");
        $con = conexion();
        
        date_default_timezone_set('America/Caracas');
        $id = null;
        $nombre = $_POST['nombre'];
        $inicio = date(DATE_ATOM,strtotime($_POST['inicio']));
        $fin = date(DATE_ATOM,strtotime($_POST['fin']));
        $ubicacion = $_POST['ubicacion'];
        $id_usuario = $_SESSION['id_usuario'];
        $creacion = date(DATE_ATOM);
        $edicion = date(DATE_ATOM);
        $editor = $_SESSION['usuario'];

        $sql = "INSERT INTO proyectos VALUES('$id', '$nombre', '$inicio', '$fin', '$ubicacion', '$id_usuario', '$creacion', 
                '$edicion', '$editor')";
        $query = mysqli_query($con, $sql);

        if($query)
            header("location: ../vistas/gerente.php");

    }

?>
