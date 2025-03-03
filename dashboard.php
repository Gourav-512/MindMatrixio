<?php
include 'auth.php';
include 'db.php';

$user_id = $_SESSION['user_id'];
$query = "SELECT name FROM users WHERE id='$user_id'";
$result = $conn->query($query);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>

<body>
    <!-- Background Animation -->
    <div class="background-animation">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>

    <!-- Dashboard Content -->
    <div class="dashboard-container">
        <h1>Welcome, <?php echo $user['name']; ?>! 👋</h1>

        <!-- Cartoon Greeting -->
        <div class="cartoon-greeting">
            
            <p>✨ "Every great idea starts with a small step. Let's explore AI together!" ✨</p>
        </div>

        <!-- Navigation Cards -->
        <div class="nav-cards">
            <div class="card" onclick="window.location.href='services.php'">
                <i class="fas fa-robot"></i>
                <h3>Explore AI Services</h3>
                <p>Discover powerful AI tools for your projects.</p>
            </div>
            <div class="card" onclick="window.location.href='about.php'">
                <i class="fas fa-users"></i>
                <h3>About Us</h3>
                <p>Learn more about our mission and team.</p>
            </div>
            <div class="card" onclick="window.location.href='contact.php'">
                <i class="fas fa-envelope"></i>
                <h3>Contact</h3>
                <p>Get in touch with us for support or inquiries.</p>
            </div>
            <div class="card" onclick="window.location.href='logout.php'">
                <i class="fas fa-sign-out-alt"></i>
                <h3>Logout</h3>
                <p>Securely log out of your account.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>Made with ❤️ by MindMatrix.io | © 2023</p>
    </footer>
</body>

</html>