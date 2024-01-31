<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">PHP Ecom</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php">Collections</a>
        </li>
        <?php

        if (isset($_SESSION['username'])) { ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $_SESSION['username']; ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-3" href="cart.php">
              <?php
              include "config/dbconnect.php";
              $userId = $_SESSION['user_id'];
              $query = "SELECT * FROM carts WHERE user_id = '$userId'";
              $query_run = mysqli_query($con, $query);
              $cart_num = mysqli_num_rows($query_run);
              if ($cart_num > 0) { ?>

                <span class="bg-warning rounded-circle px-1 text-dark fw-bold" style="position: relative;
               bottom: 12px;
               left: 33px; font-size: 0.9em;"><?= $cart_num ?></span>
              <?php
              }
              ?>
              <i class="fas fa-shopping-cart"></i>
            </a>
          </li>

        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>