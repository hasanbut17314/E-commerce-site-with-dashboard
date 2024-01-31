<?php
if(isset($_SESSION['username'])) {
    $_SESSION['message'] = "You are already Logged In";
    header("location: index.php");
    die();
}
include "includes/header.php";
?>
<div class="container py-5">
    <?php
    if (isset($_SESSION['message'])) {

    ?>
        <div class="alert alert-warning alert-dismissible fade show col-md-6 mx-auto" role="alert">
            <strong>Hey!</strong> <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php unset($_SESSION['message']);
    } ?>
    <div class="card col-md-6 mx-auto">
        <div class="card-header">
            <h3>Login Form</h3>
        </div>
        <div class="card-body">
            <form action="functions/authcode.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter your password">
                </div>
                <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>
<?php include "includes/footer.php" ?>