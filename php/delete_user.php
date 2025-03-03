<?php
include '../auth.php';
include '../db.php';

// Ensure admin access
if ($_SESSION['role'] !== 'admin') {
    die("Unauthorized!");
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Prevent deleting admins
    $checkUser = $conn->query("SELECT role FROM users WHERE id='$user_id'");
    $user = $checkUser->fetch_assoc();
    
    if ($user['role'] === 'admin') {
        echo "You cannot delete an admin!";
        exit();
    }

    // Delete user
    $deleteQuery = "DELETE FROM users WHERE id='$user_id'";
    if ($conn->query($deleteQuery)) {
        echo "User deleted successfully!";
    } else {
        echo "Error deleting user!";
    }
}

header("Location: ../admin.php");
exit();
?>
