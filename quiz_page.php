<?php include_once('includes/db_connect.php') ?>
<?php include_once('includes/logincheck.php') ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Quiz'])) {
    // Check if the 'language' field is set in the POST data
    if(isset($_POST['language'])) {
        // Retrieve the selected quiz name
        $quizName = $_POST['language'];

        // Redirect to a temporary page using HTTP 303 status code
        header("HTTP/1.1 303 See Other");
        header("Location: quiz_page.php?quizName=" . urlencode($quizName));
        exit(); // Ensure script execution stops after redirection
    } else {
        echo "Quiz name not selected.";
    }
}
?>

<!DOCTYPE HTML>

<head>
    <?php include_once('includes/header.php') ?>
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f0f0f0;
    }

    .quiz-container {
        max-width: 70%;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        margin: auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .final-result {
        display: none;
        /* Hide final result section initially */
        text-align: center;
    }

    .options label {
        display: block;
    }

    .option-text {
        margin-left: 10px;
        /* Adjust the value as needed */
    }
</style>

<body>
    <?php include_once('includes/navbar.php');
    if(isset($_GET['quizName'])) {
    $_SESSION['quizName']= $_GET['quizName'];
    $quizName=$_SESSION['quizName'];
}

    $query = "SELECT * FROM quizzes where title='$quizName'";
    $result = mysqli_query($conn, $query);
    
    // Check if query was successful
    if($result) {
        // Fetch data and populate the HTML
        $row = mysqli_fetch_assoc($result);
        $totalQuestions = $row['NumberOfQuestions'];
        $questionTitle = $row['title'];
        $Quiz_id = $row['QuizID'];
    }
    ?>
    
    <div class="quiz-container">
        <div id="info">
        <div id="ques-left">Total Question: <?php echo $totalQuestions; ?></div>
        </div>
        <div id="ques-view">

        </div>

        <div class="question">
        <h1 class="text-center">Question of <?php echo $questionTitle; ?> Quiz: </h1>
        <form method="post" action="result.php">
    <?php
    $query_questions = "SELECT * FROM questions WHERE Quiz_ID='$Quiz_id'";
    $result_questions = mysqli_query($conn, $query_questions);

    // Displaying questions
    while ($row_question = mysqli_fetch_assoc($result_questions)) {
        $Question_Id = $row_question['QuestionID'];
        $Correct_Id = $row_question['CorrectAnswer'];
        echo '<h2>Question NO: ' . $row_question['QuestionID'] . '</h2>';
        echo '<h3>' . $row_question['QuestionText'] . '</h3>';

        // Fetching options for the current question
        $query_options = "SELECT * FROM options WHERE QuestionId = $Question_Id";
        $result_options = mysqli_query($conn, $query_options);

        // Displaying options
        echo '<div class="choice">';
        while ($row_option = mysqli_fetch_assoc($result_options)) {
            echo '<div class="options">';
            echo '<label>';
            echo '<input type="radio" name="question_' . $Question_Id . '" value="' . $row_option['options_name'] . '" id="opt' . $row_option['OptionText'] . '">';
            echo '<span class="option-text">' . $row_option['OptionText'] . '</span>';
            echo '</label>';
            echo '</div>';
        }
        echo '</div>';
    }
    ?> 
    <input type="submit" name="Answer" class="btn btn-success" value="Submit_Answer">
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