<?php 
include "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn More - Tower Defense Game</title>
    <link rel="stylesheet" href="style/home.css">
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
    <source src="back/mylivewallpapers-com-Black-Hole-FHD.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>

<div class="content">
    <h1>About the Game</h1>
    <section class="gameplay">
        <h2>Gameplay Mechanics</h2>
        <p>Our tower defense game offers a unique blend of strategy and action. You will need to build and upgrade your towers to defend against waves of enemies. Each level presents new challenges that require adaptive strategies and quick thinking.</p>
    </section>

    <section class="characters">
        <h2>Characters</h2>
        <p>Meet the heroes and villains of the game! Each character has unique abilities and powers that can turn the tide of battle. Strategize and deploy your characters wisely to maximize their potential.</p>
    </section>

    <section class="levels">
        <h2>Levels</h2>
        <p>Explore various levels with increasing difficulty. Each level is designed with intricate details and offers a new set of challenges. Can you master them all?</p>
    </section>

    <section class="media">
        <h2>Media</h2>
        <p>Check out some screenshots and videos from the game to get a glimpse of the action!</p>
        <div class="media-gallery">
            <img src="images/screenshot1.jpg" alt="Screenshot 1">
            <img src="images/screenshot2.jpg" alt="Screenshot 2">
            <video controls>
                <source src="videos/gameplay.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </section>
</div>

</body>
</html>
