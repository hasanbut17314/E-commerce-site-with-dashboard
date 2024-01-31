<?php
include "includes/header.php";
include "functions/userfunctions.php";

if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products", $product_slug);
    $product = mysqli_fetch_array($product_data);
    if ($product) {
?>
        <div class="container py-3 my-2">
            <div class="row product_data">
                <div class="col-md-4">
                    <img src="uploads/<?= $product['image'] ?>" alt="Product Image" class="w-100">
                </div>
                <div class="col-md-8 mt-2">
                    <h3 class="fw-bold"><?= $product['name'] ?></h3>
                    <?php if ($product['trending'] == 1) {
                        echo '<span class="d-flex justify-content-end fw-bold text-opacity-25"><i class="fas fa-bolt mx-1 mt-1"></i>Trending</span>';
                    }
                    ?>
                    <p><?= $product['small_description'] ?></p>
                    <hr>
                    <div class="col-md-5 d-flex justify-content-between">
                        <p class="fw-bold">RS. <?= $product['selling_price'] ?></p>
                        <s class="fw-bold">RS. <?= $product['original_price'] ?></s>
                    </div>
                    <div class="input-group mb-3 mx-5" style="width: 20%">
                        <button class="input-group-text decrement-btn">-</button>
                        <input type="text" class="form-control text-center qty-input" value="1" disabled>
                        <button class="input-group-text increment-btn">+</button>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 d-flex justify-content-between">
                            <button class="btn btn-primary addtocartBtn" value="<?= $product['id'] ?>"><i class="fas fa-cart-shopping mx-2"></i>Add to Cart</button>
                            <button class="btn btn-warning text-white"><i class="fas fa-heart mx-2"></i>Add to Whitlist</button>
                        </div>
                    </div>
                    <p><?= $product['description'] ?></p>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "<h4>Something went wrong</h4>";
    }
} else {
    echo "<h4>Something went wrong</h4>";
}
?>
<?php include "includes/footer.php" ?>