<?php
include ('../views/includes/session.php');

if (!empty($_POST["titulo"]) && !empty($_POST["fecha"]) && !empty($_POST["autor"]) && !empty($_POST["editorial"]) && !empty($_POST["genero"])) {
    $titulo = $_POST["titulo"];
    $fecha = $_POST["fecha"];
    $autor = $_POST["autor"];
    $editorial = $_POST["editorial"];
    $genero = $_POST["genero"];

    include("../db.php");
    $conn = conexion();

    $sql = "SELECT codigo FROM libros";
    $resultado = $conn->query($sql);
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

    $sql = $conn->query("INSERT INTO libros (codigo, titulo, fecha, autor, editorial, genero) VALUES ($numero, '$titulo', '$fecha', '$autor', '$editorial', '$genero')");
    $nombre_documento = strval($numero) . ".pdf"; 
    move_uploaded_file($_FILES["documento"]["tmp_name"], "../libros/" . $nombre_documento);

    if ($sql) {
        echo '<div class="alert alert-success">Libro registrado correctamente. Redirigiendo...</div>';
        header("Refresh: 2; URL=../views/biblioteca.php");
    } else {
        echo '<div class="alert alert-danger">Error al registrar el libro. Inténtalo de nuevo.</div>';
        header("Refresh: 2; URL=../views/biblioteca.php");
    }

} else {
    echo '<div class="alert alert-warning">Todos los campos son obligatorios. Redirigiendo...</div>';
    header("Refresh: 2; URL=../views/biblioteca.php");
}
?>

<style>
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
    font-family: Arial, sans-serif;
    width: 90%;
    max-width: 600px;
    margin: 20px auto;
    text-align: center;
}
.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}
.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}
.alert-warning {
    color: #856404;
    background-color: #fff3cd;
    border-color: #ffeeba;
}
</style>

