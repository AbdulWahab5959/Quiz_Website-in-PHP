<?php
require_once('includes/db_connect.php');
include_once('includes/logincheck.php');

// Initialize variables
$user_id = $_GET['id'];
$name = '';
$email = '';
$phone = '';
$password = '';
$role = '';

    // Retrieve user data from the database
    $sql = "SELECT * FROM users WHERE user_id ='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Fetch user data
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $password = $row['password'];
        $role = $row['role'];
    } else {
        echo "Error: User not found.";
    }

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Note: You should encrypt this password before storing it in the database for security
    $role = $_POST['role'];
  

    $sql_login = "UPDATE users SET   `name`='$name', email='$email', 
     password='$password', role='$role' WHERE user_id='$user_id'";

    if ($conn->query($sql_login) === TRUE) {
        echo "<script>alert('User information updated successfully.');</script>";
        header("Location: user_administration.php");
        exit();
    } else {
        echo "Error: " . $sql_login . "<br>" . $conn->error;
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
            <h3 class="text-center">User Profile FORM</h3>
            <form action="" method="post">
    <div class="form-group">
        <label for="name">Your Name:</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" value="<?php echo $name; ?>">
    </div>
    <div class="form-group">
        <label for="email">Your Email:</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address" value="<?php echo $email; ?>">
    </div>
    <div class="form-group">
        <label for="password">Your Password:</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" value="<?php echo $password; ?>">
    </div>
    <div class="form-group">
        <label for="role">Select Role:</label>
        <select id="role" name="role" class="form-control">
            <option value="user" <?php if($role == 'user') echo 'selected'; ?>>User</option>
            <option value="admin" <?php if($role == 'admin') echo 'selected'; ?>>Admin</option>
        </select>
    </div>
    <input type="submit" name="register" value="Update Profile" class="btn btn-primary">
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