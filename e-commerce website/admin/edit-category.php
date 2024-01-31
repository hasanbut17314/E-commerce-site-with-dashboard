<?php 
include "includes/header.php";
include "../functions/myfunctions.php";
if (!isset($_SESSION['username'])) {
    redirect("../login.php", "Please Login to Access");
    die();
}
else if($_SESSION['role_as'] != 1) {
    redirect("../index.php", "You are not allowed to Access this page");
    die();
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $category = getfromID("categories", $id);
                if(mysqli_num_rows($category) > 0) {
                    $row = mysqli_fetch_assoc($category);
            ?>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input type="hidden" name="category_id" value="<?= $row['id'] ?>">
                            <input type="text" name="name" value="<?= $row['name'] ?>" placeholder="Enter Category Name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Slug</label>
                            <input type="text" name="slug" value="<?= $row['slug'] ?>" placeholder="Enter Slug" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Description</label>
                            <textarea name="desc" placeholder="Enter Description" class="form-control" rows="3"><?= $row['description'] ?></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Upload Image</label>
                            <input type="hidden" name="old_img" value="<?= $row['image'] ?>">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta title</label>
                            <input type="text" name="meta_title" value="<?= $row['meta_title'] ?>" placeholder="Enter Meta title" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Description</label>
                            <textarea name="meta_desc" placeholder="Enter Meta Description" class="form-control" rows="3"><?= $row['meta_description'] ?></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Keywords</label>
                            <textarea name="meta_keywords" placeholder="Enter Meta Keywords" class="form-control" rows="3"><?= $row['meta_keywords'] ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" <?= $row['status'] ? "checked" : ""; ?>>
                        </div>
                        <div class="col-md-6">
                            <label for="">Popular</label>
                            <input type="checkbox" name="popular" <?= $row['popular'] ? "checked" : ""; ?>>
                        </div>
                        <div class="col-md-12 mt-3">
                            <button type="submit" name="update_category_btn" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <?php
                }
                else{
                    echo "<h3>No Record Found</h3>";
                }
            }
            else {
                echo "<h3>id missing from url</h3>";
            }
            ?>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
