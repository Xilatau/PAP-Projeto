<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "xilakicks";

// Create connection
$conn = NEW Mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>