<?php

    include("../include/sesionproy.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Nuevo</title>
</head>
<body>
    <form action="../control/control_nuevo_proyecto.php" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre del proyecto">
        <br>
        <label for="inicio">Fecha de Inicio: </label>
        <input type="date" name="inicio" id="incio" placeholder="Fecha de inicio">
        <br>
        <label for="fin">Fecha de Finalizacion: </label>
        <input type="date" name="fin" id="fin" placeholder="Fecha de finalizacion">
        <br>
        <label for="ubicacion">Ubicacion geografica: </label>
        <input type="text" name="ubicacion" id="ubicacion" placeholder="Lugar ejecucion del proyecto">
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>