<?php
session_start();
session_destroy();
$_SESSION['email'] = "";
header("location:login.php");
?>