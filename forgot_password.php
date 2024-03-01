<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('includes/db_connect.php');
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



if (isset($_POST['forget'])) {
    $email = $_POST['email'];

    if (!empty($email)) {
        $sql = "SELECT * FROM `users` WHERE email='{$email}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $userRow = mysqli_fetch_assoc($result);

            // Generate a random password reset token
            $tokenLength = 32;
            $randomToken = bin2hex(random_bytes($tokenLength / 2));
            $_SESSION['token'] = $randomToken;


            // Update the token in the database for the specific user
            $sqlUpdateToken = "UPDATE `users` SET `token` = '$randomToken' WHERE email='$email'";

            if (mysqli_query($conn, $sqlUpdateToken)) {
                // Create a new PHPMailer instance
                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP(); // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com'; // Specify your mail server
                    $mail->SMTPAuth = true; // Enable SMTP authentication
                    $mail->Username = 'usmanhassan16903@gmail.com'; // SMTP username
                    $mail->Password = 'jgirxanztzrxteyu'; // SMTP password
                    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587; // TCP port to connect to

                    // Recipients
                    $mail->setFrom('usmanhassan16903@gmail.com');
                    $mail->addAddress($email);

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = "Password Reset";
                                    // Email body with a link to the reset password page
                    $resetLink = 'http://localhost/Quiz_Website-in-PHP/reset_password.php?token= ' . $randomToken . '';
                    $mail->Body = '<a href="' . $resetLink . '">Click here to reset your password</a>';

                    // Send the email
                    $mail->send();

                    echo "<script>alert('Email Sent to Your Account')</script>";
                    echo "<script>window.location.href='login.php'</script>";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "Error updating token: " . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Account with this Email does not exist')</script>";
        }
    } else {
        echo "<script>alert('Fill up fields First !')</script>";
    }

    mysqli_close($conn);
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
            <h3 class="text-center">Forget Pasword FORM</h3>
            <form action="" method="post">

                <div class="form-group">
                    <label for="email">Your Email:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address">
                </div>
               <input type="submit" name="forget" value="Forget Password" class="btn btn-primary">
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
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
    <script src="js/google_map.js"></script>
    <!-- Count Down -->
    <script src="js/simplyCountdown.js"></script>
    <!-- Main -->
    <script src="js/main.js"></script>
</body>

</html>