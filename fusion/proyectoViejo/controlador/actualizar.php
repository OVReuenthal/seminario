<?php



if (!empty($_POST["btnactualizar"])){
    if (!empty($_POST["titulo"]) and !empty($_POST["fecha"]) and !empty($_POST["cedulaE"]) and !empty($_POST["cedulaP"]) and !empty($_POST["carrera"])){

        $codigo=$_POST["codigo"];
        $titulo=$_POST["titulo"];
        $fecha=$_POST["fecha"];
        $cedulaE=$_POST["cedulaE"];
        $cedulaP=$_POST["cedulaP"];
        $carrera=$_POST["carrera"];
        $documento2=$_POST["documento2"];
       
        $sql=$conexion->query("update tesis set titulo = '$titulo', fecha = '$fecha', cedulaE = '$cedulaE', cedulaP = '$cedulaP', carrera = '$carrera' where codigo = $codigo ");
        
        $file = "tesis/{$codigo}.pdf";
        unlink($file);

        $nombre_documento = strval($codigo).".pdf"; 
        move_uploaded_file($_FILES["documento"]["tmp_name"], "tesis/" . $nombre_documento);

            if ($sql==1) {
                header("location:index.php");
            } else {
               
                echo '<div class = "alert-danger">Error al modificar los datos</div>';

            }
            
    }else{
        echo '<div class = "alert-warning">alguno de los campos esta vacio</div>';
    }
}

?>