<?php
session_start();
session_destroy();
header("Location: login.php");
logAction($conn, $_SESSION['user_id'], "User Logged Out");
exit();
?>
