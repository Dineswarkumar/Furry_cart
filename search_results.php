<?php
session_start();
require_once 'db.php';

// Get search term from form submission
$search_term = isset($_GET['search']) ? trim($_GET['search']) : '';

// Search products in database
$stmt = $pdo->prepare("SELECT * FROM products WHERE Name LIKE ? OR Description LIKE ?");
$stmt->execute(["%$search_term%", "%$search_term%"]);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results - FurryCart</title>
    <!-- Include your CSS files -->
     
    <link rel="stylesheet" href="pp.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>
        <div class="indexlogo">
            <img src="logo furrycart.jpg" alt="Furry Cart Logo" class="logo">
            <div class="indexlogo-text">
                <h1>FurryCart</h1>
                <p>Healthy Pet, Healthy Home</p>
            </div>
        </div>
        <form class="search" action="search_results.php" method="GET">
            <input type="text" placeholder="Search products..." name="search" required>
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <ul class="social-media">
            <li><a href="https://www.facebook.com/"><img id="facebook" src="facebook-icon.png" alt="Facebook"></a></li>
            <li><a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=CllgCJZXhMRsDJWCSSTTvFJWlgMmGmlJpcnFjbWLJDPmdXqHjfgDKkSBrKNMMQmhBnnkcCCRvBV"><img id="google" src="google-icon.png" alt="Twitter"></a></li>
            <li><a href="https://www.instagram.com/dinwark_2/"><img src="instagram-icon.png" alt="Instagram"></a></li>
        </ul>
    </header>
    <nav>
        <ul>
            <li><a href="pp.html">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="ppa.html">About</a></li>
            <li><a href="ppc.html">Contact</a></li>
        </ul>
        <div class="profile-cart-container">
            <div class="profile-dropdown">
                <a href="#" class="profile-icon">
                    <img src="profile.png" alt="Profile">
                </a>
                <ul class="dropdown-menu">
                    <li><a href="profile.html">View Profile</a></li>
                    <li><a href="settings.html">Settings</a></li>
                    <li><a href="login.html" id="logout-link" class="logout-btn">Logout</a></li>
                </ul>
            </div>
            <div class="cart">
                <a href="ppcart.php" class="cart-icon" id="cart-btn"> 
                    <img src="cart.jpg" alt="Cart">
                </a>
            </div>
        </div>
    </nav>
    <section id="search-results">
        <h2>Search Results for "<?php echo htmlspecialchars($search_term); ?>"</h2>
        
        <?php if (empty($products)): ?>
            <div class="no-results">
                <p>No products found matching your search.</p>
                <a href="products.php">Browse all products</a>
            </div>
        <?php else: ?>
            <div class="product-list">
                <?php foreach ($products as $product): ?>
                    <div class="product">
                        <div class="image-container">
                            <?php if (!empty($product['Image'])): ?>
                                <?php 
                                $image_path = str_replace(
                                    'C:\\xampp\\htdocs\\', 
                                    '/', 
                                    $product['Image']
                                );
                                $image_path = str_replace('\\', '/', $image_path);
                                ?>
                                <img src="<?php echo htmlspecialchars($image_path); ?>" 
                                     alt="<?php echo htmlspecialchars($product['Name']); ?>">
                            <?php else: ?>
                                <div class="no-image">No image available</div>
                            <?php endif; ?>
                        </div>
                        <h3><?php echo htmlspecialchars($product['Name']); ?></h3>
                        <p>₹<?php echo number_format($product['Price'], 2); ?></p>
                        <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?= $product['ID'] ?>">
                    <input type="number" class="quantity-input" name="quantity" value="1" min="1">
                    <button type="submit" id="addToCart">Add to Cart</button>
                    </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <!-- Your footer if you have one -->
</body>
</html>