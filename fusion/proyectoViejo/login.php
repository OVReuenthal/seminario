<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cecbba6a61.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <h1>LOGIN</h1>
    <div class = "login-content">
        <form class = "col-4" method = "post" action = "">
                <h3 class = "text-center">Ingresar datos de usuario</h3>
                
                <?php
                    include("modelo/conexion.php");
                    include("controlador/cLogin.php")
                ?>

                <div class="mb-3">
                    <label for="usuario" class="form-label">Nombre de usuario</label>
                    <input id = "usuario" type="text" class="form-control" name="usuario">
                </div>

                <div  class="input div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>

                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input id = "contraseña" type="text" class="form-control" name="contraseña">
                </div>
                <div class="view">
                    <div class= "fas fa-eye verpassword" onclick="vista()" id="verpassword"></div>
                </div>  
                    
                <div class= "text-center">
                    <a href="crearUsuario.php" class="font-italic isai5">Ingresar nuevo usuario</a>
                </div>

                
                <button type="submit" class="btn btn-primary" name = "btningresar" value = "ok">Ingresar</button>
            </form>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>