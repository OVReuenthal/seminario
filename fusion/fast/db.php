<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'pruebafast'
) or die(mysqli_erro($mysqli));

?>
