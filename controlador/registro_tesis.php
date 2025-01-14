<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["titulo"]) and !empty($_POST["fecha"]) and !empty($_POST["cedulaE"]) and !empty($_POST["cedulaP"]) and !empty($_POST["carrera"])){
        
        $titulo=$_POST["titulo"];
        $fecha=$_POST["fecha"];
        $cedulaE=$_POST["cedulaE"];
        $cedulaP=$_POST["cedulaP"];
        $carrera=$_POST["carrera"];


        $sql = "SELECT codigo FROM tesis";
        $resultado = $conexion->query($sql);
        $datos = array();

        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila['codigo'];
        }

        $cont = 1;

        while ($cont != 0) {
            $numero = rand(0, 999999);
            if (in_array($numero, $datos)) {
                $cont++;
            } else {
                $cont = 0;
            }
        }


        $sql=$conexion->query(" insert into tesis(codigo,titulo,fecha,cedulaE,cedulaP,carrera)values($numero,'$titulo','$fecha','$cedulaE','$cedulaP','$carrera')");
        $nombre_documento = strval($numero).".pdf"; 
        move_uploaded_file($_FILES["documento"]["tmp_name"], "tesis/" . $nombre_documento);
        if ($sql == 1) {
            echo '<div class = "alert alert-success">Tesis registrada correctamente</div>';
        } else {
            echo '<div class = "alert alert-danger">Tesis no registrada</div>';

        


        }
        
    }else{
        echo '<div class = "alert alert-danger">Alguno de los campos esta vacio</div>';
    }
}
?>