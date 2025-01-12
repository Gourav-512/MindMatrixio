<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('db_connection.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="../css/log-sign.css">
</head>
<body>
<header>
    <?php include('log-sign.php'); ?>
</header>
<div class="auth-container">
    <div class="auth-card signup-card">
        <h2>Create Your Account</h2>
        <p>Sign up to access our services</p>
        <form method="POST" action="signup.php">
            <div class="form-group">
                <input type="text" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Sign Up</button>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
    </div>
</div>
<footer>
    <?php include('footer.php'); ?>
</footer>
</body>
</html>
