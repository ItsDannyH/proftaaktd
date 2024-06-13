<?php 
include "function.php";
login();
register()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gameworld</title>
    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <link rel="stylesheet" href="style/login.css">
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

<div class="wrapper1">
    <div class="wrapper">
        <div class="form-box login">
            <?php 
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                ?> 
                <h2 class="loginh2">Hello user!<br> You are currently logged in. If you want to log out, click the button below.</h2>
                <form action="login1.php" method="post">
                    <button type="submit" class="submitbtn">Logout</button>
                </form>
                <?php
            } else {
                ?> 
                <h2 class="loginh2">Login</h2>
                <form action="login1.php" method="post">
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="mail"></ion-icon>
                        </span>
                        <input type="text" name="username" required>
                        <label class="llabel">Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="lock-closed"></ion-icon>
                        </span>
                        <input type="password" name="password" required>
                        <label class="llabel">Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label class="llabel"><input type="checkbox" name="remember">
                        Remember me</label>
                        <a href="#" class="aa">Forgot Password?</a>
                    </div>
                    <button type="submit" class="submitbtn">Login</button>
                    <div class="login-register">
                        <p>Don't have an account?<a class="register-link"> Register</a></p>
                    </div>
                </form>
                <?php
            }
            ?>
        </div>
        <div class="form-box register">
            <h2 class="loginh2">Registration</h2>
            <form action="login1.php" method="post">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input id="usernameR" name="usernameR" type="user"required>
                    <label class="llabel">Username</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input id="passwordR" name="passwordR" type="password"required>
                    <label class="llabel">Password</label>
                </div>
                <div class="remember-forgot">
                    <label class="llabel"><input type="checkbox">
                    Agree to the terms & conditions</label>
                </div>
                <button type="submit" class="submitbtn">Register</button>
                <div class="login-register">
                    <p>Already have a account?<a href="#" class="login-link"> Login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
