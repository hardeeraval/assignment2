<?php
include_once 'db_connection.php';

function createUser($email, $password, $username, $purchase_history, $shipping_address) {
    global $conn;
    $sql = "INSERT INTO User (email, password, username, purchase_history, shipping_address) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $email, $password, $username, $purchase_history, $shipping_address);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function getUserByEmail($email) {
    global $conn;
    $sql = "SELECT * FROM User WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    return $user;
}

function updateUser($user_id, $email, $password, $username, $purchase_history, $shipping_address) {
    global $conn;
    $sql = "UPDATE User SET email = ?, password = ?, username = ?, purchase_history = ?, shipping_address = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $email, $password, $username, $purchase_history, $shipping_address, $user_id);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function deleteUser($user_id) {
    global $conn;
    $sql = "DELETE FROM User WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
?>
