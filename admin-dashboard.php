// admin-dashboard.php
<?php
session_start();
include 'functions.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    die("Access Denied");
}

$users = getAllUsers();
$listings = getAllListings();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Admin Dashboard</h1>
</header>
<main>
    <h2>Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['role']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <h2>Listings</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Title</th>
            <th>Status</th>
        </tr>
        <?php foreach ($listings as $listing): ?>
        <tr>
            <td><?= htmlspecialchars($listing['id']) ?></td>
            <td><?= htmlspecialchars($listing['user_id']) ?></td>
            <td><?= htmlspecialchars($listing['title']) ?></td>
            <td><?= htmlspecialchars($listing['status']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>
</body>
</html>
