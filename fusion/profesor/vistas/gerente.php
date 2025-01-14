<?php

    include("../include/sesionproy.php");

    include("../include/conexion.php");
    $id = $_SESSION["id_usuario"];
    $con = conexion();
    $sql = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
    $query = mysqli_query($con, $sql);
    $datosusuario = mysqli_fetch_array($query);
    mysqli_close($con);

    $con = conexion();
    $sql = "SELECT * FROM proyectos WHERE id_usuario = '$id'";
    $query = mysqli_query($con, $sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginas de Gerentes de Proyectos</title>
</head>
<body>
    <h1>Pagina de Gerente de Proyectos</h1>
    <form action="../control/control_editar_gerente.php" method="post">
        <input type="hidden" name="id" value="<?= $datosusuario['id_usuario'] ?>">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" value="<?= $datosusuario['nombre'] ?>">
        <br>
        <label for="apellido">Apellido: </label>
        <input type="text" name="apellido" id="apellido" value="<?= $datosusuario['apellido'] ?>">
        <br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" value="<?= $datosusuario['email'] ?>">
        <br>
        <label for="telefono">Telefono: </label>
        <input type="text" name="telefono" id="telefono" value="<?= $datosusuario['telefono'] ?>">
        <br>
        <br>
        <button type="submit">Editar informacion</button>
        <br>
    </form>
    <form action="../vistas/proyecto.php">
        <br>
        <button type="submit">Crear un proyecto nuevo</button>
    </form>
    <div>
        <br>
        <h3>Proyectos</h3>
        <br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Inicio</th>
                    <th>Finalizacion</th>
                    <th>Ubicacion</th>
                    <th>Responsable</th>
                    <th>Creacion</th>
                    <th>Modificacion</th>
                    <th>editor</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($query)): ?> 
                <tr>
                    <th><?= $row["id_proyecto"] ?></th>
                    <th><?= $row["Nombre"] ?></th>
                    <th><?= $row["fecha_in"] ?></th>
                    <th><?= $row["fecha_fin"] ?></th>
                    <th><?= $row["ubicacion"] ?></th>
                    <th><?= $row["id_usuario"] ?></th>
                    <th><?= $row["fecha_c"] ?></th>
                    <th><?= $row["fecha_a"] ?></th>
                    <th><?= $row["editor"] ?></th>
                    <th><a href="../vistas/editar_proyecto.php?id_proyecto=<?= $row["id_proyecto"] ?>">Editar</a></th>
                    <th><a href="../control/control_eliminar_proyecto.php?id_proyecto=<?= $row["id_proyecto"] ?>">Eliminar</a></th>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <br><br><br>
    <a href="../control/control_cerrar.php">Cerrar Sesion</a>


</body>
</html>