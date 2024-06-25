<?php
include("function.php");

// Check if the user is logged in and is an admin
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] || !isAdmin()) {
    header("Location: index.php");
    exit();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proftaaktd"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if user ID is set in the GET request
if (isset($_GET['klantid'])) {
    $userId = intval($_GET['klantid']); // Convert to integer to prevent SQL injection

    // Delete user
    $query = "DELETE FROM user WHERE klantid = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        // Check if the user was successfully deleted
        if ($stmt->affected_rows > 0) {
            // Redirect to control page after successful deletion
            header("Location: control.php");
        } else {
            echo "Error: Unable to delete user. User may not exist.";
        }

        $stmt->close();
    } else {
        echo "Error: Could not prepare SQL statement.";
    }
} else {
    echo "Error: No user ID provided.";
}
$conn->close()
?>
