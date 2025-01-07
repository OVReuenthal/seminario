<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cecbba6a61.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
                <?php
                    include "controlador/crearUsuario.php";
                    include "modelo/conexion.php";
                ?>

            <form class = "col-4" method = "post" action = "">
                <h3 class = "text-center">Ingresar datos de usuario</h3>

                <div class="mb-3">
                    <label for="nuevoUsuario" class="form-label">Nombre de usuario</label>
                    <input id = "nuevoUsuario" type="text" class="form-control" name="nuevoUsuario">
                </div>

                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input id = "contraseña" type="text" class="form-control" name="contraseña">
                </div>

                <div class="mb-3">
                    <label for="contraseñaC" class="form-label">Confirmar contraseña</label>
                    <input id = "contraseñaC" type="text" class="form-control" name="contraseñaC">
                </div>

                <div class="mb-3">
                    <label for="codigoA" class="form-label">Codigo del administrador</label>
                    <input id = "codigoA" type="text" class="form-control" name="codigoA">
                </div>
                
                <button type="submit" class="btn btn-primary" name = "btnregistrar" value = "ok">Registrar</button>
            </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>