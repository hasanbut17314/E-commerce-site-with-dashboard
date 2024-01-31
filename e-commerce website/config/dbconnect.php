<?php
$con = mysqli_connect("localhost", "root", "", "phpecom");
if(!$con) {
    echo "Database Connection Failed!".mysqli_connect_error();
}

?>