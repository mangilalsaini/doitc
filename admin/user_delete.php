<?php
    include_once("includes/dbconnection.php");

    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id = $id";

    $result = mysqli_query($conn, $query);
    header("Location: users_all.php");
   
?>