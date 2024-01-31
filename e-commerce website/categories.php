<?php
include "includes/header.php";
include "functions/userfunctions.php";
?>
<div class="container py-3">
    <div class="row">
        <div class="col-md-12">
            <h2>Our Collections</h2>
            <hr>
            <div class="row">
            <?php
            $category = getAllActive("categories");
            if(mysqli_num_rows($category) > 0) {
                foreach($category as $item) {
            ?>  
                <div class="col-lg-3 col-md-4 col-sm-5 col-8 mx-auto mx-sm-0 card-group mb-4">
                    <div class="card shadow rounded" role="button">
                    <a href="products.php?category=<?= $item['slug'] ?>">
                        <div class="card-body h-100 d-flex flex-column justify-content-around align-items-center">
                          <img src="uploads/<?= $item['image'] ?>" alt="Category image" class="w-100 card-img-custom">  
                          <h5 class="text-center my-1 fw-bolder"><?= $item['name'] ?></h5>
                          <p class="text-center"><?= $item['description'] ?></p>
                        </div>
                    </div>
                    </a>
                </div>      
        <?php }
            }
            else {
                echo "<h3>No Categories Available</h3>";
            }
            ?>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php" ?>