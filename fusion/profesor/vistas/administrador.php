<?php

    include("../include/sesionadmin.php");

    include("../include/conexion.php");
    $con = conexion();
    $sql = "SELECT * FROM usuarios";
    $query = mysqli_query($con, $sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Administrador</title>
</head>
<body>
    <h1>Pagina de Administrador</h1>
    <form action="../control/control_nuevo_usuario.php" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre del usuario">
        <br>
        <label for="apellido">Apellido: </label>
        <input type="text" name="apellido" id="apellido" placeholder="Apellido del usuario">
        <br>
        <label for="usuario">Usuario: </label>
        <input type="text" name="usuario" id="usuario" placeholder="Login">
        <br>
        <label for="clave">Clave: </label>
        <input type="password" name="clave" id="clave" placeholder="Clave">
        <br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="email">
        <br>
        <label for="telefono">Telefono: </label>
        <input type="text" name="telefono" id="telefono" placeholder="Telefono">
        <br>
        <label for="tipo">Tipo de Usuario: </label>
        <select name="tipo" id="tipo">
            <option value="proy">Gerente de Proyectos</option>
            <option value="admin">Administrador</option>
        </select>
        <br><br>
        <button type="submit">Agregar Usuario</button>
        <br><br>
    </form>

    <div>
        <br>
        <h3>Usuarios Registrados</h3>
        <br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Clave</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Tipo Usuario</th>
                    <th>Creacion</th>
                    <th>Modificacion</th>
                    <th>Editor</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($query)): ?> 
                <tr>
                    <th><?= $row["id_usuario"] ?></th>
                    <th><?= $row["nombre"] ?></th>
                    <th><?= $row["apellido"] ?></th>
                    <th><?= $row["usuario"] ?></th>
                    <th><?= $row["clave"] ?></th>
                    <th><?= $row["email"] ?></th>
                    <th><?= $row["telefono"] ?></th>
                    <th><?= $row["tipo"] ?></th>
                    <th><?= $row["fecha_c"] ?></th>
                    <th><?= $row["fecha_m"] ?></th>
                    <th><?= $row["editor"] ?></th>
                    <th><a href="editar_usuario.php?id_usuario=<?= $row["id_usuario"] ?>">Editar</a></th>
                    <th><a href="../control/control_eliminar_usuario.php?id_usuario=<?= $row["id_usuario"] ?>">Eliminar</a></th>
                    <th><a href="">Proyectos</a></th>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <br><br><br>
    <a href="../control/control_cerrar.php">Cerrar Sesion</a>


</body>
</html>