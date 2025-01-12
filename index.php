<?php
header("Location: php/login.php");
exit();


// If user is already logged in, redirect to services page
if (isset($_SESSION['user_id'])) {
    header("Location: services.php");
    exit();
}
?>