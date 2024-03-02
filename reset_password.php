<?php
require_once('includes/db_connect.php');
require_once('includes/logincheck.php');

$token = $_SESSION['token'];
if (isset($_POST['reset'])) {
    $newPassword = $_POST['password'];
    $cPassword = $_POST['cpassword'];
    if ($newPassword == $cPassword) {
        $hashed_password = password_hash($newpassword, PASSWORD_DEFAULT);
            $sql1 = "UPDATE `users` SET `password` = '$hashed_password' WHERE token='$token'";
            if ($conn->query($sql1) === TRUE) {
                echo "<script>alert('Password updated successfully!')</script>";
                echo "<script>window.location.href = 'login.php';</script>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "<script>alert('Updated Passwords are not the same!')</script>";
        }
     
}

mysqli_close($conn);
?>
<!DOCTYPE HTML>
<html>

<head>
    <?php include_once('includes/header.php') ?>

</head>

<body>
    <?php include_once('includes/navbar.php') ?>

    <div class="form">
        <div class="card">
            <h3 class="text-center">Reset Pasword FORM</h3>
            <form action="" method="post">

            <div class="form-group">
        <label for="password">Your New Password:</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
    </div>
    <div class="form-group">
        <label for="password">Confirm Your New Password:</label>
        <input type="password" name="cpassword" id="password" class="form-control" placeholder="Enter your password">
    </div>
               <input type="submit" name="reset" value="Reset Password" class="btn btn-primary">
            </form>

        </div>
    </div>




    <?php include_once('includes/footer.php') ?>
    </div>



    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Stellar Parallax -->
    <script src="js/jquery.stellar.min.js"></script>
    <!-- Carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Flexslider -->
    <script src="js/jquery.flexslider-min.js"></script>
    <!-- countTo -->
    <script src="js/jquery.countTo.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
    <script src="js/google_map.js"></script>
    <!-- Count Down -->
    <script src="js/simplyCountdown.js"></script>
    <!-- Main -->
    <script src="js/main.js"></script>
</body>

</html>