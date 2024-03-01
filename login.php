<?php
require_once('includes/db_connect.php');
include_once('includes/logincheck.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        // Check if the user exists in the database
        $sql_check_user = "SELECT * FROM users WHERE email = '$email'";
        $result_check_user = mysqli_query($conn, $sql_check_user);

        if (mysqli_num_rows($result_check_user) > 0) {
            $row = mysqli_fetch_assoc($result_check_user);
            // Verify password
            if (password_verify($password, $row['password'])) {
                // Password is correct, set session variables or perform any other action you want
                $_SESSION['user_id'] = $row['id']; // You might need to adjust this based on your database schema
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];

                // Redirect to dashboard or any other page
                header("location: index.php");
                exit;
            } else {
                echo "<script>alert('Incorrect email or password')</script>";
            }
        } else {
            echo "<script>alert('User not found')</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields')</script>";
    }
}
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
            <h3 class="text-center">LOGIN FORM</h3>
<form action="" method="post" >
    
    <div class="form-group">
        <label for="email">Your Email:</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address">
    </div>
    <div class="form-group">
        <label for="password">Your Password:</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
    </div>
	<a href="forgot_password.php" class="pt-4">Forgot Password?</a>
    
    <input type="submit"  name="login" value="Login" class="btn btn-primary">
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
	<script>
    var d = new Date(new Date().getTime() + 1000 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
	</script>
	</body>
</html>

