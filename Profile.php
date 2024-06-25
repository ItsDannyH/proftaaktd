<?php
include 'function.php';

// Ensure session is started if not already started elsewhere
if (!isset($_SESSION)) {
    session_start();
}

// Get user information if session variables are set
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
$userInfo = ($user && isset($user['klantid'])) ? getUserInfo($user['klantid']) : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tower Defense Game - User Profile</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <?php
            shownav(); // Function to display navigation items
            userLoggedIn(); // Function to display login/logout button based on session state
            ?>
        </nav>
    </header>

    <video autoplay muted loop class="video-background">
        <source src="back/mylivewallpapers-com-Black-Hole-FHD.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="container">
        <div class="profile-container">
            <?php if ($userInfo && isset($userInfo['profile_picture'])): ?>
                <div class="profile-picture" style="background-image: url('<?php echo $userInfo['profile_picture']; ?>');"></div>
            <?php endif; ?>

            <div class="profile-info">
                <?php if ($userInfo && isset($userInfo['username'])): ?>
                    <h1><?php echo $userInfo['username']; ?></h1>
                <?php endif; ?>
            </div>

            <table class="leaderboard-table">
                <thead>
                    <tr>
                        <th>Map</th>
                        <th>Score</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php displayUserResults($user['klantid']); ?>
                </tbody>
            </table>

            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
                <h2 class="loginh2">Hello <?php echo $userInfo['username'] ?? 'User'; ?>!<br>
                    You are currently logged in. If you want to log out, click the button below.
                </h2>
                <form action="Login.php" method="post">
                    <button type="submit" class="submitbtn">Logout</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
