<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    
    // Validate quantity
    if ($quantity < 1) {
        $quantity = 1;
    }
    
    // Fetch product details
    $stmt = $pdo->prepare("SELECT * FROM products WHERE ID = ?");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($product) {
        // Initialize cart if not exists
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        // Add product to cart or update quantity
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = [
                'name' => $product['Name'],
                'price' => $product['Price'],
                'quantity' => $quantity
            ];
        }
        
        $_SESSION['message'] = "Product added to cart successfully!";
    } else {
        $_SESSION['error'] = "Product not found!";
    }
}

header("Location: products.php");
exit();
?>