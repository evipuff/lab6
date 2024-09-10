<?php
session_start();
require 'products.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if product_id is set
if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);
    
    // Check if product_id is valid
    foreach ($products as $product) {
        if ($product['id'] == $product_id) {
            // Add product to cart
            $_SESSION['cart'][] = $product;
            break;
        }
    }
}

header('Location: cart.php');
exit();