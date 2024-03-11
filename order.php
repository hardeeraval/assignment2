<?php
include_once 'db_connection.php';

function createOrder($user_id, $product_id, $quantity, $total_cost) {
    global $conn;
    $sql = "INSERT INTO `Order` (user_id, product_id, quantity, total_cost) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiid", $user_id, $product_id, $quantity, $total_cost);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Implement getOrder() function if needed
function getOrder($order_id) {
    global $conn;
    $sql = "SELECT * FROM `Order` WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();
    return $order;
}

function updateOrder($order_id, $quantity, $total_cost) {
    global $conn;
    $sql = "UPDATE `Order` SET quantity = ?, total_cost = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("idi", $quantity, $total_cost, $order_id);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function deleteOrder($order_id) {
    global $conn;
    $sql = "DELETE FROM `Order` WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_id);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
?>
