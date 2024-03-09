<?php
require_once('includes/db_connect.php');
include_once('includes/logincheck.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Question_Add'])) {
    // Retrieve form data
    $quizID = $_POST['Quiz_ID'];
    $questionText = $_POST['QuestionText'];
    $correctAnswer = $_POST['CorrectAnswer'];

    // Insert data into the questions table
    $sql_insert_question = "INSERT INTO questions (Quiz_ID, QuestionText, CorrectAnswer) 
                            VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql_insert_question);

    // Check if prepare() succeeded
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("iss", $quizID, $questionText, $correctAnswer);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "<script>alert('Question added successfully.');</script>";
            header("Location: questions.php");
            exit();
        } else {
            echo "Error inserting record: " . $stmt->error;
        }
    } else {
        echo "Error: Unable to prepare SQL statement: " . $conn->error;
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
            <h3 class="text-center">Add New Question</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="Quiz_ID">Quiz ID:</label>
                    <input type="text" name="Quiz_ID" id="Quiz_ID" class="form-control" value="<?php echo htmlspecialchars($_GET['id']); ?>" placeholder="Enter quiz ID" readonly>
                </div>
                <div class="form-group">
                    <label for="QuestionText">Question Text:</label>
                    <textarea name="QuestionText" id="QuestionText" class="form-control" placeholder="Enter question text"></textarea>
                </div>
                <div class="form-group">
                    <label for="CorrectAnswer">Correct Answer:</label>
                    <input type="text" name="CorrectAnswer" id="CorrectAnswer" class="form-control" placeholder="Enter correct answer">
                </div>
                <!-- End of New Fields -->
                <input type="submit" name="Question_Add" value="Add Question" class="btn btn-primary">
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
    <!-- Count Down -->
    <script src="js/simplyCountdown.js"></script>
    <!-- Main -->
    <script src="js/main.js"></script>
</body>
</html>
