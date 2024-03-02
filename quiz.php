<?php include_once('includes/db_connect.php') ?>
<?php include_once('includes/logincheck.php') ?>

<!DOCTYPE HTML>
<head>
	<?php include_once('includes/header.php') ?>
</head>
<body>
		<?php include_once('includes/navbar.php') ?>

	
	<aside id="fh5co-hero">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url(images/img_bg_4.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center slider-text">
			   				<div class="slider-text-inner">
			   					<h1 class="heading-section">Our Quizes</h1>
								   <div id="form-box">
								   <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Quiz'])) {
    // Check if the 'language' field is set in the POST data
    if(isset($_POST['language'])) {
        // Retrieve the selected quiz name
        $quizName = $_POST['language'];

        // Redirect to quiz_page.php with the selected quiz name as a parameter
        header("Location: quiz_page.php?quizName=" . urlencode($quizName));
        exit(); // Ensure script execution stops after redirection
    } else {
        echo "Quiz name not selected.";
    }
}
?>

<form method="post" action="quiz_page.php">
    <select id="language" name="language">
        <option value="HTML" selected="selected">HTML</option>
        <option value="CSS">CSS</option>
        <option value="JS">Javascript</option>
        <option value="PY">Python</option>
        <option value="C">C language</option>
    </select>
    <input type="submit" name="Quiz" value="Take Quiz" class="btn btn-info">
</form>

            </div>    
        </div>
							</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>
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

