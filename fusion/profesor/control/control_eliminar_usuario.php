<?php

    include("../include/sesionadmin.php");


    include("../include/conexion.php");
    $con = conexion();
            
    $id = $_GET["id_usuario"];

    $sql = "DELETE FROM usuarios WHERE id_usuario='$id'";
    $query = mysqli_query($con, $sql);

    if($query)
        header("location: ../vistas/administrador.php");


    

?>