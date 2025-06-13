<?php
session_start();
require_once 'db.php';

// Check if cart is empty or user not logged in
if (empty($_SESSION['cart'])) {
    $_SESSION['error'] = "Your cart is empty!";
    header("Location: cart.php");
    exit();
}

if (!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = "You need to login first!";
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])) {
    try {
        $pdo->beginTransaction();
        $customer_id = $_SESSION['user_id'];
        
        // Process each item in cart as separate order
        foreach ($_SESSION['cart'] as $product_id => $item) {
            $order_id = uniqid(); 
            $quantity = $item['quantity'];
            $status = 'Pending'; 
            
            $stmt = $pdo->prepare("INSERT INTO orders 
                                  (id, product_id, customer_id, Status, Quantity) 
                                  VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$order_id, $product_id, $customer_id, $status, $quantity]);
        }
        
        $pdo->commit();
        
        unset($_SESSION['cart']);
        $_SESSION['message'] = "Order placed successfully!";
        header("Location: order_confirmation.php");
        exit();
        
    } catch (Exception $e) {
        $pdo->rollBack();
        $_SESSION['error'] = "Error processing your order: " . $e->getMessage();
        header("Location: cart.php");
        exit();
    }
}

header("Location: cart.php");
exit();
?>