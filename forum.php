<?php
include "function.php"; // Include necessary functions
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
    
<header class="header">
    <nav class="navbar">
        <?php
        shownav(); // Display navigation menu
        userLoggedIn(); // Display user-specific content
        ?>
    </nav>
</header>

<!-- Video Background -->
<video autoplay muted loop class="video-background">
    <source src="back\mylivewallpapers-com-Black-Hole-FHD.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>

<aside>
    <!-- Dropdown to filter blog posts by category -->
    <select class="category" name="category" id="category" onchange="filterBlog()">
        <option>Select...</option>
        <option value="forum.php?category=game-review">Game Review</option>
        <option value="forum.php?category=console-review">Console Review</option>
        <option value="forum.php?category=product-review">Product Review</option>
        <option value="forum.php">Show all</option>
    </select>
</aside>

<main>    
    <section class="BlogContent">   
        <div class="blog-item"> 
            <h1>Forums</h1>
            <?php 
            // Check if user is logged in to display create post link
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<a href="createBlogPost.php"><h2 class="Clickable">Create Post</h2></a>';
            } else {
                echo '<p>Log in or register to create a post</p>';
            }
            ?>
            <br>
            <?php
            // Display single blog post or all blog posts based on URL parameter
            if(isset($_GET['id'])) {
                showBlog($_GET['id']); // Show single blog post
            } else {
                showBlogs(); // Show all blog posts
            }
            ?>
        </div>
    </section>
</main>

<footer>
    <!-- Include JavaScript files for additional functionality -->
    <script src="js/main.js"></script>
    <script src="script.js"></script>
</footer>

</body>
</html>
