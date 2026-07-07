<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mindmatrix"; // Replace with your database name
// Create connection .check same Name as Your Localhost

$conn = new mysqli($servername, $username, $password, $dbname);

// C.heck connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
