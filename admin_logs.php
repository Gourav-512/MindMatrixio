<?php
// session_start();
include 'db.php';
include 'includes/header.php';

// Check if the user is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo "<h1>Access Denied!</h1>";
    exit();
}

// Fetch logs from the database
$query = "SELECT usage_logs.id, users.name, usage_logs.action, usage_logs.details, usage_logs.log_time 
          FROM usage_logs 
          JOIN users ON usage_logs.user_id = users.id 
          ORDER BY usage_logs.log_time DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Logs</title>
    <link rel="stylesheet" href="assets/css/admin_logs.css">
</head>
<body>

    <div class="admin-logs-container">
        <h1>System Activity Logs</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Action</th>
                <th>Details</th>
                <th>Timestamp</th>
            </tr>
            <?php while ($log = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $log['id']; ?></td>
                <td><?php echo $log['name']; ?></td>
                <td><?php echo $log['action']; ?></td>
                <td><?php echo $log['details'] ?: 'N/A'; ?></td>
                <td><?php echo $log['log_time']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

</body>
</html>
