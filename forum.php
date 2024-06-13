<?php
include "function.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gameworld</title>
    <link rel="stylesheet" href="style/style.css">
    </head>
<body>
    
<header class="header">
    <nav class="navbar">
        <?php
        shownav();
        userLoggedIn();
        ?>
    </nav>
</header>

<video autoplay muted loop class="video-background">
    <source src="back\mylivewallpapers-com-Black-Hole-FHD.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>

    <aside>
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
            <h1>forums</h1>
            <?php 
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<a href="createBlogPost.php"><h2 class="Clickable">Create Post</h2></a>';
            } 
            else 
            {
                echo '<p> Log in or register to create a post </p>';
            }
            ?>
            <br>
            <?php
            if(isset($_GET['id'])) {
                // Pass the blog ID directly to the showBlog function
                showBlog($_GET['id']); 
            } else {
                // If no ID is provided, display all blog posts
                showBlogs(); 
            }
            ?>
            </div>
        </section>
    </main>

    <footer>
        <script src="js/main.js"></script>
        <script src="script.js"></script>
    </footer>
</body>
</html>