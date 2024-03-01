<!-- <?php
// Check if the user is not logged in and tries to access any page other than the login page or registration page
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    if (basename($_SERVER['PHP_SELF']) !== 'login.php' && basename($_SERVER['PHP_SELF']) !== 'registration.php') {
        // Redirect to the login page
        header("location: login.php");
        exit;
    }
}

// If user is logged in and session is set, and tries to access the login page or registration page, redirect to the home page
if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
    if (basename($_SERVER['PHP_SELF']) === 'login.php' || basename($_SERVER['PHP_SELF']) === 'registration.php') {
        // Redirect to the home page or any other page where logged-in users should be redirected
        header("location: index.php");
        exit;
    }
}
?> -->
