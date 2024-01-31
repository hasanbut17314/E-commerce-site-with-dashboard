<?php 
include "config/dbconnect.php";

function getAllActive($table) {
    global $con;
    $query = "SELECT * FROM $table WHERE status = '0'";
    return $query_run = mysqli_query($con, $query);
}

function getIDActive($table, $id) {
    global $con;
    $query = "SELECT * FROM $table WHERE id = '$id' AND status = '0'";
    return $query_run = mysqli_query($con, $query);
}

function getSlugActive($table, $slug) {
    global $con;
    $query = "SELECT * FROM $table WHERE slug = '$slug' AND status = '0' LIMIT 1";
    return $query_run = mysqli_query($con, $query);
}

function getProdbyCategory($category_id) {
    global $con;
    $query = "SELECT * FROM products WHERE category_id = '$category_id' AND status = '0'";
    return $query_run = mysqli_query($con, $query);
}

function getcartItems() {
    global $con;
    $userId = $_SESSION['user_id'];
    $query = "SELECT c.id as cid, c.product_id, c.product_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c, products p WHERE c.product_id = p.id AND c.user_id = '$userId' ORDER BY c.id DESC";
    return $query_run = mysqli_query($con, $query);
}

function redirect($url, $message) {
    $_SESSION['message'] = $message;
    header("location:" .$url);
    die();
}
?>