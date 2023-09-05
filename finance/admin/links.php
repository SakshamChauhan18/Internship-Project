<?php
// Include the connection.php file to establish the database connection
include 'connection.php';

// Function to get the URL for a given link name from the database
function getLinkURL($linkName, $connection) {
    $query = "SELECT url FROM links WHERE name = '$linkName'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['url'];
    }

    return null; // Return null if link not found in the database
}

// Get the link name from the query parameter
if (isset($_GET['name'])) {
    $linkName = $_GET['name'];

    // Fetch the corresponding URL from the database
    $url = getLinkURL($linkName, $connection);

    // If URL found, redirect the user to the desired URL in a new tab
    if ($url) {
        echo '<script>window.open("' . $url . '", "_blank"); history.back();</script>';
        exit;
    }
}

// If link name not provided or not found in the database, redirect to an error page or homepage
header("Location: ./error.php"); // You can customize the error page or homepage URL
exit;
?>