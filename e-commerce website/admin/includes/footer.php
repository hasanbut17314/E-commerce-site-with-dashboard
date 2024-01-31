<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/perfect-scrollbar.min.js"></script>
<script src="assets/js/smooth-scrollbar.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="assets/js/custom.js"></script>

<script>
    <?php
    if(isset($_SESSION['message'])) {
    ?>
    alertify.set('notifier', 'position', 'top-right');
    alertify.success('<?php echo $_SESSION['message']; ?>');
    <?php
    unset($_SESSION['message']); }
     ?>
</script>
</body>

</html>