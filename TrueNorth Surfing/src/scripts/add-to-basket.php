<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST["product_id"])) {
    $productId = intval($_POST["product_id"]);
    if (!isset($_SESSION["basket"])) {
        $_SESSION["basket"] = array();
    }
    $quantity = isset($_POST["quantity"]) ? intval($_POST["quantity"]) : 1;
    $_SESSION["basket"][$productId] = $quantity;

    echo count($_SESSION["basket"]);
}
?>
