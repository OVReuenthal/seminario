<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Login</title>
</head>
<body>
    <form action="../control/control_login.php" method="post">
        <label for="usuario">Usuario: </label>
        <input type="text" name="usuario" id="usuario">
        <br>
        <label for="clave">Clave: </label>
        <input type="password" name="clave" id="clave">
        <br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>