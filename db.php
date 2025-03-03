<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'mindmatrix_db';

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function logAction($conn, $user_id, $action, $details = null)
{
    $stmt = $conn->prepare("INSERT INTO usage_logs (user_id, action, details) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $action, $details);
    $stmt->execute();
    $stmt->close();
}
