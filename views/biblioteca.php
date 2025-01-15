<?php 
session_start();
include("../db.php");
$conn = conexion();

$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : null;

?>

<?php include('includes/header.php'); ?>

<main class="container mx-auto p-4">
  <div class="flex flex-wrap">
    <div class="w-full md:w-1/3 p-2">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="bg-<?= $_SESSION['message_type'] == 'success' ? 'green' : 'red' ?>-100 border border-<?= $_SESSION['message_type'] == 'success' ? 'green' : 'red' ?>-400 text-<?= $_SESSION['message_type'] == 'success' ? 'green' : 'red' ?>-700 px-4 py-3 rounded relative" role="alert">
        <?= $_SESSION['message']?>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
          <svg class="fill-current h-6 w-6 text-<?= $_SESSION['message_type'] == 'success' ? 'green' : 'red' ?>-500" role="button" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652a.5.5 0 00-.707 0L10 9.293 6.36 5.652a.5.5 0 00-.707.707L9.293 10l-3.64 3.641a.5.5 0 00.707.707L10 10.707l3.641 3.64a.5.5 0 00.707-.707L10.707 10l3.64-3.641a.5.5 0 000-.707z"/></svg>
        </span>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <?php if ($rol != 0) : ?>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
          <form class="form" method="post" action="../controllers/registroLibro.php" enctype="multipart/form-data">
              <div class="mb-4">
                  <input type="text" name="titulo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Titulo" autofocus>
              </div>
              <div class="mb-4">
                  <input type="date" name="fecha" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="fecha" autofocus>
              </div>
              <div class="mb-4">
                  <input type="text" name="autor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="autor" autofocus>
              </div>
              <div class="mb-4">
                  <input type="text" name="editorial" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="editorial" autofocus>
              </div>
              <div class="mb-4">
                  <input type="text" name="genero" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="genero" autofocus>
              </div>
              <div class="mb-4">
                  <input type="file" name="documento" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="archivo" autofocus>
              </div>
              <input type="submit" name="save_task" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" value="Save Task">
          </form>
        </div>
      <?php else : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Acceso Denegado!</strong>
            <span class="block sm:inline">No tienes permisos para registrar un libro.</span>
        </div>
      <?php endif; ?>

    </div>
    <div class="w-full md:w-2/3 p-2">
    <table class="min-w-full bg-white">
    <thead>
        <tr>
            <th class="py-2 px-4 bg-gray-200 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">codigo</th>
            <th class="py-2 px-4 bg-gray-200 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">titulo</th>
            <th class="py-2 px-4 bg-gray-200 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">fecha</th>
            <th class="py-2 px-4 bg-gray-200 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">autor</th>
            <th class="py-2 px-4 bg-gray-200 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">editorial</th>
            <th class="py-2 px-4 bg-gray-200 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">genero</th>
            <th class="py-2 px-4 bg-gray-200 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">accion</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM libros";
        $result_tasks = mysqli_query($conn, $query);    

        while($row = mysqli_fetch_assoc($result_tasks)) { ?>
        <tr>
            <th scope="row">
                <a href="../libros/<?= $row['codigo'] ?>.pdf" target="_blank"><?= $row['codigo'] ?></a>
            </th>
            <td class="border px-4 py-2"><?php echo $row['titulo']; ?></td>
            <td class="border px-4 py-2"><?php echo $row['fecha']; ?></td>
            <td class="border px-4 py-2"><?php echo $row['autor']; ?></td>
            <td class="border px-4 py-2"><?php echo $row['editorial']; ?></td>
            <td class="border px-4 py-2"><?php echo $row['genero']; ?></td>
            <td class="border px-4 py-2">
                <?php if ($rol != 0) : ?>
                    <a href="edit.php?codigo=<?php echo $row['codigo']?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                        <i class="fas fa-marker"></i>
                    </a>
                    <a href="../controllers/eliminarLibro.php?codigo=<?php echo $row['codigo']?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                        <i class="far fa-trash-alt"></i>
                    </a>
                <?php endif; ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
