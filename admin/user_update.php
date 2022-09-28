<?php
    include_once('includes/dbconnection.php');
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $role = $_POST['role'];
        $userstate = $_POST['userstate'];
        $id = $_POST['id'];
        $sql = "UPDATE `users` SET `email`='$email',`password`='$password',`firstname`='$firstname',`lastname`='$lastname',`role`='$role',`active`='$userstate' WHERE `id`='$id'";
        if(mysqli_query($conn, $sql)){
            $_SESSION['update_operation'] = true;
        }
        else{
            $_SESSION['update_operation'] = false;
        }
        header("Location: users_all.php");

    }