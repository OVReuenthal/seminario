<?php
    session_start();
    if(isset($_POST) && !empty($_POST)) {
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];

        include("../db.php");
        $db = conexion();

        // Usar consultas preparadas para evitar inyección SQL
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
        $query = mysqli_query($db, $sql);

        $row = mysqli_fetch_array($query);

        if (!is_null($row)) {
            $_SESSION['rol'] = $row["rol"];
            header("Location: biblioteca.php");
            exit();
        } else {
            echo '<div class="alert alert-danger">ACCESO DENEGADO</div>';
        }

    };
?>
