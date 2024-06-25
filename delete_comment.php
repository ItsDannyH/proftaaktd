<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("function.php");

// Ensure admin session is active
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] || !isAdmin()) {
    header("Location: index.php");
    exit();
}

// Validate comment ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid comment ID";
    exit();
}

$commentId = intval($_GET['id']);

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

// Prepare SQL query
$query = "DELETE FROM comments WHERE id = ?";
$stmt = $conn->prepare($query);

if (!$stmt) {
    echo "Error preparing statement: " . $conn->error;
    exit();
}

// Bind parameter and execute query
$stmt->bind_param("i", $commentId);

if ($stmt->execute()) {
    // Redirect to control page after successful deletion
    header("Location: control.php");
    exit();
} else {
    echo "Error executing SQL query: " . $stmt->error;
    exit();
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
