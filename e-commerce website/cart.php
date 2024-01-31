<?php
include "includes/header.php";
include "functions/userfunctions.php";
?>
<?php
if (isset($_SESSION['message'])) {

?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?php echo $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php unset($_SESSION['message']);
} ?>
<div class="container mt-3 py-2">
    <div class="col-md-12 d-flex">
        <div class="col-md-6">
            <h5 class="me-4">Product</h5>
        </div>
        <div class="col-md-2">
            <h5>Selling Price</h5>
        </div>
        <div class="col-md-2">
            <h5 class="me-4">Quantity</h5>
        </div>
        <div class="col-md-2">
            <h5 class="me-3">Action</h5>
        </div>
    </div>
</div>
<div class="row container mx-auto">

    <?php
    $cartItems = getcartItems();
    if (mysqli_num_rows($cartItems) > 0) {
        foreach ($cartItems as $data) { ?>

            <div class="card mb-3 col-md-12 shadow-sm product_data">
                <div class="card-body d-flex align-items-center">
                    <div class="col-md-3">
                        <img src="uploads/<?= $data['image'] ?>" alt="Product Image" class="img-fluid" width="60px" height="50px">
                    </div>
                    <div class="col-md-3">
                        <h5><?= $data['name'] ?></h5>
                    </div>
                    <div class="col-md-2">
                        <input type="hidden" class="prodId" value="<?= $data['product_id'] ?>">
                        <h5>RS <?= $data['selling_price'] ?></h5>
                    </div>
                    <div class="col-md-2 d-flex">
                        <div class="input-group mb-1">
                            <button class="input-group-text decrement-btn updateQty">-</button>
                            <input type="text" class="form-control text-center qty-input" value="<?= $data['product_qty'] ?>" disabled>
                            <button class="input-group-text increment-btn updateQty">+</button>
                        </div>
                    </div>
                    <div class="col-md-2 me-5">
                        <button class="btn btn-sm btn-danger mb-2 deleteItem" value="<?= $data['cid'] ?>"><i class="fas fa-trash ms-1"></i> Remove</button>
                    </div>
                </div>
            </div>

    <?php
        }
    } else {
        echo '<h4>No items in cart<i class="fas fa-face-sad-tear"></i></h4>';
    }
    ?>

</div>

<?php include "includes/footer.php" ?>