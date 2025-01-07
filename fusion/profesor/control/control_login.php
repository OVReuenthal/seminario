<?php

    session_start();
    if(isset($_POST) && !empty($_POST)){

        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];
        
        include("../include/conexion.php");
        $con = conexion();

        $sql = "SELECT id_usuario, usuario, clave, tipo FROM usuarios WHERE usuario = '$usuario'";
        $query = mysqli_query($con, $sql);

        $row = mysqli_fetch_array($query);

        if(!is_null($row)){
            if(password_verify($clave, $row["clave"])){
                $_SESSION = ["id_usuario" => $row["id_usuario"], "usuario" => $row['usuario'], "tipo" => $row['tipo']];
                if($row["tipo"] == "admin")
                    header("location: ../vistas/administrador.php");
                else
                    header("location: ../vistas/gerente.php");
            }
            else
                echo "Clave erronea";
        }else
            echo "Usuario no valido";

    }
    

?>