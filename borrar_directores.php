<?php

    include "conexion.php";
    ob_start();

    $id = $_GET['id'];

    $query = "DELETE FROM directores WHERE dire_id = {$id}";
    mysqli_query($conexion, $query);
    header("Location: directores.php");
?>