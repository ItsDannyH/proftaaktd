<?php
session_start();
include("function.php");
db_connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameWorld</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <header>
        <nav>
            <?php shownav(); ?>
        </nav>
    </header>

    <aside>
        <select class="category" name="category" id="category" onchange="filterBlog()">
            <option>Select...</option>
            <option value="blog.php?category=game-review">Game Review</option>
            <option value="blog.php?category=console-review">Console Review</option>
            <option value="blog.php?category=product-review">Product Review</option>
            <option value="blog.php">Show all</option>
        </select>
    </aside>

    <main>    
        <section class="BlogContent">    
            <h1>Blogs</h1>
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
        </section>
    </main>

    <footer>
        <script src="js/main.js"></script>
    </footer>
</body>
</html>