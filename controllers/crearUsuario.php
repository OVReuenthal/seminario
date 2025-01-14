<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nuevoUsuario"]) and !empty($_POST["contraseña"]) and !empty($_POST["contraseñaC"]) and !empty($_POST["codigoA"]) ){
        
        $nuevousuario=$_POST["nuevoUsuario"];
        $contraseña=$_POST["contraseña"];
        $contraseñaC=$_POST["contraseñaC"];
        $codigoA=$_POST["codigoA"];
        include "modelo/conexion.php";
  
        if ($contraseña == $contraseñaC) {

            if ($codigoA == "ugma123") {
                echo '<div class = "alert alert-danger">usuario creado con exito</div>';
                $sql=$conexion->query("INSERT INTO usuarios (usuario, contraseña) VALUES ('$nuevousuario','$contraseña')");
                header("location:login.php");   
            } else {
                echo '<div class = "alert alert-danger"> Acceso denegado, el codigo es incorrecto.</div>';
        
            }
               

        } else {
            echo '<div class = "alert alert-danger">Las contraseñas son diferentes</div>';
        }
        

       
    }else{
        echo '<div class = "alert alert-danger">Alguno de los campos esta vacio</div>';
    }
}
?>