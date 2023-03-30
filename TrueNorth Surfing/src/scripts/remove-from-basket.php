<?php
session_start();
if (isset($_POST["product_id"])) {
    $productId = intval($_POST["product_id"]);
    if (isset($_SESSION["basket"])) {
        $key = array_search($productId, $_SESSION["basket"]);
        if ($key !== false) {
            unset($_SESSION["basket"][$key]);
            echo "Product with ID " . $productId . " removed from basket.";
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
