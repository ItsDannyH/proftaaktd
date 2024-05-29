<?php
// Include necessary functions
include("function.php");

// Connect to the database
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
    <!-- Header Section -->
    <header>
        <nav>
            <?php 
            // Display navigation menu
            shownav(); 
            ?>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main>
        
    </main>

    <!-- Footer Section -->
    <footer>
        <!-- Button to scroll to the top of the page -->
        <button onclick="topFunction()" id="myBtn" class="Top" title="Go to top">^</button>
        <!-- Include JavaScript file -->
        <script src="js/main.js"></script>
    </footer>
</body>
</html>
