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
						The user quiz history feature provides a comprehensive overview of the quizzes a user has attempted, offering valuable insights into their learning journey. By accessing their quiz history, users can track their progress, review past performance, and identify areas for improvement.
					</p>
				</div>
			</div>
			<div class="row">
				<div class="pricing pricing--rabten">
					<div class="col-md-6 animate-box">
						<div class="pricing__item">
							<div class="wrap-price">
								<h3 class="pricing__title">User Score</h3>
							</div>
							<div class="wrap-price">
								<span class="pricing__anim pricing__anim--1">
									<b>	Score</b>  | <b>Email </b> | <b>Date</b>
							</span>
							</div>
							<?php
							// Fetch user's personal record
							$query_personal_record = "SELECT email, score, `date` FROM users_quiz WHERE email = ? ORDER BY score DESC LIMIT 10";
							$stmt_personal_record = mysqli_prepare($conn, $query_personal_record);
							mysqli_stmt_bind_param($stmt_personal_record, "s", $_SESSION['email']);
							mysqli_stmt_execute($stmt_personal_record);
							$result_personal_record = mysqli_stmt_get_result($stmt_personal_record);

							// Display user's personal record
							while ($row_personal_record = mysqli_fetch_assoc($result_personal_record)) {
							?>
								<div class="wrap-price">
									<span class="pricing__anim pricing__anim--1">
									<b>	<?php echo $row_personal_record['score']; ?></b> | <b><?php echo $row_personal_record['email']; ?> </b> | <b><?php echo $row_personal_record['date']; ?></b>
									</span>
								</div>
							<?php
							}
							?>
						</div>
					</div>

					<div class="col-md-6 animate-box">
    <div class="pricing__item">
        <div class="wrap-price">
            <h3 class="pricing__title">All-Time Highest Scores</h3>
        </div>
        <div class="wrap-price">
            <span class="pricing__anim pricing__anim--1">
                <b>Score</b> | <b>Email</b> | <b>Date</b>
            </span>
        </div>
        <?php
        // Fetch top 10 records including user's personal record
        $query_top_records = "SELECT email, score, `date` FROM users_quiz ORDER BY score DESC LIMIT 10";
        $stmt_top_records = mysqli_prepare($conn, $query_top_records);
        mysqli_stmt_execute($stmt_top_records);
        $result_top_records = mysqli_stmt_get_result($stmt_top_records);

        // Display top 10 records
        while ($row_top_records = mysqli_fetch_assoc($result_top_records)) {
        ?>
            <div class="wrap-price">
                <span class="pricing__anim pricing__anim--1">
                    <?php echo $row_top_records['score']; ?> | <?php echo $row_top_records['email']; ?> | <?php echo $row_top_records['date']; ?>
                </span>
            </div>
        <?php
        }
        ?>
    </div>
</div>

				</div>
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
</body>

</html>