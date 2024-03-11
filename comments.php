<?php
include_once 'db_connection.php';

function addComment($product_id, $user_id, $rating, $image, $text) {
    global $conn;
    $sql = "INSERT INTO Comments (product_id, user_id, rating, image, text) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiss", $product_id, $user_id, $rating, $image, $text);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function getCommentsByProduct($product_id) {
    global $conn;
    $sql = "SELECT * FROM Comments WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $comments = $result->fetch_all(MYSQLI_ASSOC);
    return $comments;
}

function updateComment($comment_id, $rating, $text) {
    global $conn;
    $sql = "UPDATE Comments SET rating = ?, text = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isi", $rating, $text, $comment_id);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function deleteComment($comment_id) {
    global $conn;
    $sql = "DELETE FROM Comments WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $comment_id);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
?>
