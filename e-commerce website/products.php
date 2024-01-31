<?php
include "includes/header.php";
include "functions/userfunctions.php";

if(isset($_GET['category'])){
$category_slug = $_GET['category'];
$category_data = getSlugActive("categories", $category_slug);
$category = mysqli_fetch_array($category_data);
if($category) {
$cid = $category['id'];
?>
<div class="container py-3">
    <div class="row">
        <div class="col-md-12">
            <h3><?= $category['name'] ?></h3>
            <hr>
            <div class="row">
            <?php
            $products = getProdbyCategory($cid);
            if(mysqli_num_rows($products) > 0) {
                foreach($products as $item) {
            ?>  
                <div class="col-lg-3 col-md-4 col-sm-5 col-8 mx-auto mx-sm-0 card-group mb-4">
                    <a href="view-product.php?product=<?= $item['slug'] ?>">
                    <div class="card shadow" role="button">
                        <div class="card-body h-100 d-flex flex-column justify-content-around align-items-center">
                          <img src="uploads/<?= $item['image'] ?>" alt="Category image" class="w-100 h-50 card-img-custom">  
                          <h4 class="text-center my-1"><?= $item['name'] ?></h4>
                          <p class="text-center"><?= $item['small_description'] ?></p>
                        </div>
                    </div>
                    </a>
                </div>      
        <?php }
            }
            else {
                echo "<h4>No Products available for this category</h4>";
            }
            ?>
            </div>
        </div>
    </div>
</div>
<?php
}
else{
    echo "<h4>Something went wrong</h4>";
}
} 
else {
    echo "<h4>Something went wrong</h4>";
}
?>
<?php include "includes/footer.php" ?>