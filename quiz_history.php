<?php include_once('includes/db_connect.php') ?>
<?php include_once('includes/logincheck.php') ?>


<!DOCTYPE HTML>
<html>
<head>
	<?php include_once('includes/header.php') ?>
</head>
<body>
		<?php include_once('includes/navbar.php') ?>


	<div id="fh5co-pricing" class="fh5co-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>User Quiz History</h2>
				<p>
The user quiz history feature provides a comprehensive overview of the quizzes a user has attempted, offering valuable insights into their learning journey. By accessing their quiz history, users can track their progress, review past performance, and identify areas for improvement. </p>	
				</div>
			</div>
			<div class="row">
				<div class="pricing pricing--rabten">
					<div class="col-md-6 animate-box">
						<div class="pricing__item">
							<div class="wrap-price">
								<!-- <div class="icon icon-store"></div> -->
	                     <h3 class="pricing__title">User Score</h3>
	                     <!-- <p class="pricing__sentence">Up to 5 users</p> -->
							</div>
                     <div class="pricing__price">
                        <span class="pricing__anim pricing__anim--1">
								<span class="pricing__currency">$</span>79
                        </span>
                        <span class="pricing__anim pricing__anim--2">
								<span class="pricing__period">per year</span>
                        </span>
                     </div>
                     <div class="wrap-price">
                     	<ul class="pricing__feature-list">
	                        <li class="pricing__feature">One Year Standard Access</li>
	                        <li class="pricing__feature">Limited Courses</li>
	                        <li class="pricing__feature">300+ Lessons</li>
	                        <li class="pricing__feature">Random Supporter</li>
	                        <li class="pricing__feature">View Only Ebook</li>
	                        <li class="pricing__feature">Standard Tutorials</li>
	                         <li class="pricing__feature">Unlimited Registered User</li>
	                     </ul>
                     </div>
                 </div>
					</div>
					<div class="col-md-6 animate-box">
                  <div class="pricing__item">
                  	<div class="wrap-price">
                  		<!-- <div class="icon icon-home2"></div> -->
	                     <h3 class="pricing__title"> All-Time Highest Scores</h3>
	                     <!-- <p class="pricing__sentence">Unlimited users</p> -->
							</div>
                     <div class="pricing__price">
                        <span class="pricing__anim pricing__anim--1">
								<span class="pricing__currency">$</span>499
                        </span>
                        <span class="pricing__anim pricing__anim--2">
								<span class="pricing__period">per year</span>
                        </span>
                     </div>
                     <div class="wrap-price">
                     	<ul class="pricing__feature-list">
	                        <li class="pricing__feature">Life Time Access</li>
	                        <li class="pricing__feature">Unlimited All Courses</li>
	                        <li class="pricing__feature">7000+ Lessons &amp; Growing</li>
	                        <li class="pricing__feature">Free Supporter</li>
	                        <li class="pricing__feature">Free Ebook Downloads</li>
	                        <li class="pricing__feature">Premium Tutorials</li>
	                         <li class="pricing__feature">Unlimited Registered User</li>
	                     </ul>
	                     </div>
                  </div>
               </div>
            </div>
			</div>
		</div>
	</div>

	<div id="fh5co-register" style="background-image: url(images/img_bg_2.jpg);">
		<div class="overlay"></div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 animate-box">
				<div class="date-counter text-center">
					<h2>Get 400 of Online Courses for Free</h2>
					<h3>By Mike Smith</h3>
					<div class="simply-countdown simply-countdown-one"></div>
					<p><strong>Limited Offer, Hurry Up!</strong></p>
					<p><a href="#" class="btn btn-primary btn-lg btn-reg">Register Now!</a></p>
				</div>
			</div>
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

