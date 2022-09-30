<?php
session_start();
unset($_SESSION['userid']);
unset($_SESSION['userfullname']);
header("Location: admin/index.php");
?>