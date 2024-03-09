<?php
require_once('includes/db_connect.php');
include_once('includes/logincheck.php');

// Initialize variables
$Quiz_id = $_GET['id'];
$CreatedBy ='';
$quizTitle ='';
$numberOfQuestions='';

// Retrieve user data from the database
$sql = "SELECT * FROM quizzes WHERE QuizID ='$Quiz_id'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Fetch user data
    $row = $result->fetch_assoc();
    $quizTitle = $row['title'];
    $numberOfQuestions = $row['NumberOfQuestions'];
} else {
    echo "Error: Quiz not found.";
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Quiz_Update'])) {
    // Retrieve form data
    $quizTitle = $_POST['Quiz_Title'];
    $numberOfQuestions = $_POST['Numberof_Question'];
    $CreatedBy= $_SESSION['user_id'];


    $sql_login = "UPDATE quizzes SET   `title`='$quizTitle', NumberofQuestions='$numberOfQuestions' WHERE QuizID='$Quiz_id'";

    if ($conn->query($sql_login) === TRUE) {
        echo "<script>alert('Quiz information updated successfully.');</script>";
        header("Location: quiz_administration.php");
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
            <h3 class="text-center">NEW QUIZ FORM</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="Quiz_Title">Quiz Title:</label>
                    <input type="text" name="Quiz_Title" id="Quiz_Title" value="<?php echo $quizTitle?>" class="form-control" placeholder="Enter quiz title">
                </div>
                <div class="form-group">
                    <label for="Numberof_Question">Number of Questions:</label>
                    <input type="number" name="Numberof_Question" id="Numberof_Question" value="<?php echo $numberOfQuestions?>" class="form-control" placeholder="Enter number of questions">
                </div>
                <input type="submit" name="Quiz_Update" value="Quiz_Update" class="btn btn-primary">
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
    <!-- Count Down -->
    <script src="js/simplyCountdown.js"></script>
    <!-- Main -->
    <script src="js/main.js"></script>
</body>

</html>