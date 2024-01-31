<?php
session_start();
if(isset($_SESSION['username'])) {
unset($_SESSION['username']);
$_SESSION['message'] = "Logged Out Successfully";
header("location: index.php");
}
else {
    $_SESSION['message'] = "You need to login first";
    header("location: index.php");
}
?>