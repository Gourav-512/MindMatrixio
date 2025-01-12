<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Services</title>
    <!-- <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/animations.css"> -->
    <link rel="stylesheet" href="../css/services.css">
   
</head>
<body>
    <header>
        <?php 
        include('header.php');
         ?>
    </header>
   
    <div class="container animate__animated animate__fadeInUp">
        <h1>MindMatrix.io - AI Services</h1>
        <h2>Explore Our AI Tools</h2>
        <p>Start exploring our advanced AI-powered tools to enhance your experience.</p>

        <div class="service-cards">
            <div class="service-card animate__animated animate__zoomIn">
                <h3>AI Chatbot</h3>
                <p>Interact with our intelligent chatbot powered by AI.</p>
                <a href="chatbot.php" ><button>Use Tool</button></a>
            </div>
            <div class="service-card animate__animated animate__zoomIn">
                <h3>AI Tool 2</h3>
                <p>Discover the capabilities of AI tool 2</p>
                <button>Use Tool</button>
            </div>
            <div class="service-card animate__animated animate__zoomIn">
                <h3>AI Tool 3</h3>
                <p>Unlock the potential of AI tool 3</p>
                <button>Use Tool</button>
            </div>
            <div class="service-card animate__animated animate__zoomIn">
                <h3>AI Tool 4</h3>
                <p>Unlock the potential of AI tool 4</p>
                <button>Use Tool</button>
            </div>
            <div class="service-card animate__animated animate__zoomIn">
                <h3>AI Tool 5</h3>
                <p>Unlock the potential of AI tool 5</p>
                <button>Use Tool</button>
            </div>
            <div class="service-card animate__animated animate__zoomIn">
                <h3>AI Tool 6</h3>
                <p>Unlock the potential of AI tool 6</p>
                <button>Use Tool</button>
            </div>
            <div class="service-card animate__animated animate__zoomIn">
                <h3>AI Tool 6</h3>
                <p>Unlock the potential of AI tool 7</p>
                <button>Use Tool</button>
            </div>
            <div class="service-card animate__animated animate__zoomIn">
                <h3>AI Tool 6</h3>
                <p>Unlock the potential of AI tool 8</p>
                <button>Use Tool</button>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
