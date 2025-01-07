<?php

    include("../include/sesionproy.php");

    include("../include/conexion.php");
    $con = conexion();

    $id = $_GET["id_proyecto"];

    $sql = "SELECT * FROM proyectos WHERE id_proyecto = '$id'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edicion de Proyecto</title>
</head>
<body>
    <h1>Editar Proyecto</h1>
    <form action="../control/control_editar_proyecto.php" method="post">
        <input type="hidden" name="id" value="<?= $row['id_proyecto'] ?>">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" value="<?= $row['Nombre'] ?>">
        <br>
        <label for="inicio">Inicio: </label>
        <input type="date" name="inicio" id="inicio" value="<?= date("Y-m-d", strtotime($row['fecha_in'])) ?>">
        <br>
        <label for="fin">Finalizacion: </label>
        <input type="date" name="fin" id="fin" value="<?= date("Y-m-d", strtotime($row['fecha_fin'])) ?>">
        <br>
        <label for="ubicacion">Ubicacion: </label>
        <input type="text" name="ubicacion" id="ubicacion" value="<?= $row['ubicacion'] ?>">
        <br><br>
        <button type="submit">Editar Proyecto</button>
    </form>

</body>
</html>