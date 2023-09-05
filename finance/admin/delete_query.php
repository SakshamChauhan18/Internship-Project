<?php
if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['comment_id']) && isset($_GET['section'])) {
  $comment_id = intval($_GET['comment_id']);
  $section = $_GET['section'];

  $mysqli = new mysqli('localhost', 'root', '', 'finance');

  // Function to delete comment and its nested replies from the specified table
  function deleteCommentAndReplies($section, $comment_id) {
    global $mysqli;

    $sql = "SELECT id FROM $section WHERE parent_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $comment_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      deleteCommentAndReplies($section, $row['id']);
    }
    $stmt->close();

    $sql = "DELETE FROM $section WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $comment_id);
    $stmt->execute();
    $stmt->close();
  }

  deleteCommentAndReplies($section, $comment_id);

  http_response_code(204); // Success, no content to return
} else {
  http_response_code(400); // Bad request
}
?>