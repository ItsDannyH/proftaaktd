<?php
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
        <nav class="nav">
            <?php shownav(); ?>
        </nav>
    </header>

    <main>
        <section class="Content">
            <div class="container">
            <form action="/submit_contact_form" method="post">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" required><br>
                
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br>
                
                <label for="subject">Subject:</label><br>
                <input type="text" id="subject" name="subject" required><br>
                
                <label for="message">Message:</label><br>
                <textarea id="message" name="message" rows="4" required></textarea><br>
                
                <input class="Clickable" type="submit" value="Submit">
            </form>
</div>
        </section>
    </main>
</body>
</html>
