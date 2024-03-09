<?php
require_once('includes/db_connect.php');
include_once('includes/logincheck.php');
$questionID = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Option_Add'])) {
    // Retrieve form data
    $questionID = $_POST['QuestionID'];
    $optionText = $_POST['OptionText'];
    $optionsName = $_POST['options_name'];

    // Insert data into the options table
    $sql_insert_option = "INSERT INTO options (QuestionID, OptionText, options_name) 
                          VALUES ('$questionID', '$optionText', '$optionsName')";

    if (mysqli_query($conn, $sql_insert_option)) {
        echo "<script>alert('Option added successfully.');</script>";
        
        header("Location: option.php?id=".$questionID);
    } else {
        echo "Error inserting record: " . $conn->error;
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
        <h3 class="text-center">Add Options Form </h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="QuestionID">Question ID:</label>
                <input type="text" name="QuestionID" id="QuestionID" value="<?php echo $questionID;?>" class="form-control" placeholder="Enter question ID">
            </div>
            <div class="form-group">
                <label for="OptionText">Option Text:</label>
                <input type="text" name="OptionText" id="OptionText"  class="form-control" placeholder="Enter option text">
            </div>
            <div class="form-group">
            <label for="options_name">Options Name:</label>
            <input type="number" name="options_name" id="options_name" class="form-control" placeholder="Enter options name" min="1" max="4">
            </div>

            <!-- End of New Fields -->
            <input type="submit" name="Option_Add" value="Option_Add" class="btn btn-primary">
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