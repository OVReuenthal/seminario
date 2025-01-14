<?php

    if (!empty($_GET["codigo"])) {
        $codigo = $_GET["codigo"];
        $file = "tesis/{$codigo}.pdf";
        unlink($file);
        $sql = $conexion->query(" delete from tesis where codigo = $codigo ");

        if ($sql == 1) {
            echo '<div>Registro eliminado correctamente</div>';

        } else {
            echo '<div>Error al eliminar</div>';
        }
        
    }

?>