<?php

    include("../include/sesionadmin.php");

    include("../include/conexion.php");
    $con = conexion();

    $id = $_GET["id_usuario"];

    $sql = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edicion de Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="../control/control_editar_usuario.php" method="post">
        <input type="hidden" name="id" value="<?= $row['id_usuario'] ?>">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" value="<?= $row['nombre'] ?>">
        <br>
        <label for="apellido">Apellido: </label>
        <input type="text" name="apellido" id="apellido" value="<?= $row['apellido'] ?>">
        <br>
        <label for="usuario">Usuario: </label>
        <input type="text" name="usuario" id="usuario" value="<?= $row['usuario'] ?>">
        <br>
        <label for="clave">Clave: </label>
        <input type="password" name="clave" id="clave" value="<?= $row['clave'] ?>">
        <br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" value="<?= $row['email'] ?>">
        <br>
        <label for="telefono">Telefono: </label>
        <input type="text" name="telefono" id="telefono" value="<?= $row['telefono'] ?>">
        <br>
        <label for="tipo">Tipo de Usuario: </label>
        <select name="tipo" id="tipo" value="<?= $row['tipo'] ?>">
            <option value="proy">Gerente de Proyectos</option>
            <option value="admin">Administrador</option>
        </select>
        <br><br>
        <button type="submit">Editar Usuario</button>
    </form>

</body>
</html>