<?php include_once("admin/includes/dbconnection.php"); ?>

<?php
    //username = "admin"
    //password = "1234"

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $query = "SELECT * FROM users where email='$email' and password='$password'";

        $result = mysqli_query($conn, $query);

        if($row = mysqli_fetch_assoc($result)){
            $_SESSION['userid'] = $row['id'];
            $_SESSION['userfullname'] = $row['firstname'] . " " . $row['lastname'];
            header("Location: admin/index.php");
        }else{
            $_SESSION['Failed_Login'] = "Wrong Credentials Used!!!";
            header("Location: login.php");
        }
    } // We will check it later on
    else{
        header("Location: login.php");
    }