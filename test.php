<?php
$hostname = "localhost";
$user = 'root';
$password = '';
$database = 'doitc';
$conn = mysqli_connect($hostname, $user, $password, $database);
if(mysqli_connect_errno()){
    echo "Database Error Encountered: " . mysqli_connect_error();
}

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result)){
    echo $row['id'] . " " . $row['firstname'] . " " . $row['lastname'] . "<br>";
}



?>
