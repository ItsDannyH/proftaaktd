<?php 
include "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download - Tower Defense Game</title>
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
    <h1>Download Tower Defense Game</h1>
    <p>Experience the ultimate tower defense game now! Download for your preferred platform and start defending your towers.</p>
    <div class="download-buttons">
        <?php 
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
        { ?>
        <a href="path/to/windows-version.exe" class="download-button windows">Download for Windows</a>
        <a href="path/to/linux-version.tar.gz" class="download-button linux">Download for Linux</a>
      <?php  
      }
    else
    { ?>
        <a href="login1.php" class="download-button windows">Login Here To Download</a>
        <a href="login1.php" class="download-button linux">Login Here To Download</a>
        <?php
    }
        ?>
    </div>

    <section class="system-requirements">
        <h2>System Requirements</h2>
        <div class="requirements">
            <div class="requirement">
                <h3>Windows</h3>
                <ul>
                    <li>OS: Windows 7/8/10 (64-bit)</li>
                    <li>Processor: Intel Core i3</li>
                    <li>Memory: 4 GB RAM</li>
                    <li>Graphics: NVIDIA GeForce GTX 660</li>
                    <li>Storage: 5 GB available space</li>
                </ul>
            </div>
            <div class="requirement">
                <h3>Linux</h3>
                <ul>
                    <li>OS: Ubuntu 18.04 or later</li>
                    <li>Processor: Intel Core i3</li>
                    <li>Memory: 4 GB RAM</li>
                    <li>Graphics: OpenGL 3.3 compatible</li>
                    <li>Storage: 5 GB available space</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="installation">
        <h2>Installation Instructions</h2>
        <div class="instructions">
            <div class="instruction">
                <h3>Windows</h3>
                <ol>
                    <li>Download the game setup file.</li>
                    <li>Double-click the setup file to start the installation.</li>
                    <li>Follow the on-screen instructions to complete the installation.</li>
                    <li>Launch the game from the Start menu or desktop shortcut.</li>
                </ol>
            </div>
            <div class="instruction">
                <h3>Linux</h3>
                <ol>
                    <li>Download the game tar.gz file.</li>
                    <li>Extract the file to your desired location.</li>
                    <li>Open a terminal and navigate to the game directory.</li>
                    <li>Run `./game` to start the game.</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="features">
        <h2>Game Features</h2>
        <ul>
            <li>Strategic tower placement and upgrades.</li>
            <li>Multiple characters with unique abilities.</li>
            <li>Diverse and challenging levels.</li>
            <li>Stunning graphics and immersive sound effects.</li>
            <li>Regular updates with new content.</li>
        </ul>
    </section>
</div>

</body>
</html>
