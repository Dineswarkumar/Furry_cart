<?php
/*
 * This is a simple router file to direct traffic to the correct PHP logic files
 * You can rename this to 'ppp.php' and 'cart.php' if you prefer to maintain
 * your current URL structure
 */

// Define a mapping of page requests to their handlers
$routes = [
    'products' => 'products_logic.php',
    'cart' => 'cart_logic.php'
];

// Get the requested page from the URL
$request = $_GET['page'] ?? 'products';

// Check if the requested page has a defined handler
if (isset($routes[$request])) {
    include $routes[$request];
} else {
    // If no handler is defined, redirect to the products page
    header('Location: index.php?page=products');
    exit;
}
?>