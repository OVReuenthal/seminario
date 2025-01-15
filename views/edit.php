<?php
include("../db.php");
$db = conexion();

$titulo = $fecha = $autor = $editorial = $genero = ""; // Definir variables vacías por defecto

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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <div class="container mx-auto p-4">
    <div class="flex justify-start">
      <div class="w-full md:w-1/3">
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
</body>
</html>
