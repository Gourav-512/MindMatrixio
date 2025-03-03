<?php
include 'auth.php';
include 'db.php';

//admin@mindmatrix.io pass:- admin123

// Ensure only admins can access
if ($_SESSION['role'] !== 'admin') {
    echo "<h1>Access Denied!</h1>";
    exit();
}

// Fetch all users

$users = $conn->query("SELECT id, name, email, role, created_at FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>

    <div class="admin-container">
        <h1>Admin Panel</h1>
        <p>Manage Users & System Logs</p>
        <h3><a href="admin_logs.php">📊 View System Logs</a></h3>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Joined</th>
                <th>Action</th>
            </tr>
            <?php while ($user = $users->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo ucfirst($user['role']); ?></td>
                <td><?php echo $user['created_at']; ?></td>
                <td>
                    <?php if ($user['role'] !== 'admin') { ?>
                        <a href="php/delete_user.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure?')">🗑 Delete</a>
                    <?php } else { echo "Admin"; } ?>
                </td>
            </tr>
            <?php } ?>
        </table>

        <br>
       
        <a href="logout.php">🚪 Logout</a>
    </div>

</body>
</html>
