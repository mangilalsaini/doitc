<?php
    function dbconnection($hostname, $dbuser, $dbpass, $dbname){
        $conn = mysqli_connect($hostname, $dbuser, $dbpass, $dbname);
        if(mysqli_connect_errno()){
            die("Database Error Encountered : " . mysqli_connect_errno());
        }
        else{
            return $conn;
        }
    }

    function user_add($conn, $query){
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function user_edit($conn, $query){
        $result = mysqli_query($conn, $query);
        return $result;
    }
    function delete($conn, $query){
        $result = mysqli_query($conn, $query);
        return $result;
    }


?>