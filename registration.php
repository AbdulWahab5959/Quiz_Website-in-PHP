<?php
require_once('includes/db_connect.php');
include_once('includes/logincheck.php');

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $role = $_POST['role'];

    if (!empty($name) && !empty($email) && !empty($password) && !empty($cpassword) && !empty($role)) {
        if ($password === $cpassword) {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Check if the email already exists
            $sql_check_email = "SELECT * FROM users WHERE email = '$email'";
            $result_check_email = mysqli_query($conn, $sql_check_email);
            if (mysqli_num_rows($result_check_email) > 0) {
                echo "<script>
                        Swal.fire('Error','Email already exists. Please use a different email.','error')
                        </script>";
            } else {
                // Insert data into the users table
                $sql_insert_user = "INSERT INTO users (name, email, password, role) 
                                    VALUES ('$name', '$email', '$hashed_password', '$role')";
                if (mysqli_query($conn, $sql_insert_user)) {
                    echo "<script>
                            Swal.fire({
                                title: 'Success',
                                text: 'Registered successfully',
                                icon: 'success'
                            }).then(function() {
                                window.location = 'login.php';
                            });
                            </script>";
                            header("location: login.php");
                            
                    exit;
                } else {
                    echo "<script>
                            Swal.fire('Error','Error occurred while registering user','error')
                            </script>";
                }
            }
        } else {
            echo "<script>
                    Swal.fire('Error','Passwords do not match','error')
                    </script>";
        }
    } else {
        echo "<script>
                Swal.fire('Error','Please fill in all required fields','error')
                </script>";
    }
    mysqli_close($conn);
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
            <h3 class="text-center">REGISTRATION FORM</h3>
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
        <input type="password" name="cpassword" id="password" class="form-control" placeholder="Enter your password">
    </div>
    <div class="form-group">
        <label for="role"  >Select Role:</label>
        <select id="role" name="role" class="form-control">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <input type="submit" name="register" value="Register" class="btn btn-primary">
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

