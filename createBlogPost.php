<?php

use Random\Engine\Secure;

// Include necessary functions
include("function.php");

// Connect to the database
db_connect();

// Function to create a new forum post
createPost();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tower Defense Game - Forum</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <!-- Video Background -->
    <video autoplay muted loop class="video-background">
        <source src="back/mylivewallpapers-com-Black-Hole-FHD.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Navigation Section -->
    <nav class="nav">
        <?php
        // Display navigation menu
        shownav();
        userLoggedIn();
        ?>
    </nav>

    <!-- Main Content Section -->
    <section class="BlogContentCreate">
        <h2>Create a New Forum Post</h2>
        <!-- Form to create a new post -->
        <form action="createBlogPost.php" method="post">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required><br>
            
            <label for="author">Author:</label><br>
            <input type="text" id="author" name="author" required><br>
            
            <label for="date">Date:</label><br>
            <input type="date" id="date" name="date" required><br>
            
            <label for="category">Category:</label><br>
            <!-- Dropdown menu for selecting category -->
            <select id="category" name="category" required>
                <option value="">Select Category</option>
                <option value="game-review">Game Review</option>
                <option value="console-review">Console Review</option>
                <option value="product-review">Product Review</option>
            </select><br>
            
            <label for="content">Post:</label><br>
            <!-- Text area for entering post content -->
            <textarea id="content" name="content" rows="20" cols="100" required></textarea><br>
            
            <!-- Submit button -->
            <input type="submit" value="Submit">
        </form>
    </section>

    <!-- JavaScript Section -->
    <script src="js/main.js"></script>
</body>
</html>
