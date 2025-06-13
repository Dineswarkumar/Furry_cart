<?php
session_start();
require_once 'db.php';

// Fetch the user's recent orders
$customer_id = $_SESSION['user_id'] ?? null;
$recent_orders = [];

if ($customer_id) {
    $stmt = $pdo->prepare("SELECT o.id, o.Status, o.Quantity, p.Name, p.Price 
                          FROM orders o
                          JOIN products p ON o.product_id = p.ID
                          WHERE o.customer_id = ?
                          ORDER BY o.id DESC
                          LIMIT 10");
    $stmt->execute([$customer_id]);
    $recent_orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <!-- Your existing styles -->
</head>
<body>
    <!-- Your header/navigation -->

    <section id="confirmation">
        <h1>Order Confirmation</h1>
        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="message">
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>
        
        <h2>Your Recent Orders</h2>
        <?php if (!empty($recent_orders)): ?>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recent_orders as $order): ?>
                        <tr>
                            <td><?php echo substr($order['id'], 0, 8); ?></td>
                            <td><?php echo htmlspecialchars($order['Name']); ?></td>
                            <td><?php echo $order['Quantity']; ?></td>
                            <td>$<?php echo number_format($order['Price'], 2); ?></td>
                            <td><?php echo $order['Status']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>
        
        <div class="actions">
            <a href="products.php" class="continue-shopping">Continue Shopping</a>
            <a href="profile.php" class="view-profile">View Your Profile</a>
        </div>
    </section>
</body>
</html>