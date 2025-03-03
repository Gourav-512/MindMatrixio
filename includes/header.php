<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <link rel="stylesheet" href="../assets/css/header.css"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindMatrix.io</title>
    <script src="assets/js/script.js" defer></script>

    <link rel="stylesheet" href="../assets/css/header.css">

<style>
        /* Global Styles */
/* Global Styles */
body {
    font-family: 'Poppins', Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #0f0c29; /* Dark gradient background */
    color: white;
}

/* Header Styles */
header {
    background: linear-gradient(135deg, #1a1a2e, #16213e, #0f3460); /* Dark blue gradient */
    padding: 15px 0;
    position: sticky;
    top: 0;
    z-index: 1000;
    transition: all 0.3s ease-in-out;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
}

/* Navbar */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
    max-width: 1200px;
    margin: 0 auto;
}

/* Logo Section */
.logo {
    display: flex;
    align-items: center;
}

.logo img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 10px;
    animation: floatLogo 3s ease-in-out infinite;
}

.logo a {
    font-size: 1.8rem;
    font-weight: bold;
    text-decoration: none;
    color: white;
    transition: transform 0.3s ease-in-out;
    font-family: 'Poppins', sans-serif;
}

.logo a:hover {
    transform: scale(1.1);
    text-shadow: 0px 0px 15px rgba(255, 255, 255, 0.8);
}

/* Navigation Links */
.nav-links {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
}

.nav-links li {
    margin: 0 15px;
}

.nav-links a {
    text-decoration: none;
    font-size: 1rem;
    color: white;
    font-weight: bold;
    padding: 10px 15px;
    border-radius: 8px;
    transition: all 0.3s ease-in-out;
    position: relative;
}

.nav-links a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    background: #e94560; /* Vibrant pink */
    bottom: 0;
    left: 0;
    transition: width 0.3s ease-in-out;
}

.nav-links a:hover::after {
    width: 100%;
}

.nav-links a:hover {
    color: #e94560; /* Vibrant pink */
    background: rgba(255, 255, 255, 0.1);
}

/* Authentication Buttons */
.auth-buttons {
    display: flex;
    align-items: center;
}

.auth-buttons .btn {
    text-decoration: none;
    background-color: #e94560; /* Vibrant pink */
    color: white;
    padding: 8px 15px;
    margin: 0 5px;
    border-radius: 5px;
    transition: all 0.3s ease-in-out;
    font-weight: bold;
}

.auth-buttons .btn:hover {
    background-color: #ff6b81; /* Lighter pink */
    box-shadow: 0px 0px 15px rgba(233, 69, 96, 0.8);
    transform: translateY(-2px);
}

/* Logout Button */
.auth-buttons .logout {
    background-color: #d32f2f; /* Dark red */
}

.auth-buttons .logout:hover {
    background-color: #ff5252; /* Lighter red */
    box-shadow: 0px 0px 15px rgba(255, 82, 82, 0.8);
}

/* Logo Animation */
@keyframes floatLogo {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .navbar {
        flex-direction: column;
        align-items: flex-start;
    }

    .nav-links {
        flex-direction: column;
        width: 100%;
    }

    .nav-links li {
        margin: 10px 0;
    }

    .auth-buttons {
        margin-top: 10px;
    }
}
    </style> 

</head>
<body>

<header>
    <nav class="navbar">
        <div class="logo">
            <img src="assets/images/logo.jpg" alt="Logo">
            <a href="dashboard.php">MindMatrix.io</a>
        </div>
        <ul class="nav-links">
            <li><a href="dashboard.php" class="btn">Dashboard</a></li>
            <!-- <li><a href="index.php">Home</a></li> -->
            <li><a href="about.php">About Us</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <div class="auth-buttons">
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="btn logout">Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn">Login</a>
                <a href="register.php" class="btn">Sign Up</a>
            <?php endif; ?>
        </div>
    </nav>
</header>

<main>
