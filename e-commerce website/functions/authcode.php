<?php  
session_start();
include "../config/dbconnect.php";
include "myfunctions.php";
if(isset($_POST['register_btn'])) {

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    // check for already email existence
    $email_check_query = "SELECT email FROM users WHERE email = '$email'";
    $email_check_result = mysqli_query($con, $email_check_query);
    if(mysqli_num_rows($email_check_result) > 0) {
        $_SESSION['message'] = "Email Already Exists!";
        header("location: ../register.php");
    }
    else {

    if($password == $cpassword) {
        $insert_query = "INSERT INTO users (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";
        $result_insert_query = mysqli_query($con, $insert_query);

        if($result_insert_query) {
            $_SESSION['message'] = "Registered Successfully";
            header("location: ../login.php");
        }
        else{
            $_SESSION['message'] = "Something went wrong! Please try again";
            header("location: ../register.php");
        }

    }
    else {
        $_SESSION['message'] = "Passwords do not match!";
        header("location: ../register.php");
    }
}

}
//Check for Login form
else if(isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $login_query_result = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_result) > 0) {
        $login_data = mysqli_fetch_assoc($login_query_result);
        $_SESSION['user_id'] = $login_data['id'];
        $_SESSION['username'] = $login_data['name'];
        $_SESSION['role_as'] = $login_data['role_as'];

        if($_SESSION['role_as'] != 1) {
            redirect(" ../index.php", "Login Successfully");
        }
        else{
            redirect(" ../admin/index.php", "Welcome to Admin Dashboard");
        }
    }
    else {
        redirect(" ../login.php", "Login Failed! Please enter valid email and password");
    }
}

?>