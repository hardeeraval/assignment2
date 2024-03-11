<?php
include_once 'db_connection.php';

function createProduct($description, $image, $pricing, $shipping_cost) {
    global $conn;
    $sql = "INSERT INTO Product (description, image, pricing, shipping_cost) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdd", $description, $image, $pricing, $shipping_cost);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function getProduct($product_id) {
    global $conn;
    $sql = "SELECT * FROM Product WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    return $product;
}

function updateProduct($product_id, $description, $image, $pricing, $shipping_cost) {
    global $conn;
    $sql = "UPDATE Product SET description = ?, image = ?, pricing = ?, shipping_cost = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssddi", $description, $image, $pricing, $shipping_cost, $product_id);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function deleteProduct($product_id) {
    global $conn;
    $sql = "DELETE FROM Product WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
?>
