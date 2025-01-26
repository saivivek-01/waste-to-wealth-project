<?php
include 'functions.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?></h1>
    <nav>
        <a href="index.html">Home</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<div class="container">
    <section class="section">
        <h2>Your Waste Listings</h2>
        <!-- Display User Listings -->
        <?php
        $listings = getUserListings($user['id']);
        if ($listings) {
            echo "<ul>";
            foreach ($listings as $listing) {
                echo "<li>" . htmlspecialchars($listing['description']) . " - " . htmlspecialchars($listing['status']) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No listings found. Add your first one!</p>";
        }
        ?>
        <button class="button" onclick="location.href='add-listing.php'">Add Listing</button>
    </section>
</div>

<footer>
    <p>&copy; 2024 Waste-to-Wealth Marketplace. All Rights Reserved.</p>
</footer>
</body>
</html>
