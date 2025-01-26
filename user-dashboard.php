<?php
include 'functions.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];

$listings = getUserListings($user['id']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js for graphs -->
</head>
<body>
<header>
    <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?></h1>
    <nav>
        <a href="wastetowealth.html">Home</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<div class="container">
    <section class="section">
        <h2>Your Listings</h2>
        <?php if ($listings): ?>
            <ul>
                <?php foreach ($listings as $listing): ?>
                    <li>
                        <?php echo htmlspecialchars($listing['description']); ?> - 
                        <strong><?php echo htmlspecialchars($listing['status']); ?></strong>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No listings found. Start listing your waste today!</p>
        <?php endif; ?>
        <button class="button" onclick="location.href='add-listing.php'">Add Listing</button>
    </section>

    <section class="section">
        <h2>Your Environmental Impact</h2>
        <canvas id="impactChart"></canvas>
        <script>
            const ctx = document.getElementById('impactChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Plastic', 'Metal', 'Glass', 'Other'],
                    datasets: [{
                        label: 'Waste Recycled (kg)',
                        data: [<?php echo('Great contribution'); ?>], 
                        backgroundColor: ['#4caf50', '#2196f3', '#ff9800', '#9c27b0']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'top' }
                    }
                }
            });
        </script>
    </section>
</div>

<footer>
    <p>&copy; 2024 Waste-to-Wealth Marketplace. All Rights Reserved.</p>
</footer>
</body>
</html>
