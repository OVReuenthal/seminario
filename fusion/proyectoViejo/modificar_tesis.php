<?php
include "modelo/conexion.php";

$codigo=$_GET["codigo"];
echo $codigo;

$sql = $conexion->query(" select * from tesis where codigo=$codigo ");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cecbba6a61.js" crossorigin="anonymous"></script>
</head>
<body>


        <form class = "col-4" method = "POST" enctype= "multipart/form-data">
            <h3 class = "text-center">Modificar datos del registro</h3>
            <input type="hidden"name="codigo" value="<?=$_GET["codigo"] ?>">
            <?php

                include "controlador/actualizar.php";

                while($datos=$sql->fetch_object()){
                    ?>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Titulo de tesis</label>
                        <input type="text" class="form-control" name="titulo" value="<?=$datos->titulo ?>">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Fecha</label>
                        <input type="date" class="form-control" name="fecha" value="<?=$datos->fecha ?>">
                    </div>
                    <div class="mb-3">
                        <label for="cedulaE" class="form-label">Cedula del estudiante</label>
                        <input type="text" class="form-control" name="cedulaE" value="<?=$datos->cedulaE ?>">
                    </div>
                    <div class="mb-3">
                        <label for="cedulaP" class="form-label">Cedula del profesor</label>
                        <input type="text" class="form-control" name="cedulaP" value="<?=$datos->cedulaP ?>">
                    </div>
                    <div class="mb-3">
                        <label for="carrera" class="form-label">Carrera</label>
                        <input type="text" class="form-control" name="carrera" value="<?=$datos->carrera ?>">
                    </div>
                    <div class="mb-3 ">
                        <label for="carrera" class="form-label">Ubicacion del documento</label>
                        <input class = "btn btn-info" type="file" name="documento">
                    </div> 
                    <?php 
                }



            ?>

            
            
            
            <button type="submit" class="btn btn-primary" name = "btnactualizar" value = "ok">Actualizar</button>
        </form>
</body>
</html>