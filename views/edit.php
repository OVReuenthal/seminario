<?php
include("../db.php");
$db = conexion();

$titulo = $fecha = $autor = $editorial = $genero = ""; 

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $result = $db->query("SELECT * FROM libros WHERE codigo = $codigo");
    if (mysqli_num_rows($result) == 1) {
        $row = $result->fetch_assoc();
        $titulo = $row['titulo'];
        $fecha = $row['fecha'];
        $autor = $row['autor'];
        $editorial = $row['editorial'];
        $genero = $row['genero'];
    }
}
?>

<?php include('includes/header.php'); ?>
<div class="container mx-auto p-4">
  <div class="flex flex-col md:flex-row">
    <div class="w-full md:w-1/3 mx-auto">
      <div class="bg-white p-6 rounded-lg shadow-lg">
        <form action="edit.php?codigo=<?php echo $_GET['codigo']; ?>" method="POST" enctype="multipart/form-data">
          <div class="mb-4">
            <input name="titulo" type="text" class="form-control w-full p-2 border border-gray-300 rounded" value="<?php echo $titulo; ?>" placeholder="Update Title">
          </div>
          <div class="mb-4">
            <input name="fecha" type="date" class="form-control w-full p-2 border border-gray-300 rounded" value="<?php echo $fecha; ?>" placeholder="Update Date">
          </div>
          <div class="mb-4">
            <input name="autor" type="text" class="form-control w-full p-2 border border-gray-300 rounded" value="<?php echo $autor; ?>" placeholder="Update Author">
          </div>
          <div class="mb-4">
            <input name="editorial" type="text" class="form-control w-full p-2 border border-gray-300 rounded" value="<?php echo $editorial; ?>" placeholder="Update Editorial">
          </div>
          <div class="mb-4">
            <input name="genero" type="text" class="form-control w-full p-2 border border-gray-300 rounded" value="<?php echo $genero; ?>" placeholder="Update Genre">
          </div>
          <div class="mb-4">
            <input type="file" name="documento" class="form-control w-full p-2 border border-gray-300 rounded">
          </div>
          <button class="bg-green-500 text-white p-2 rounded" name="update">
            Update
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

<?php
if (isset($_POST['update'])) {
  if (!empty($_POST['titulo']) && !empty($_POST['fecha']) && !empty($_POST['autor']) && !empty($_POST['editorial']) && !empty($_POST['genero'])) {
      $codigo = $_GET['codigo'];
      $titulo = $_POST['titulo'];
      $fecha = $_POST['fecha'];
      $autor = $_POST['autor'];
      $editorial = $_POST['editorial'];
      $genero = $_POST['genero'];

      $sql = $db->query("UPDATE libros SET titulo = '$titulo', fecha = '$fecha', autor = '$autor', editorial = '$editorial', genero = '$genero' WHERE codigo = $codigo");

      if ($sql) {
          if (!empty($_FILES['documento']['tmp_name'])) {
              $file = "../libros/{$codigo}.pdf";
              if (file_exists($file)) {
                  unlink($file);
              }
              $nombre_documento = strval($codigo) . ".pdf";
              move_uploaded_file($_FILES["documento"]["tmp_name"], "../libros/" . $nombre_documento);
          }

          header("Location: ../views/biblioteca.php");
          exit();
      } else {
          echo '<div class="alert alert-danger">Error al modificar los datos. Inténtalo de nuevo.</div>';
      }
  } else {
      echo '<div class="alert alert-warning">Alguno de los campos está vacío.</div>';
  }
}
?>

<style>
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
    font-family: Arial, sans-serif;
    width: 90%;
    max-width: 600px;
    margin: 20px auto;
    text-align: center;
}
.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}
.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}
.alert-warning {
    color: #856404;
    background-color: #fff3cd;
    border-color: #ffeeba;
}
</style>
