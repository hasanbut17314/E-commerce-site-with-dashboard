<?php
include "includes/header.php"
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

    <div class="row container">
        <div class="col-md-6 mx-auto my-3">
            <h1>Hello! <i class="fas fa-user mx-2"></i></h1>
        </div>
    </div>

   <?php include "includes/footer.php" ?>