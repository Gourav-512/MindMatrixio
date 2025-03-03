<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["role"] = $user["role"];

        // Call logging function after setting session user_id
        logAction($conn, $_SESSION['user_id'], "User Logged In");

        if ($user["role"] == "admin") {
            header("Location: admin.php");
        } else {
            header("Location: dashboard.php");
        }
        exit();
    } else {
        echo "Invalid login credentials!";
    }
}
?>

<form method="POST">
    <link rel="stylesheet" href="assets/css/inandout.css">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button> 
    <button><a href="register.php">Sign Up</a></button>
</form>
