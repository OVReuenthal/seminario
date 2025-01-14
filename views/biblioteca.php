<?php include("db.php"); ?>

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
      <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="save_task.php" method="POST">
          <div class="mb-4">
            <input type="text" name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Task Title" autofocus>
          </div>
          <div class="mb-4">
            <textarea name="description" rows="2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Task Description"></textarea>
          </div>
          <input type="submit" name="save_task" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" value="Save Task">
        </form>
      </div>
    </div>
    <div class="w-full md:w-2/3 p-2">
      <table class="min-w-full bg-white">
        <thead>
          <tr>
            <th class="py-2 px-4 bg-gray-200 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">Title</th>
            <th class="py-2 px-4 bg-gray-200 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">Description</th>
            <th class="py-2 px-4 bg-gray-200 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">Created At</th>
            <th class="py-2 px-4 bg-gray-200 text-left text-sm leading-4 font-medium text-gray-600 uppercase tracking-wider">Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM task";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td class="border px-4 py-2"><?php echo $row['title']; ?></td>
            <td class="border px-4 py-2"><?php echo $row['description']; ?></td>
            <td class="border px-4 py-2"><?php echo $row['created_at']; ?></td>
            <td class="border px-4 py-2">
              <a href="edit.php?id=<?php echo $row['id']?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
