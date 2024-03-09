<?php
include('includes/db_connect.php');
include_once('includes/logincheck.php');
// Check if question ID is provided in URL
if (isset($_GET['id'])) {
    $question_id = $_GET['id'];

    // Prepare SQL statement to delete options associated with the question
    $sql_delete_options = "DELETE FROM options WHERE QuestionID = ?";
    $stmt_delete_options = $conn->prepare($sql_delete_options);

    // Check if prepare() succeeded
    if ($stmt_delete_options) {
        // Bind question ID parameter
        $stmt_delete_options->bind_param("i", $question_id);

        // Execute SQL statement to delete options
        if ($stmt_delete_options->execute()) {
            // Prepare SQL statement to delete the question
            $sql_delete_question = "DELETE FROM questions WHERE QuestionID = ?";
            $stmt_delete_question = $conn->prepare($sql_delete_question);

            // Check if prepare() succeeded
            if ($stmt_delete_question) {
                // Bind question ID parameter
                $stmt_delete_question->bind_param("i", $question_id);

                // Execute SQL statement to delete question
                if ($stmt_delete_question->execute()) {
                    // Question and associated options deleted successfully
                    echo "<script>alert('Question and associated options deleted successfully.');</script>";
                    // Redirect back to the page where questions are listed
                    header("Location: questions.php");
                    exit();
                } else {
                    // Error occurred while deleting question
                    echo "Error: " . $stmt_delete_question->error;
                }
            } else {
                // Error occurred while preparing SQL statement to delete question
                echo "Error: Unable to prepare SQL statement: " . $conn->error;
            }
        } else {
            // Error occurred while deleting options
            echo "Error: " . $stmt_delete_options->error;
        }
    } else {
        // Error occurred while preparing SQL statement to delete options
        echo "Error: Unable to prepare SQL statement: " . $conn->error;
    }
} else {
    // If question ID is not provided in URL
    echo "Error: Question ID not provided.";
}
?>
