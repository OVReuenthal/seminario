<?php
    session_start();
    if(!isset($_SESSION) || $_SESSION['tipo']!='proy')
        header("location: ../index.php");

?>
