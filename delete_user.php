<?php
include("function.php");

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] || !isAdmin()) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Delete user
    $query = "DELETE FROM user WHERE klantid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    header("Location: control.php");
    exit();
}
?>