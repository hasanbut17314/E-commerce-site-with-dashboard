<?php 
if(isset($_SESSION['username'])) {
    $_SESSION['message'] = "You are already Registered";
    header("location: index.php");
    die();
}
include "includes/header.php";
?>

<div class="container py-5">
    <?php 
    if(isset($_SESSION['message'])) {
    
    ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> <?php echo $_SESSION['message']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php unset($_SESSION['message']); } ?>
    <div class="card">
        <div class="card-header">
            <h2>Registration Form</h2>
        </div>
            <div class="card-body">
                <form action="functions/authcode.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your Name" required>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter your Email Address" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="number" class="form-control" name="phone" placeholder="Enter your phone">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" placeholder="Confirm your password" required>
                    </div>
                    <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>
                </form>
            </div>
    </div>
</div>

<?php include "includes/footer.php" ?>