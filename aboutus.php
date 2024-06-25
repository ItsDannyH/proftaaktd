<?php 
include "function.php";
login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tower Defense Game - About Us</title>
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

<section class="team-section">
    <div class="team-title">
        <h1 class="login">We are AH Inc.</h1>
    </div>
    <div class="team-cards">
        <div class="team-card">
            <div class="team-image">
                <img src="back/20231002_122821.jpg" alt="Danny">
            </div>
            <div class="team-details">
                <h3>Danny</h3>
                <p>Leader</p>
            </div>
            <div class="popup">Danny is the leader of our team.</div>
        </div>
        <div class="team-card">
            <div class="team-image">
                <img src="back/86113ae1fe7a30edb601fd6dec164c47.jpg" alt="Lucas">
            </div>
            <div class="team-details">
                <h3>Lucas</h3>
                <p>Game Developer</p>
            </div>
            <div class="popup">Lucas develops games for our project.</div>
        </div>
        <div class="team-card">
            <div class="team-image">
                <img src="back/20231106_112848.jpg" alt="Aaron">
            </div>
            <div class="team-details">
                <h3>Aaron</h3>
                <p>Software Developer</p>
            </div>
            <div class="popup">Aaron is a software developer.</div>
        </div>
        <div class="team-card">
            <div class="team-image">
                <img src="back/IMG20240528091014.jpg" alt="Stan">
            </div>
            <div class="team-details">
                <h3>Stan</h3>
                <p>Designer</p>
            </div>
            <div class="popup">Stan designs our interfaces.</div>
        </div>
    </div>
</section>

</body>
</html>
