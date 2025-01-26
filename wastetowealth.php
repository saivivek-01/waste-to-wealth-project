<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waste-to-Wealth Marketplace</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Waste-to-Wealth Marketplace</h1>
        <p>Connecting businesses and individuals for a sustainable future</p>
    </header>

    <nav>
        <a href="#about">About</a>
        <a href="#how-it-works">How It Works</a>
        <a href="#marketplace">Marketplace</a>
        <a href="#contact">Contact</a>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
    </nav>

    <div class="container">
        <section id="about" class="section">
            <h2>About Us</h2>
            <p>Our platform transforms waste into valuable resources by connecting businesses and individuals with upcycling and recycling solutions. Together, we can build a sustainable future and promote a circular economy.</p>
        </section>

        <section id="how-it-works" class="section">
            <h2>How It Works</h2>
            <ol>
                <li><strong>List Waste:</strong> Businesses and individuals list their waste materials with details like type and quantity.</li>
                <li><strong>Match Solutions:</strong> Our platform connects waste generators with verified upcycling/recycling partners.</li>
                <li><strong>Sell Products:</strong> Upcycled products are showcased in our marketplace for sale.</li>
                <li><strong>Track Impact:</strong> Users can monitor their environmental contributions through dashboards.</li>
            </ol>
        </section>

        <section id="marketplace" class="section">
            <h2>Marketplace</h2>
            <p>Explore a wide range of upcycled and recycled products. From furniture to fashion, every product supports sustainability.</p>
            <button class="button">Visit Marketplace</button>
            <?php
$search = $_GET['search'] ?? '';

$stmt = $conn->prepare("SELECT * FROM listings WHERE title LIKE ?");
$searchTerm = "%$search%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$listings = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>
<form method="GET">
    <input type="text" name="search" placeholder="Search listings..." value="<?= htmlspecialchars($search) ?>">
    <button type="submit">Search</button>
</form>
<table>
    <?php foreach ($listings as $listing): ?>
    <tr>
        <td><?= htmlspecialchars($listing['title']) ?></td>
        <td><img src="<?= htmlspecialchars($listing['image_path']) ?>" alt="Image" width="50"></td>
    </tr>
    <?php endforeach; ?>
</table>

        </section>

        <section id="contact" class="section">
            <h2>Contact Us</h2>
            <p>Have questions or want to partner with us? Reach out to our team.</p>
            <form action="/contact" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>
                <label for="message">Message:</label><br>
                <textarea id="message" name="message" rows="4" required></textarea><br>
                <button type="submit" class="button">Send Message</button>
            </form>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 Waste-to-Wealth Marketplace. All Rights Reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
