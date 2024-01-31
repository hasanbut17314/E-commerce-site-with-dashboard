<?php
session_start();
include "../config/dbconnect.php";
if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
    if (isset($_POST['scope'])) {
        $scope = $_POST['scope'];
        switch ($scope) {
            case "add":
                $product_id = $_POST['product_id'];
                $product_qty = $_POST['product_qty'];
                $user_id = $_SESSION['user_id'];

                $insert_query = "INSERT INTO carts (user_id, product_id, product_qty) VALUES ('$user_id', '$product_id', '$product_qty')";
                $insert_query_run = mysqli_query($con, $insert_query);

                if ($insert_query_run) {
                    echo 201;
                } else {
                    echo 500;
                }
                break;

            case "update":
                $product_id = $_POST['product_id'];
                $product_qty = $_POST['product_qty'];
                $user_id = $_SESSION['user_id'];
                $update_query = "UPDATE carts SET product_qty='$product_qty' WHERE user_id='$user_id' AND product_id='$product_id'";
                $update_query_run = mysqli_query($con, $update_query);
                if ($update_query_run) {
                    echo 200;
                } else {
                    echo 500;
                }
                break;
            case "delete":
                $cart_id = $_POST['cart_id'];
                $delete_query = "DELETE FROM carts WHERE id='$cart_id'";
                $delete_query_run = mysqli_query($con, $delete_query);
                if ($delete_query_run) {
                    echo 200;
                } else {
                    echo 500;
                }
                break;
            default:
                echo 500;
        }
    }
} else {
    echo 401;
}
