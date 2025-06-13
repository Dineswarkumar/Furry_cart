<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_cart'])) {
    // Update quantities
    foreach ($_POST['quantity'] as $product_id => $quantity) {
        if (isset($_SESSION['cart'][$product_id])) {
            // Update the quantity in the session cart array
            $_SESSION['cart'][$product_id]['quantity'] = max(1, (int)$quantity);
        }
    }
    $_SESSION['message'] = "Cart updated successfully!";
} elseif (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['id'])) {
    // Remove item
    $product_id = $_GET['id'];
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
        $_SESSION['message'] = "Product removed from cart!";
    }
}

header("Location: ppcart.php");
exit();
?>