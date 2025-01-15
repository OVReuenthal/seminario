<?php
include("../db.php");
$db = conexion();

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
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?codigo=<?php echo $_GET['codigo']; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <input name="titulo" type="text" class="form-control" value="<?php echo $titulo; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="fecha" type="date" class="form-control" value="<?php echo $fecha; ?>" placeholder="Update Date">
        </div>
        <div class="form-group">
          <input name="autor" type="text" class="form-control" value="<?php echo $autor; ?>" placeholder="Update Author">
        </div>
        <div class="form-group">
          <input name="editorial" type="text" class="form-control" value="<?php echo $editorial; ?>" placeholder="Update Editorial">
        </div>
        <div class="form-group">
          <input name="genero" type="text" class="form-control" value="<?php echo $genero; ?>" placeholder="Update Genre">
        </div>
        <div class="form-group">
          <input type="file" name="documento" class="form-control">
        </div>
        <button class="btn-success" name="update">
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
    echo '<div class="alert-danger">Error al modificar los datos</div>';
  }
}
?>
