<?php
session_start();
require_once 'db.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch products
$products = $pdo->query("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);

// Base URL configuration
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="pp.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        .product { 
            border: 1px solid #ddd; 
            border-radius: 15px;
            padding: 15px; 
            margin: 10px; 
            text-align: center;
            width: 270px;
            float: left;
        }
        .product-image {
            height: 200px;
            width: 100%;
            object-fit: contain;
            border: 1px solid #eee;
        }
        .image-container {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f5f5;
            margin-bottom: 10px;
        }
        .quantity-input {
    width: 60px;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    text-align: center;
}
    </style>
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
            <li><a href="https://mail.google.com/mail/u/0/#inbox?compose=new"><img id="google" src="google-icon.png" alt="Twitter"></a></li>
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
            <!-- Profile Icon -->
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
<section class="products">
    <h2>Our Products</h2>
    <div style="overflow: hidden;">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <div class="image-container">
                    <?php
                    $image_path = str_replace(
                        'C:\\xampp\\htdocs\\', 
                        '/', 
                        $product['Image']
                    );
                    $image_path = str_replace('\\', '/', $image_path);

                    if (!empty($image_path)) {
                        $image_path = trim($image_path);
                        
                        if (strpos($image_path, '/') !== 0 && 
                            strpos($image_path, 'http') !== 0) {
                            $image_path = '/' . $image_path;
                        }
                        
                        echo '<img class="product-image" src="' . htmlspecialchars($image_path) . '" 
                             alt="' . htmlspecialchars($product['Name']) . '"
                             onerror="this.onerror=null; this.src=\'' . $base_url . ltrim($image_path, '/') . '\'; 
                                     this.onerror=function(){this.parentNode.innerHTML=\'<div>Image not found</div>\'};">';
                    } else {
                        echo '<div>No image available</div>';
                    }
                    ?>
                </div>
                <h3><?= htmlspecialchars($product['Name']) ?></h3>
                <p>₹<?= number_format($product['Price'], 2) ?></p>
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?= $product['ID'] ?>">
                    <input type="number" class="quantity-input" name="quantity" value="1" min="1">
                    <button type="submit" id="addToCart">Add to Cart</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('#addToCart').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('form');
            const formData = new FormData(form);
            
            fetch('add_to_cart.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert('Product added to cart!');
                // Update cart icon count if you have one
                const cartCount = document.querySelector('.cart-count');
                if (cartCount) {
                    cartCount.textContent = parseInt(cartCount.textContent) + 1;
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
</script>
</body>
</html>