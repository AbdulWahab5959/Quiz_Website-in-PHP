<?php include_once('includes/db_connect.php'); ?>
<?php include_once('includes/logincheck.php'); ?>
<!DOCTYPE HTML>
<html>

<head>
    <?php include_once('includes/header.php') ?>

</head>
<style>
    ::placeholder {
        font-size: 14px;
    }

    table {
        border-collapse: collapse;
        width: 50%;
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
            <h3 class="text-center">Current Users</h3>
            <table>
                        <thead>
                            <tr>
                                <th>user_id</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM users";
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
                                        echo "<td>" . $row['user_id'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['role'] . "</td>";
                                        echo "<td><a href= 'delete_user.php?id=" . $row['user_id'] . "' class='btn btn-danger p-2'>Delete</a> | <a href='update_user.php?id=" . $row['user_id'] . "' class='btn btn-info p-2'>Update</a></td>";

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
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
    <script src="js/google_map.js"></script>
    <!-- Count Down -->
    <script src="js/simplyCountdown.js"></script>
    <!-- Main -->
    <script src="js/main.js"></script>
</body>

</html>