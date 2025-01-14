<?php

    function conexion(){
        $host = "localhost";
        $user = "root";
        $password = "";
        $bd = "proyectos";

        $conexion = mysqli_connect($host, $user, $password);
        mysqli_select_db($conexion, $bd);

        return $conexion;
    }

?>