<?php
// session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Text Summarizer - MindMatrix.io</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h2>Text Summarizer</h2>
    <form method="POST">
        <textarea name="text" placeholder="Paste text here..." required></textarea>
        <button type="submit">Summarize</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST["text"];
        echo "<p><b>Original:</b> $text</p>";
        echo "<p><b>Summary:</b> AI Summary Coming Soon...</p>";
    }
    ?>

    <br>
    <a href="../dashboard.php">Back to Dashboard</a>
</body>
</html>
