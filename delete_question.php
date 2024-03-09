<?php
include('includes/db_connect.php');
include_once('includes/logincheck.php');
// Check if appointment ID is provided in URL
if (isset($_GET['id'])) {
    $question_id = $_GET['id'];

    // Prepare SQL statement to delete appointment
    $sql = "DELETE FROM questions WHERE QuestionID = ?";

    $stmt = $conn->prepare($sql);

    // Check if prepare() succeeded
    if ($stmt) {
        // Bind appointment ID parameter
        $stmt->bind_param("i", $question_id);

        // Execute SQL statement
        if ($stmt->execute()) {
            // Appointment deleted successfully
            echo "<script>alert('Question deleted successfully.');</script>";
            // Redirect back to the page where appointments are listed
            header("Location: questions.php");
            exit();
        } else {
            // Error occurred while deleting appointment
            echo "Error: " . $stmt->error;
        }
    } else {
        // Error occurred while preparing SQL statement
        echo "Error: Unable to prepare SQL statement: " . $conn->error;
    }
} else {
    // If appointment ID is not provided in URL
    echo "Error: Questions ID not provided.";
}
?>