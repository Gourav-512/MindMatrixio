<<<<<<< HEAD
<?php
header("Location: php/login.php");
exit();


// If user is already logged in, redirect to services page
if (isset($_SESSION['user_id'])) {
    header("Location: services.php");
    exit();
}
?>
=======
<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindMatrix.io - AI Innovation Hub</title>
    <link rel="stylesheet" type="text/css" href="assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Index Page - Professional Design */

/* Global Styles */
body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background: #0A192F; /* Deep navy background */
    color: #CCD6F6; /* Light gray text */
    line-height: 1.6;
}

/* Hero Section */
.hero {
    background: linear-gradient(145deg, #0A192F, #112240);
    padding: 100px 20px;
    text-align: center;
    color: #CCD6F6;
}

.hero-content h1 {
    font-size: 48px;
    margin-bottom: 20px;
    color: #64FFDA; /* Teal accent */
}

.hero-content p {
    font-size: 20px;
    max-width: 800px;
    margin: 0 auto 30px;
    color: #8892B0; /* Light gray text */
}

.btn-hero {
    padding: 12px 24px;
    background: #64FFDA;
    color: #0A192F;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s, color 0.3s;
}

.btn-hero:hover {
    background: #52D1B2;
    color: #0A192F;
}

/* Features Section */
.features {
    padding: 80px 20px;
    text-align: center;
}

.features h2 {
    font-size: 36px;
    margin-bottom: 40px;
    color: #64FFDA;
}

.feature-list {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}

.feature-card {
    background: #112240; /* Dark navy card background */
    color: #CCD6F6;
    border-radius: 12px;
    padding: 30px;
    width: 300px;
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 20px rgba(100, 255, 218, 0.3);
}

.feature-icon {
    font-size: 40px;
    color: #64FFDA;
    margin-bottom: 20px;
}

.feature-card h3 {
    font-size: 24px;
    margin-bottom: 15px;
}

.feature-card p {
    font-size: 16px;
    color: #8892B0;
    margin-bottom: 20px;
}

/* Call to Action Section */
.cta-section {
    background: linear-gradient(145deg, #112240, #0A192F);
    padding: 80px 20px;
    text-align: center;
}

.cta-content h2 {
    font-size: 36px;
    margin-bottom: 20px;
    color: #64FFDA;
}

.cta-content p {
    font-size: 18px;
    color: #8892B0;
    margin-bottom: 30px;
}

.btn-cta {
    padding: 12px 24px;
    background: #64FFDA;
    color: #0A192F;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s, color 0.3s;
}

.btn-cta:hover {
    background: #52D1B2;
    color: #0A192F;
}

.logo {
    text-align: center;
    margin: auto;
    width: 26%;
    padding: 10px;
}
.auth-buttons {
    margin: auto;
    width: 10%;
    padding: 10px;
}
    </style>

</head>
<body>

<header>
    <nav class="navbar">
        <div class="logo">
            <img src="assets/images/logo.jpg" alt="Logo">
            <a href="index.php">MindMatrix.io</a>
        </div>
    </nav>
</header>

    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to MindMatrix.io</h1>
            <p>Empowering AI-driven solutions for a smarter world</p>
            <a href="register.php" class="btn-hero">Explore Our AI Services</a>
            <div class="auth-buttons">
                <a href="login.php" class="btn">Login</a>
                <a href="register.php" class="btn">Sign Up</a>
        </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2>What We Offer</h2>
            <div class="feature-list">
                <!-- Feature 1 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h3>AI-Powered Tools</h3>
                    <p>Experience cutting-edge AI services like sentiment analysis, AI code generation, and more.</p>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-link"></i>
                    </div>
                    <h3>Seamless Integration</h3>
                    <p>Connect AI capabilities with your business applications effortlessly.</p>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <h3>User-Friendly Interface</h3>
                    <p>Intuitive design ensures a seamless experience for everyone.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="cta-content">
            <h2>Start Your AI Journey Today!</h2>
            <p>Sign up now and revolutionize the way you work with AI.</p>
            <a href="register.php" class="btn-cta">Get Started</a>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
>>>>>>> 9b3d206 (Initial Commit - MindMatrix.io Project)
