<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();
  $servername = "localhost";
  $username = "root";
  $dbpassword = ""; // Changed the variable name to avoid conflict
  $dbname = "pak_quiz";

  // Create connection
  $conn = new mysqli($servername, $username, $dbpassword, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

?>
