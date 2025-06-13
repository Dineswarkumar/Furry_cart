<?php
session_start();
require_once 'db.php';

// Calculate cart total
$cart_total = 0;
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cart_total += $item['price'] * $item['quantity'];
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Your Cart</title>
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
            <!-- Cart Icon -->
            <div class="cart">
                <a href="ppcart.php" class="cart-icon" id="cart-btn"> 
                    <img src="cart.jpg" alt="Cart">
                </a>
            </div>
        </div>
    </nav>
    <section id="cart">
        <h1>Your Shopping Cart</h1>

        <?php if (empty($_SESSION['cart'])): ?>
            <div class="empty-cart">
                <p>Your cart is empty.</p>
                <a href="products.php">Continue Shopping</a>
            </div>
        <?php else: ?>
            <form method="post" action="update_cart.php">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $product_id => $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['name']); ?></td>
                                <td>₹<?php echo number_format($item['price'], 2); ?></td>
                                <td>
                                    <input type="number" name="quantity[<?php echo $product_id; ?>]"
                                        value="<?php echo $item['quantity']; ?>" min="1" class="quantity-input">
                                </td>
                                <td>₹<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                                <td>
                                    <a href="update_cart.php?action=remove&id=<?php echo $product_id; ?>" class="remove-btn">Remove</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" align="right"><strong>Total:</strong></td>
                            <td><strong>₹<?php echo number_format($cart_total, 2); ?></strong></td>
                            <td></td>
                        </tr>
                    </tfoot>

                </table>

                <div class="cart-actions">
                    <a href="products.php">Continue Shopping</a>
                    <button type="submit" name="update_cart">Update Cart</button>
                    <a href="checkout.php">Proceed to Checkout</a>
                </div>
            </form>
        <?php endif; ?>
    </section>
</body>

</html>