<?php
    session_start();
    include_once("functions.php");
    
    $hostname = "localhost";
    $dbuser = "root";
    $dbpass = '';
    $dbname = "doitc";

    $conn = dbconnection($hostname, $dbuser, $dbpass, $dbname);
                                 
?>