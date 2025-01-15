<?php
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
        echo '<div class="alert alert-success">Libro registrado correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">Libro no registrado</div>';
    }


} else {
    echo '<div class="alert alert-danger">Alguno de los campos está vacío</div>';
}
?>
