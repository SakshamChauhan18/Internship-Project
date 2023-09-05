<?php
// edit.php

// Include the connection.php file to use the existing database connection
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['comment_id']) && isset($_POST['edited_comment']) && isset($_POST['section'])) {
    $comment_id = intval($_POST['comment_id']);
    $edited_comment = $_POST['edited_comment'];
    $section = $_POST['section']; // Get the table_name parameter

    // Use prepared statements to prevent SQL injection
    $stmt = $connection->prepare("UPDATE $section SET comment = ? WHERE id = ?");
    $stmt->bind_param('si', $edited_comment, $comment_id);
    $stmt->execute();
    $stmt->close();

    // Return a success response to the client
    http_response_code(200);
    exit();
  }
}

// If the request is not a POST request or the required parameters are not provided, return an error response
http_response_code(400);
exit();
?>