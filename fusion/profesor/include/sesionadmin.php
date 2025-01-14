<?php
    session_start();
    if(!isset($_SESSION) || $_SESSION['tipo']!='admin')
        header("location: ../index.php");

?>
