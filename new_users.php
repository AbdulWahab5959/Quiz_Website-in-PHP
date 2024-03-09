<!DOCTYPE HTML>
<html>
<head>
    <?php include_once('includes/header.php') ?>
</head>
<body>
<?php include_once('includes/navbar.php') ?>

<?php
require_once('includes/db_connect.php');
include_once('includes/logincheck.php');

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $role = 'user';

    if (!empty($name) && !empty($email) && !empty($password) && !empty($cpassword) && !empty($role)) {
        if ($password === $cpassword) {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $tokenLength = 32;
            $randomToken = bin2hex(random_bytes($tokenLength / 2));

            // Check if the email already exists
            $sql_check_email = "SELECT * FROM users WHERE email = '$email'";
            $result_check_email = mysqli_query($conn, $sql_check_email);
            if (mysqli_num_rows($result_check_email) > 0) {
                echo "<script>
                        Toastify({
                            text: 'Email already exists. Please use a different email.',
                            duration: 5000
                        }).showToast();
                        </script>";
            } else {
                // Insert data into the users table
                $sql_insert_user = "INSERT INTO users (name, email, password, role, token) 
                                    VALUES ('$name', '$email', '$hashed_password', '$role', '$randomToken')";
                if (mysqli_query($conn, $sql_insert_user)) {
                    echo "<script>
                            Toastify({
                                text: 'Registered successfully',
                                duration: 3000
                            }).showToast();
                            setTimeout(function() {
                                window.location = 'user_administration.php';
                            }, 5000);
                            </script>";
                    exit;
                } else {
                    echo "<script>
                            Toastify({
                                text: 'Error occurred while registering user',
                                duration: 5000
                            }).showToast();
                            </script>";
                }
            }
        } else {
            echo "<script>
                    Toastify({
                        text: 'Passwords do not match',
                        duration: 5000
                    }).showToast();
                    </script>";
        }
    } else {
        echo "<script>
                Toastify({
                    text: 'Please fill in all required fields',
                    duration: 5000
                }).showToast();
                </script>";
    }
    mysqli_close($conn);
}
?>

<div class="form">
    <div class="card">
        <h3 class="text-center">REGISTRATION FORM FOR NEW USER'S</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="email">Your Email:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address">
            </div>
            <div class="form-group">
                <label for="password">Your Password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
            </div>
            <div class="form-group">
                <label for="password">Confirm Password:</label>
                <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Enter your password">
            </div>
            
            <input type="submit" name="register" value="Register" class="btn btn-primary">
        </form>
    </div>
</div>

<?php include_once('includes/footer.php') ?>

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
<script src="js/simplyCountdown.js"></script>
<!-- Main -->
<script src="js/main.js"></script>
</body>
</html>
