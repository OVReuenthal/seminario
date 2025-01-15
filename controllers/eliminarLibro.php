<?php
if (!empty($_GET["codigo"])) {

    include("../db.php");
    $db = conexion();
    
    $codigo = $_GET["codigo"];
    $file = "../libros/{$codigo}.pdf";
    
    if (file_exists($file)) {
        unlink($file); // Eliminar el archivo PDF
    }

    // Usar consultas preparadas para evitar inyección SQL
    $stmt = $db->prepare("DELETE FROM libros WHERE codigo = ?");
    $stmt->bind_param("i", $codigo);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo '<div>Registro eliminado correctamente</div>';
    } else {
        echo '<div>Error al eliminar</div>';
    }

    $stmt->close();
    $db->close();

    // Redirigir a la página anterior
    header("Location: ../views/biblioteca.php");
    exit();
}
?>
