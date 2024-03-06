<?php
 include_once('includes/db_connect.php'); 
 include_once('includes/logincheck.php'); 
error_reporting(E_ALL);
ini_set('display_errors', 1);
$score=0;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Answer'])) {
    // Serialize the form data containing selected options
    $formData = serialize($_POST);

    // Display all the form data
    foreach ($_POST as $key => $value) {
        if(strpos($key, 'question_') !== false) {
            // Extract question ID from the key
            $questionId = str_replace('question_', '', $key);
            $query_questions = "SELECT CorrectAnswer FROM questions where QuestionID= '$questionId' ";
            $result_questions = mysqli_query($conn, $query_questions);
            while ($row = mysqli_fetch_assoc($result_questions)) {
                $correctAnswers = $row['CorrectAnswer'];
            }
            if($correctAnswers==$value){
                $score+=10;
            }
            // Output question ID and selected option ID
            
        }
    }
    

} 
?>
<!DOCTYPE HTML>

<head>
    <?php include_once('includes/header.php') ?>
</head>
<style>
    .result {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    margin: 3% auto;
}

.card {
    width: 50%; 
    height: 40%;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

</style>
<body>
    <?php include_once('includes/navbar.php');
    $quizName = $_SESSION['quizName'];
    $query = "SELECT * FROM quizzes where title='$quizName'";
    $result = mysqli_query($conn, $query);
    
    // Check if query was successful
    if($result) {
        // Fetch data and populate the HTML
        $row = mysqli_fetch_assoc($result);
        $totalQuestions = $row['NumberOfQuestions'];
        $Title = $row['title'];
        $Quiz_id = $row['QuizID'];
    }
    ?>
    <div class="result">
    <div class="card">
        <div class="card-body">
            <div class="final-result">
                <h1 class="card-title text-center">The Quiz is Over</h1>
                <div class="solved-ques-no text-center">You Solved <?php echo $totalQuestions; ?> questions of <?php echo $Title; ?></div>
                <div class="display-final-score text-center ">Your Final Score is: <h3><?php echo $score; ?></h3></div>
            </div>
        </div>
    </div>
</div>
<?php
$user_id=$_SESSION['user_id'];
$email = $_SESSION['email'];
$dateTaken = date("Y-m-d"); // Current date in YYYY-MM-DD format
$quiz_result = "INSERT INTO users_quiz ( email, quiz_name, score, `date`) 
VALUES ( '$email', '$Title', '$score', '$dateTaken')";

if (mysqli_query($conn, $quiz_result)) {

}
else{
    echo "Error: " . $quiz_result . "<br>" . $conn->error;
}
?>

    
    
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
