<?php
include "includes/header.php";
include "../functions/myfunctions.php";
if (!isset($_SESSION['username'])) {
    redirect("../login.php", "Please Login to Access");
    die();
} else if ($_SESSION['role_as'] != 1) {
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
                $products = getfromID("products", $id);
                if(mysqli_num_rows($products) > 0) {
                    $row = mysqli_fetch_array($products);
            ?>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Product</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <select class="form-select" name="category_id">
                                    <option selected>Select Category</option>
                                    <?php 
                                    $category = getAll("categories");
                                    if(mysqli_num_rows($category) > 0) {
                                        foreach($category as $item) {
                                    ?>
                                    <option value="<?= $item['id'] ?>"<?= $row['category_id'] == $item['id'] ? 'selected' : ''; ?> > <?= $item['name'] ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "No category available";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="hidden" name="product_id" value="<?= $id ?>">
                                <input type="text" name="name" placeholder="Enter Product Name" value="<?= $row['name']; ?>" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Slug</label>
                                <input type="text" name="slug" placeholder="Enter Slug" value="<?= $row['slug']; ?>" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Quantity</label>
                                <input type="number" name="qty" placeholder="Enter Quantity" value="<?= $row['qty']; ?>" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Small Description</label>
                                <textarea name="small_desc" placeholder="Enter small Description" class="form-control" rows="3"><?= $row['small_description']; ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea name="desc" placeholder="Enter Description" class="form-control" rows="3"><?= $row['description']; ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Upload Image</label>
                                <input type="hidden" name="old_img" value="<?= $row['image'] ?>">
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Original Price</label>
                                <input type="number" name="original_price" placeholder="Enter Original Price" value="<?= $row['original_price']; ?>" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Selling Price</label>
                                <input type="number" name="selling_price" placeholder="Enter Selling Price" value="<?= $row['selling_price']; ?>" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta title</label>
                                <input type="text" name="meta_title" placeholder="Enter Meta title" value="<?= $row['meta_title']; ?>" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Description</label>
                                <textarea name="meta_desc" placeholder="Enter Meta Description" class="form-control" rows="3"><?= $row['meta_description']; ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Keywords</label>
                                <textarea name="meta_keywords" placeholder="Enter Meta Keywords" class="form-control" rows="3"><?= $row['meta_keywords']; ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" <?= $row['status'] == '1' ? 'checked' : ''; ?>>
                            </div>
                            <div class="col-md-6">
                                <label for="">Trending</label>
                                <input type="checkbox" name="trending" <?= $row['trending'] == '1' ? 'checked' : ''; ?>>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" name="update_product_btn" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
         <?php
                }
                else {
                    echo "<h3>No product found</h3>";
                }
            }
            else {
                echo "<h3>Url id not found</h3>";
            }
          ?>                    
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>