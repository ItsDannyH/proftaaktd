<?php 
include "function.php";
login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gameworld</title>
    <link rel="stylesheet" href="style/index.css">
    </head>
    <header>
    <nav>
        <?php
        shownav();
        ?>
    </nav>
</header>
<body>
    <div class="Content">
        <div class="container">
           
            <form action="login.php" method="post">
        <?php 
            if (($_SESSION['loggedin'] == true) && isset($_SESSION['loggedin']))
            {
                ?> 
                    <h2>Hello user!<br> You are currently logged in, If you want to log out click the button below.</h2>
                    <input class="Clickable" type="submit" value="logout">
                <?php
            }
            else
            {
                ?> 
                 <h2>Login or</h2>
                <a href="register.php"><h2>Register</h2></a>
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" required><br>
                    
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" required><br>
                    
                    <input class="Clickable" type="submit" value="Login">
                    <p> You are currently logged out, Log in or register an account </p>
                <?php
            }
        ?>
            </form>
        </div>
    </div>

</body>
</html>
</html>