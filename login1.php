<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    
<header class="header">
    <nav class="navbar">
        <a href="#">Home</a>
        <a href="#">contact</a>
        <a href="#">info</a>
        <a href="#">team</a>
        <button style="float:right" href="#about" class="loginbtn popup">Login</button>
    </nav>
</header>

<video autoplay muted loop class="video-background">
    <source src="back\mylivewallpapers-com-Black-Hole-FHD.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>

<div class="wrapper1">
    <div class="wrapper">
        <div class="form-box login">
            <h2 class="loginh2">login</h2>
            <form action="#">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="mail"required>
                    <label class="llabel">Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password"required>
                    <label class="llabel">Password</label>
                </div>
                <div class="remember-forgot">
                    <label class="llabel"><input type="checkbox">
                    Remember me</label>
                    <a href="#" class="aa">Forgot Password?</a>
                </div>
                <button type="submit" class="submitbtn">Login</button>
                <div class="login-register">
                    <p>Don't have a account?<a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <h2 class="loginh2">registration</h2>
            <form action="#">
            <div class="input-box">
                    <span class="icon">
                        	<ion-icon name="person"></ion-icon>
                    </span>
                    <input type="name"required>
                    <label class="llabel">Username</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="mail"required>
                    <label class="llabel">Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password"required>
                    <label class="llabel">Password</label>
                </div>
                <div class="remember-forgot">
                    <label class="llabel"><input type="checkbox">
                    Agree to the terms & conditions</label>
                </div>
                <button type="submit" class="submitbtn">Register</button>
                <div class="login-register">
                    <p>Already have a account?<a href="#" class="login-link">Login</a></p>
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