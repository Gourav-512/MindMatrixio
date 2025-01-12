<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('db_connection.php');

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            header("Location: services.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No user found with this email.";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/log-sign.css">
</head>
<body>
<header>
    <?php include('log-sign.php'); ?>
</header>
<div class="auth-container">
    <div class="auth-card login-card">
        <h2>Welcome Back</h2>
        <p>Please login to continue</p>
        <form method="POST" action="login.php">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Login</button>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </form>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
    </div>
</div>
<footer>
    <?php include('footer.php'); ?>
</footer>
</body>
</html>
