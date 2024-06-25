<?php 
include "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tower Defense Game - Home</title>
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
    <h1>Defend Your Towers!</h1>
    <p>Join the ultimate tower defense game where strategy meets action. Build, defend, and conquer your enemies in an epic battle for survival!</p>
    <a href="game.php" class="cta-button">Play Now</a>
    <a href="learnmore.php" class="cta-button">Learn More</a>
</div>

<section class="features">
    <h2>Game Features</h2>
    <div class="feature-grid">
        <div class="feature">
            <h3>Strategic Gameplay</h3>
            <p>Plan your defenses and adapt to ever-changing battle conditions.</p>
        </div>
        <div class="feature">
            <h3>Epic Battles</h3>
            <p>Experience intense and fast-paced combat against formidable foes.</p>
        </div>
        <div class="feature">
            <h3>Upgrade Your Towers</h3>
            <p>Enhance your towers with powerful upgrades and abilities.</p>
        </div>
    </div>
</section>

<section class="testimonials">
    <h2>What Players Say</h2>
    <div class="testimonial">
        <p>"The best tower defense game I've ever played! Absolutely thrilling!"</p>
        <h4>- Gamer123</h4>
    </div>
    <div class="testimonial">
        <p>"Amazing graphics and strategic depth. Highly recommend!"</p>
        <h4>- StrategyFan</h4>
    </div>
</section>

</body>
</html>
