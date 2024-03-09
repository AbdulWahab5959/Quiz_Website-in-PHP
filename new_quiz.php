<!DOCTYPE HTML>
<html>
<head>
    <?php include_once('includes/header.php') ?>
</head>
<?php
require_once('includes/db_connect.php');
include_once('includes/logincheck.php');
if (isset($_POST['Quiz_Add'])) {
    $quizTitle = $_POST['Quiz_Title'];
    $numberOfQuestions = $_POST['Numberof_Question'];
    $CreatedBy=$_SESSION['user_id'];
    echo $CreatedBy;
    echo $quizTitle;
    echo $numberOfQuestions;
    if (!empty($quizTitle) && !empty($numberOfQuestions)) {
        // Check if the quiz ID or title already exists in the database
        $sql_check_quiz = "SELECT * FROM quizzes WHERE title = '$quizTitle'";
        $result_check_quiz = mysqli_query($conn, $sql_check_quiz);
        if (mysqli_num_rows($result_check_quiz) > 0) {
            echo "<script>
                    Toastify({
                        text: 'Quiz ID or Title already exists. Please use a different one.',
                        duration: 5000
                    }).showToast();
                    </script>";
        } else {
            // Insert data into the quizzes table
            $sql_insert_quiz = "INSERT INTO quizzes (title, NumberOfQuestions, CreatedBy) 
                                VALUES ('$quizTitle', '$numberOfQuestions', '$CreatedBy' )";
            if (mysqli_query($conn, $sql_insert_quiz)) {
                echo "<script>
                        Toastify({
                            text: 'Quiz added successfully',
                            duration: 3000
                        }).showToast();
                        setTimeout(function() {
                            window.location = 'quiz_administration.php';
                        }, 5000);
                        </script>";
                exit;
            } else {
                 echo "Error updating record: " . $conn->error;
            }
        }
    } else {
        echo "<script>
                Toastify({
                    text: 'Please fill in all required fields',
                    duration: 5000
                }).showToast();
                </script>";
    }
   }
?>
<body>
<?php include_once('includes/navbar.php') ?>

<div class="form">
    <div class="card">
        <h3 class="text-center">NEW QUIZ FORM</h3>
        <form action="" method="post">
    <div class="form-group">
        <label for="Quiz_Title">Quiz Title:</label>
        <input type="text" name="Quiz_Title" id="Quiz_Title" class="form-control" placeholder="Enter quiz title">
    </div>
    <div class="form-group">
        <label for="Numberof_Question">Number of Questions:</label>
        <input type="number" name="Numberof_Question" id="Numberof_Question" class="form-control" placeholder="Enter number of questions">
    </div> 
    <input type="submit" name="Quiz_Add" value="Quiz_Add" class="btn btn-primary">
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
<script src="js/simplyCountdown.js"></script>
<!-- Main -->
<script src="js/main.js"></script>
</body>
</html>
