<?php

    include("../include/sesionproy.php");

    include("../include/conexion.php");
    $con = conexion();
            
    $id = $_GET["id_proyecto"];

    $sql = "DELETE FROM proyectos WHERE id_proyecto='$id'";
    $query = mysqli_query($con, $sql);

    if($query)
        header("location: ../vistas/gerente.php");


?>