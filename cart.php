<?php
include_once 'db_connection.php';

function addToCart($user_id, $product_id, $quantity) {
    global $conn;
    $sql = "INSERT INTO Cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $user_id, $product_id, $quantity);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function getCartItems($user_id) {
    global $conn;
    $sql = "SELECT * FROM Cart WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cart_items = $result->fetch_all(MYSQLI_ASSOC);
    return $cart_items;
}

function updateCartItem($cart_id, $quantity) {
    global $conn;
    $sql = "UPDATE Cart SET quantity = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $quantity, $cart_id);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function removeCartItem($cart_id) {
    global $conn;
    $sql = "DELETE FROM Cart WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cart_id);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
?>
