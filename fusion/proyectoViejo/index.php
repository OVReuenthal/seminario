<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de gestion de tesis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cecbba6a61.js" crossorigin="anonymous"></script>
</head>
<body>
    <script>
        function eliminar(){
            var respuesta = confirm("¿Esta seguro de que desea eliminar este registro?");
            return respuesta;
        }
    </script>
    <h1 class= "text-center p-2" >Sistema de gestion de tesis</h1>
    <?php
    include "modelo/conexion.php";
    include "controlador/eliminar_tesis.php";
    ?>
    <div class = "container-fluid row">
        
        <form class = "col-4 bg bg-info" method = "POST" enctype= "multipart/form-data">
            <div class="text-center">
                <a href = "login.php" class="btn btn-small btn-danger " name = "salir">cerrar sesion</a>
            </div>
            
            <h2 class = "text-center">Ingresar datos de tesis</h2>
            <?php
                include "modelo/conexion.php";
                include "controlador/registro_tesis.php"
            ?>

            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo de tesis</label>
                <input type="text" class="form-control" name="titulo">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Fecha</label>
                <input type="date" class="form-control" name="fecha">
            </div>
            <div class="mb-3">
                <label for="cedulaE" class="form-label">Cedula del estudiante</label>
                <input type="text" class="form-control" name="cedulaE">
            </div>
            <div class="mb-3">
                <label for="cedulaP" class="form-label">Cedula del profesor</label>
                <input type="text" class="form-control" name="cedulaP">
            </div>
            <div class="mb-3">
                <label for="carrera" class="form-label">Carrera</label>
                <input type="text" class="form-control" name="carrera">

            <div class="mb-3 ">
            <label for="carrera" class="form-label">Ubicacion del documento</label>
                <input class = "btn btn-info" type="file" name="documento">
            </div>    

            </div>
            
            
            <button type="submit" class="btn btn-primary" name = "btnregistrar" value = "ok">Registrar</button>
        </form>

        <div class = "col-8 p-4">
        
        <form action="" method = "GET">
            <div class="mb-3">
                <label for="busqueda" class="form-label">Buscar carrera</label>
                <input type="text" class="form-control" name="busqueda">
                <input type="submit" name = "enviar" value = "buscar">
            </div>

                
                    <?php
                        include "modelo/conexion.php";

                        if(isset($_GET['enviar'])) {

                    ?>
                        <table class="table bg bg-primary">
                            <thead class = " bg bg-secondary">
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Cedula estudiante</th>
                                    <th scope="col">Cedula profesor</th>
                                    <th scope="col">Carrera</th>
                                    <th scope="col"></th>
                                </tr>
                             </thead>
                            <tbody>

                    <?php
                            $busqueda = $_GET['busqueda'];
                
                            $consulta = $conexion->query("select * from tesis where carrera like '%$busqueda%'");

                            
                            while ($datos = $consulta->fetch_object()){
                    ?>
                             <tr>
                        <th scope="row">
                            <a href="tesis/<?=$datos -> codigo?>.pdf" target="_blank"><?= $datos -> codigo ?></a>
                        </th>
                        <td><?= $datos -> titulo ?></td>
                        <td><?= $datos -> fecha ?></td>
                        <td><?= $datos -> cedulaE ?></td>
                        <td><?= $datos -> cedulaP ?></td>
                        <td><?= $datos -> carrera ?></td>
                        <td>
                            <a href="modificar_tesis.php?codigo=<?=$datos -> codigo?> " class = "btn btn-small btn-warning"><i class="fa-solid fa-file-pen"></i></a>
                            <a onclick = "return eliminar()" href="index.php?codigo=<?=$datos -> codigo?>" class = "btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                        
                    ?>


            </tbody>
            </table>
        </form>

        <?php

        ?>

        <table class="table">
            <thead class = "bg-secondary">
                <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Titulo</th>
                <th scope="col">Fecha</th>
                <th scope="col">Cedula estudiante</th>
                <th scope="col">Cedula profesor</th>
                <th scope="col">Carrera</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                
            <?php
                include "modelo/conexion.php";

                 $sql=$conexion-> query(" select * from tesis");
                 while($datos = $sql ->fetch_object()){ 
            ?>
                <tr>
                    <th scope="row">
                        <a href="tesis/<?=$datos -> codigo?>.pdf" target="_blank"><?= $datos -> codigo ?></a>
                    </th>
                    <td><?= $datos -> titulo ?></td>
                    <td><?= $datos -> fecha ?></td>
                    <td><?= $datos -> cedulaE ?></td>
                    <td><?= $datos -> cedulaP ?></td>
                    <td><?= $datos -> carrera ?></td>
                    <td>
                        <a href="modificar_tesis.php?codigo=<?=$datos -> codigo?> " class = "btn btn-small btn-warning"><i class="fa-solid fa-file-pen"></i></a>
                        <a onclick = "return eliminar()" href="index.php?codigo=<?=$datos -> codigo?>" class = "btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>

            <?php } ?>

            </tbody>
        </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>