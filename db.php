<?php
$cleardb_url = parse_url(getenv("MYSQL_URL"));

$host = $cleardb_url["host"];
$user = $cleardb_url["user"];
$password = $cleardb_url["pass"];
$database = substr($cleardb_url["path"], 1);

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database Connected Successfully!";
}
?>
