<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST["product_id"])) {
    $productId = intval($_POST["product_id"]);
    if (!isset($_SESSION["basket"])) {
        $_SESSION["basket"] = array();
    }
    if (!in_array($productId, $_SESSION["basket"])) {
        $_SESSION["basket"][] = $productId;
    }
    echo count($_SESSION["basket"]);
}
?>
