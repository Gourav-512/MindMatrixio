<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>AI Image Generator - MindMatrix.io</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h2>AI Image Generator</h2>
    <form method="POST">
        <input type="text" name="prompt" placeholder="Enter a description..." required>
        <button type="submit">Generate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $prompt = $_POST["prompt"];
        echo "<p><b>Prompt:</b> $prompt</p>";
        echo "<p><b>Generated Image:</b> AI Image Coming Soon...</p>";
    }
    ?>

    <br>
    <a href="../dashboard.php">Back to Dashboard</a>
</body>
</html>
