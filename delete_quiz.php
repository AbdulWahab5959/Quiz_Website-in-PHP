<?php
include('includes/db_connect.php');
include_once('includes/logincheck.php');
// Check if appointment ID is provided in URL
if (isset($_GET['id'])) {
    $users_id = $_GET['id'];

    // Prepare SQL statement to delete appointment
    $sql = "DELETE FROM quizzes WHERE QuizID = ?";

    $stmt = $conn->prepare($sql);

    // Check if prepare() succeeded
    if ($stmt) {
        // Bind appointment ID parameter
        $stmt->bind_param("i", $users_id);

        // Execute SQL statement
        if ($stmt->execute()) {
            // Appointment deleted successfully
            echo "<script>alert('user deleted successfully.');</script>";
            // Redirect back to the page where appointments are listed
            header("Location: quiz_administration.php");
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
    echo "Error: Users ID not provided.";
}
?>