<?php
session_start();
if (isset($_POST["product_id"])) {
    $productId = intval($_POST["product_id"]);
    if (isset($_SESSION["basket"])) {
        if (array_key_exists($productId, $_SESSION["basket"])) {
            unset($_SESSION["basket"][$productId]);
            echo "All quantities of the product with ID " . $productId . " removed from basket.";
        } else {
            echo "Product with ID " . $productId . " not found in basket.";
        }
    } else {
        echo "Basket not found in session.";
    }
} else {
    echo "No product ID provided.";
}
?>
