<?php
include("function.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blogId = $_POST['blog_id'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    // Add comment to the database
    if (addComment($blogId, $name, $comment)) {
        // Redirect back to the blog post page
        header("Location: forum.php?id=$blogId");
        exit;
    } else {
        echo "Error adding comment.";
    }
}
?>
