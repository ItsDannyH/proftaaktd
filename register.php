<?php 
include "function.php";
register();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gameworld</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    <header>
        <nav>
            <?php shownav(); ?>
        </nav>
    </header>
    <main>
        <div class="login-container">
            <h2>Register</h2>
            <form action="register.php" method="post">
                <label for="usernameR">Username:</label><br>
                <input type="text" id="usernameR" name="usernameR" required><br>
                
                <label for="passwordR">Password:</label><br>
                <input type="password" id="passwordR" name="passwordR" required><br>
                
                <input type="submit" value="Register">
            </form>
        </div>
    </main>
</body>
</html>
