<?php
require_once('includes/db_connect.php');
include_once('includes/logincheck.php');

// Check if question ID is provided in URL
if (isset($_GET['id'])) {
    $questionID = $_GET['id'];

    // Fetch current values of the question from the database
    $sql_select_question = "SELECT Quiz_ID, QuestionText, CorrectAnswer FROM questions WHERE QuestionID = ?";
    $stmt_select_question = $conn->prepare($sql_select_question);

    // Check if prepare() succeeded
    if ($stmt_select_question) {
        // Bind parameter
        $stmt_select_question->bind_param("i", $questionID);

        // Execute the prepared statement
        if ($stmt_select_question->execute()) {
            // Bind result variables
            $stmt_select_question->bind_result($quizID, $questionText, $correctAnswer);

            // Fetch values
            $stmt_select_question->fetch();

            // Close statement
            $stmt_select_question->close();
        } else {
            echo "Error executing statement: " . $stmt_select_question->error;
        }
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    // Check if form is submitted for updating question
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Question_Update'])) {
        // Retrieve form data
        $questionText = $_POST['QuestionText'];
        $correctAnswer = $_POST['CorrectAnswer'];

        // Update the question in the database
        $sql_update_question = "UPDATE questions SET QuestionText = ?, CorrectAnswer = ? WHERE QuestionID = ?";
        $stmt_update_question = $conn->prepare($sql_update_question);

        // Check if prepare() succeeded
        if ($stmt_update_question) {
            // Bind parameters
            $stmt_update_question->bind_param("ssi", $questionText, $correctAnswer, $questionID);

            // Execute the prepared statement
            if ($stmt_update_question->execute()) {
                echo "<script>alert('Question updated successfully.');</script>";
                header("Location: questions.php?id=".$quizID);
                exit();
            } else {
                echo "Error updating record: " . $stmt_update_question->error;
            }
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }
} else {
    // If question ID is not provided in URL
    echo "Error: Question ID not provided.";
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
            <h3 class="text-center">Update Question</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="Quiz_ID">Quiz ID:</label>
                    <input type="text" name="Quiz_ID" id="Quiz_ID" class="form-control" value="<?php echo htmlspecialchars($quizID); ?>" placeholder="Enter quiz ID" readonly>
                </div>
                <div class="form-group">
                    <label for="QuestionText">Question Text:</label>
                    <textarea name="QuestionText" id="QuestionText" class="form-control" placeholder="Enter question text"><?php echo htmlspecialchars($questionText); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="CorrectAnswer">Correct Answer:</label>
                    <input type="text" name="CorrectAnswer" id="CorrectAnswer" class="form-control" value="<?php echo htmlspecialchars($correctAnswer); ?>" placeholder="Enter correct answer">
                </div>
                <!-- End of New Fields -->
                <input type="submit" name="Question_Update" value="Update Question" class="btn btn-primary">
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
