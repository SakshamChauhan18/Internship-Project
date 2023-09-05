<?php include 'header.php'; ?>

  <h1>Queries and Expert Opinion</h1><br>
  <h2><?php $heading = $_GET['heading'];echo  $heading ;?></h2><br>
  <div class="card mb-3" style="max-width: 30rem; background-color:#fee4d2; border: 1px solid black;">
    <div class="card-header" style="color:white; background-color:coral;">
      <h5 class="card-title">Add a new query</h5>
    </div>
    <div class="card-body">
      <form method="post" action="">
        <div class="form-group">
          <input type="text" name="username" class="form-control" placeholder="Your Name and CPF Number" required>
        </div><br>
        <div class="form-group">
          <textarea name="comment" class="form-control" placeholder="Your query" required></textarea>
        </div><br>
        <input type="hidden" name="parent_id" value="0">
        <input type="hidden" name="indent" value="0"> <!-- Add an indent level to identify top-level comments -->
        <button type="submit" class="btn btn-primary">Post Query</button>
      </form>
    </div>
  </div>
  <br>
  <div class="card mb-3" style="max-width: 30rem; background-color:#fee4d2; border: 1px solid black;">
    <div class="card-header" style="color:white; background-color:coral;">
      <h5 class="card-title">Search for a query (or user)</h5>
    </div>
    <div class="card-body">
      <form method="get" action="">
        <!-- Add a hidden input field to include the 'section' value -->
        <input type="hidden" name="section" value="<?php echo $_GET['section']; ?>">
        <input type="hidden" name="heading" value="<?php echo $_GET['heading']; ?>">
        <div class="form-group">
          <input type="text" name="search_query" class="form-control" placeholder="Search Comments">
        </div><br>
        <button type="submit" class="btn btn-primary">Search</button>
      </form>
    </div>
  </div>
  <br>                
  <?php

    // Include the connection.php file to use the existing database connection
    require_once './admin/connection.php';
    $section = $_GET['section'];                  
    
    function printComments($parent_id = 0, $indent = 0, $parentCommentId = null, $isAdmin = false, $search_query = '', $search_condition = '', $offset = 0) {
      global $connection, $commentsPerPage, $section;
  
      $commentsPerPageLevel = $parent_id === 0 ? $commentsPerPage : PHP_INT_MAX;
  
      $sql = "SELECT * FROM $section WHERE parent_id = $parent_id $search_condition ORDER BY created_at DESC LIMIT $offset, $commentsPerPageLevel";
      $result = mysqli_query($connection, $sql);
  
      while ($row = mysqli_fetch_assoc($result)) {
        $comment_id = $row['id'];
        $username = $row['username'];
        $comment = $row['comment'];
        $created_at = $row['created_at'];
    
        // Determine the comment level
        $comment_level_class = 'comment-level-' . $indent;                      
  
          // Opening container div for each parent comment and its replies
          echo '<div id="comment-' . $comment_id . '" class="card comment-box parent-comment ' . $comment_level_class . '" style=style="border-radius: 5px; margin-left: 25px;">';

          // Card header
          echo '<div class="card-header">';
          if ($parent_id === 0) {
              // Display parent comment id and username in the card header
              echo '<i>Posted by : </i><b>' . $username . '</b>';
          } else {
              // Display username for replies and nested replies in a similar format
              echo '<i>Reply by : </i><b>' . $username . '</b>';
          }
          echo '</div>'; // Closing the card header

          // Card body
          echo '<div class="card-body">';
          // Display comment text and timestamp in the card body
          echo '<span class="comment-text">' . $comment . ' <br></span>(posted at ' . $created_at . ')<br>';                      

          echo '</div>'; // Closing the card body

          // Card footer
          echo '<div class="card-footer">';
          if ($isAdmin) {
            // Show the reply button for admin users
            echo '<button class="btn btn-sm btn-warning" onclick="showReplyForm(' . $comment_id . ', \'' . $username . '\', ' . $indent . '); return false;">Reply</button>';

            // Show the edit button for admin users
            echo '&nbsp;<button class="btn btn-sm btn-info" style="border: 1px sloid black" onclick="showEditForm(' . $comment_id . ', \'' . $comment . '\', ' . $indent . ', \'' . $section . '\'); return false;">Edit</button>';

            // Show the delete button for admin users
            echo '&nbsp;<button class="btn btn-sm btn-danger" onclick="deleteComment(' . $comment_id . ', \'' . $section . '\')">Delete</button>';
        } else {
            // Show the reply button for regular users
            echo '<button class="btn btn-sm btn-success" onclick="showReplyForm(' . $comment_id . ', \'' . $username . '\', ' . $indent . '); return false;" style="border: 1px solid black;">Reply</button>';
        }
          // Add the reply form container and edit form container as before
          echo '<div class="reply-container" id="replyForm-' . $comment_id . '"></div>';
          echo '<div id="editForm-' . $comment_id . '"></div>';
          echo '</div>'; // Closing the card footer

          // Recursively print replies
          printComments($comment_id, $indent + 1, $parent_id === 0 ? $comment_id : $parentCommentId, $isAdmin);

          echo '</div><br>'; // Closing the card container
      }
  
      mysqli_free_result($result);
      
    }             

    // Handle the form submission for posting comments and replies
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $section = $_GET['section'];
      if (isset($_POST['username']) && isset($_POST['comment']) && isset($_POST['parent_id'])) {
        $username = $_POST['username'];
        $comment = $_POST['comment'];
        $parent_id = intval($_POST['parent_id']);

        // Insert the new comment or reply into the database
        $stmt = $connection->prepare("INSERT INTO $section (parent_id, username, comment) VALUES (?, ?, ?)");
        $stmt->bind_param('iss', $parent_id, $username, $comment);

        // Check if the comment is posted by a regular user or an admin (for styling purposes)
        $is_admin = 0; // Change this value to 1 if it's an admin user
        $stmt->execute();
        $stmt->close();
        // Redirect to the same page to refresh and display the updated comments
        echo '<script type="text/javascript">
              alert("Query Posted Successfully ...");
              window.location.href = "./query.php?section='.$section.'&heading='.$heading.'";
              </script>';
      }
    }
    
    // Assuming you are on the user side
    $search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';
    $escaped_search_query = mysqli_real_escape_string($connection, $search_query);
    $search_condition = '';
    if (!empty($search_query)) {
        $search_condition = " AND (comment LIKE '%$escaped_search_query%' OR username LIKE '%$escaped_search_query%')";
    }


    
    // COMMENTS PER PAGE

    $commentsPerPage = 5;
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $offset = ($page - 1) * $commentsPerPage;

    // Get the total number of top-level comments from the database
    $section = $_GET['section'];
    $totalCommentsQuery = mysqli_query($connection, "SELECT COUNT(*) as total FROM $section WHERE parent_id = 0 $search_condition");
    $totalCommentsData = mysqli_fetch_assoc($totalCommentsQuery);
    $totalComments = $totalCommentsData['total'];

    // Calculate the total number of pages
    $totalPages = ceil($totalComments / $commentsPerPage);

    // Call printComments() function with the search condition and offset
    printComments(0, 0, null, false, $search_query, $search_condition, $offset);

    // Display pagination links after the comments
    if ($totalPages > 1) {
        echo '<div class="pagination center-align">';
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a href="./query.php?heading='.$heading.'&section=' . $section . '&page=' . $i . '&search_query=' . urlencode($search_query) . '"><button type="button" class="btn btn-success page-navigation mr-2">' . $i . '</button></a>';
        }
        echo '</div>';
    }

  ?>
  
<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script>
  var section = '<?php echo $section; ?>';
    function showReplyForm(commentId, username, indent) {
      const replyFormDiv = document.getElementById(`replyForm-${commentId}`);
      replyFormDiv.innerHTML = `
        <form onsubmit="submitReplyForm(event, ${commentId}, ${indent})"><br>
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Your username" value="" required>
          </div><br>
          <div class="form-group">
            <textarea name="comment" class="form-control" placeholder="Your reply" required></textarea>
          </div><br>
          <input type="hidden" name="parent_id" value="${commentId}">
          <input type="hidden" name="indent" value="${indent + 1}"> <!-- Increment the indent level for nested replies -->
          <button type="submit" class="btn btn-primary">Post Reply</button>
        </form>
        `;
    }
    function submitReplyForm(event, parentId, indent) {
      event.preventDefault();
      const form = event.target;
      const formData = new FormData(form);

      fetch(form.action, {
        method: 'POST',
        body: formData,
      })
      .then(response => {
          // Reload the page after posting the reply
        if (response.ok) {
          window.location.reload();
        } else {
          alert('Error occurred while posting the reply.');
        }
      })
      .catch(error => console.error('Error:', error));
    }
</script>