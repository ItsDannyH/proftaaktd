<?php 
include "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tower Defense Game - Contact</title>
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

<div class="container">
    <div class="contact-info">
        <h1>Contact Us</h1>
        <h2>Contact Information</h2>
        <p><strong>Email:</strong></p>
        <p>General Inquiries: <a href="mailto:info@ah_ink.com">info@yourwebsite.com</a></p>
        <p>Support: <a href="mailto:support@ah_ink.com">support@yourwebsite.com</a></p>
        <p>Sales: <a href="mailto:sales@yourwebsite.com">sales@yourwebsite.com</a></p>
        <p><strong>Phone:</strong></p>
        <p>Main Office: +1 (123) 456-7890</p>
        <p>Support: +1 (123) 456-7891</p>
        <p><strong>Address:</strong></p>
        <p>ah ink.<br>
           Keizerin Marialaan 2, 5702 NR Helmond<br>
           Helmond, Noord-Brabant, 5700 AL<br>
           The Netherlands</p>
    </div>

    <div class="contact-form">
        <h2>Contact Form</h2>
        <form action="your_form_submission_url" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            
            <input type="submit" value="Submit">
        </form>
    </div>

    <div class="social-media">
        <h2>Social Media</h2>
        <p>Stay connected with us on social media:</p>
        <p>
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">LinkedIn</a>
            <a href="#">Instagram</a>
        </p>
    </div>
</div>

</body>
</html>
