<?php include_once('includes/db_connect.php'); ?>
<?php include_once('includes/logincheck.php'); ?>
<!DOCTYPE HTML>
<html>

<head>
    <?php include_once('includes/header.php') ;?>

</head>
<style>
    ::placeholder {
        font-size: 14px;
    }

    table {
        border-collapse: collapse;
        width: 60%;
        margin: auto;
        margin-bottom: 2.5rem;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
<body>
    <?php include_once('includes/navbar.php') ?>
            <h3 class="text-center">Quiz List</h3>
            <div class="text-center"> 
                <a id="newQuizButton" class=" btn bg-success btn-success " href="new_quiz.php">Create New Quiz</a>
            </div>
            <table>
                        <thead>
                            <tr>
                                <th>Quiz_id</th>
                                <th>Title</th>
                                <th>NumberOfQuestions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM quizzes";
                            $result = $conn->query($sql);

                            if (!$result) {
                                // Display error if query fails
                                echo "Error: " . $conn->error;
                            } else {
                                // Check if any appointments are found
                                if ($result->num_rows > 0) {
                                    // Display appointments
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr class='text-center' >";
                                        echo "<td>" . $row['QuizID'] . "</td>";
                                        echo "<td>" . $row['title'] . "</td>";
                                        echo "<td>" . $row['NumberOfQuestions'] . "</td>";
                                        echo "<td><a href= 'delete_quiz.php?id=" . $row['QuizID'] . "' class='btn btn-danger p-2'>Delete</a> | <a href='update_quiz.php?id=" . $row['QuizID'] . "' class='btn btn-info p-2'>Update</a> <a href='questions.php?id=" . $row['QuizID'] . "' class='btn btn-success p-2'>Show Questions</a></td>";

                                        echo "</tr>";
                                    }
                                } else {
                                    // Display message if no appointments found
                                    echo "<tr><td colspan='4'>No User found.</td></tr>";
                                }
                            }

                            ?>
                        </tbody>
                    </table>

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