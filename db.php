<?php
$host = "mysql.railway.internal"; // MYSQLHOST
$dbname = "railway"; // MYSQLDATABASE
$username = "root"; // MYSQLUSER
$password = "rKfNzrLnmlYjwyObHAsBlyLsSVLqMOvP";
$port = 3306; // MYSQLPORT

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Database Connected Successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
