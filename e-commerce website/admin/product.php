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
            <div class="card">
                <div class="card-header">
                    <h4>Products</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                <!-- Dynamically generated Products -->

                        <tbody>
                            <?php
                            $products = getAll("products");
                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td>
                                            <img src="../uploads/<?= $item['image'] ?>" height="50px" width="50px" alt="<?= $item['image'] ?>">
                                        </td>
                                        <td>
                                            <?= $item['status'] == '0' ? 'Visible' : 'hidden'; ?>
                                        </td>
                                        <td>
                                            <a href="edit-product.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger delete_product_btn" value="<?= $item['id'] ?>">Delete</button>
                                        </td>
                                    </tr>

                            <?php
                                }
                            } else {
                                echo "<h4>No records found</h4>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>