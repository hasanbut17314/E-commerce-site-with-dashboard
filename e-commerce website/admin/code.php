<?php
include "../config/dbconnect.php";
include "../functions/myfunctions.php";
session_start();
if (isset($_POST['add_category_btn'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $desc = $_POST['desc'];
    $meta_title = $_POST['meta_title'];
    $meta_desc = $_POST['meta_desc'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . "." . $image_ext;

    if($name == "" OR $slug == "" OR $desc == "" OR $meta_title == "" OR $meta_desc == "" OR $meta_keywords == "" OR $_FILES['image']['tmp_name'] == null) {
        redirect(" add-category.php", "Error! All fields are required");
    }
    else {
    $category_query = "INSERT INTO categories(name, slug, description, meta_title, meta_description, meta_keywords, status, popular, image) VALUES ('$name','$slug','$desc','$meta_title','$meta_desc','$meta_keywords','$status','$popular', '$filename')";
    $category_query_run = mysqli_query($con, $category_query);

    if ($category_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
        redirect(" add-category.php", "Category added successfully");
    } else {
        redirect(" add-category.php", "Something went wrong");
    }
}
}

else if (isset($_POST['update_category_btn'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $desc = $_POST['desc'];
    $meta_title = $_POST['meta_title'];
    $meta_desc = $_POST['meta_desc'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_img'];
    $path = "../uploads";
    if ($new_image == null) {
        $update_filename = $old_image;
    } else {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . "." . $image_ext;      
    }

    $update_query = "UPDATE categories SET name = '$name', description = '$desc', image = '$update_filename', slug = '$slug', meta_title = '$meta_title', meta_description = '$meta_desc', meta_keywords = '$meta_keywords', status = '$status', popular = '$popular' WHERE id = '$category_id'";
    $update_query_run = mysqli_query($con, $update_query);

    if ($update_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            if (file_exists("../uploads/.$old_image")) {
                unlink("../uploads/".$old_image);
            }
        }
        redirect(" category.php?id=$category_id", "Category Updated Successfully");
    } else {
        redirect(" edit-category.php?id=$category_id", "Something went wrong");
    }
}

else if(isset($_POST['delete_category_btn'])) {
    $category_id = $_POST['category_id'];
    $image_query = "SELECT * FROM categories WHERE id = '$category_id'";
    $image_query_run = mysqli_query($con, $image_query);
    $row = mysqli_fetch_array($image_query_run);
    $image = $row['image'];

    $delete_query = "DELETE FROM categories WHERE id = '$category_id'";
    $delete_query_run = mysqli_query($con, $delete_query);
    if($delete_query_run) {
        if (file_exists("../uploads/$image")) {
            unlink("../uploads/$image");
        }
        // redirect(" category.php", "category deleted successfully");
        echo 200;
    }
    else {
        // redirect(" category.php", "Something went wrong");
        echo 500;
    }
}

else if(isset($_POST['add_product_btn'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_desc'];
    $desc = $_POST['desc'];
    $qty = $_POST['qty'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $meta_title = $_POST['meta_title'];
    $meta_desc = $_POST['meta_desc'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . "." . $image_ext;

    if($name == "" OR $slug == "" OR $desc == "" OR $qty == "" OR $selling_price == "" OR $meta_title == "" OR $meta_desc == "" OR $meta_keywords == "" OR $_FILES['image']['tmp_name'] == null) {
        redirect(" add-category.php", "Error! All fields are required");
    }
    else {
    $product_query = "INSERT INTO products (category_id, name, slug, small_description,description, qty, original_price, selling_price, meta_title, meta_description, meta_keywords, status, trending, image) VALUES ('$category_id', '$name', '$slug', '$small_description', '$desc', '$qty', '$original_price', '$selling_price', '$meta_title', '$meta_desc', '$meta_keywords', '$status', '$trending', '$filename')";
    $product_query_run = mysqli_query($con, $product_query);

    if($product_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
        redirect(" add-product.php", "Product added successfully");
    }
    else {
        redirect(" add-product.php", "Something went wrong");
    }
}
}

else if (isset($_POST['update_product_btn'])) {

    $id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_desc'];
    $desc = $_POST['desc'];
    $qty = $_POST['qty'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $meta_title = $_POST['meta_title'];
    $meta_desc = $_POST['meta_desc'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_img'];
    $path = "../uploads";
    if ($new_image == null) {
        $update_filename = $old_image;
    } else {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . "." . $image_ext;      
    }

    $update_query = "UPDATE products SET category_id = '$category_id', name = '$name', slug = '$slug', description = '$desc', qty = '$qty', original_price = '$original_price', selling_price = '$selling_price', meta_title = '$meta_title', meta_description = '$meta_desc', meta_keywords = '$meta_keywords', status = '$status', trending = '$trending', image = '$update_filename' WHERE id = '$id'";

    $update_query_run = mysqli_query($con, $update_query);
    if ($update_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            if (file_exists("../uploads/.$old_image")) {
                unlink("../uploads/".$old_image);
            }
        }
        redirect(" product.php?id=$product_id", "Product Updated Successfully");
    } else {
        redirect(" edit-product.php?id=$product_id", "Something went wrong");
    }
}

else if(isset($_POST['delete_product_btn'])) {
    $product_id = $_POST['product_id'];
    $image_query = "SELECT * FROM products WHERE id = '$product_id'";
    $image_query_run = mysqli_query($con, $image_query);
    $row = mysqli_fetch_array($image_query_run);
    $image = $row['image'];

    $delete_query = "DELETE FROM products WHERE id = '$product_id'";
    $delete_query_run = mysqli_query($con, $delete_query);
    if($delete_query_run) {
        if (file_exists("../uploads/$image")) {
            unlink("../uploads/$image");
        }
        // redirect(" product.php", "Product deleted successfully");
        echo 200;
    }
    else {
        // redirect(" product.php", "Something went wrong");
        echo 500;
    }
}

else {
    header("Location: index.php");
}
