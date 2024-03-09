<?php
require_once('includes/db_connect.php');
include_once('includes/logincheck.php');

// Initialize variables
$option_id = $_GET['id'];
$questionID = '';
$optionText = '';
$options_name = '';

// Retrieve option data from the database
$sql = "SELECT * FROM options WHERE OptionID ='$option_id'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Fetch option data
    $row = $result->fetch_assoc();
    $questionID = $row['QuestionID'];
    $optionText = $row['OptionText'];
    $options_name = $row['options_name'];
} else {
    echo "Error: Option not found.";
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Option_Update'])) {
    // Retrieve form data
    $questionID = $_POST['QuestionID'];
    $optionText = $_POST['OptionText'];
    $options_name = $_POST['options_name'];

    // Update the option information
    $sql_update = "UPDATE options SET QuestionID='$questionID', OptionText='$optionText', options_name='$options_name' WHERE OptionID='$option_id'";

    if ($conn->query($sql_update) === TRUE) {
        echo "<script>alert('Option information updated successfully.');</script>";
        header("Location: option.php?id=" . $questionID);
        exit();
    } else {
        echo "Error updating option: " . $conn->error;
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
            <h3 class="text-center">Update Options Form</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="QuestionID">Question ID:</label>
                    <input type="text" name="QuestionID" id="QuestionID" value="<?php echo $questionID ?>" class="form-control" placeholder="Enter question ID">
                </div>
                <div class="form-group">
                    <label for="OptionText">Option Text:</label>
                    <input type="text" name="OptionText" id="OptionText" value="<?php echo $optionText ?>" class="form-control" placeholder="Enter option text">
                </div>
                <div class="form-group">
                    <label for="options_name">Options Name:</label>
                    <input type="text" name="options_name" id="options_name" min="1" max="4" value="<?php echo $options_name ?>" class="form-control" placeholder="Enter options name">
                </div>
                <input type="submit" name="Option_Update" value="Update Option" class="btn btn-primary">
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