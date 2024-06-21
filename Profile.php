<?php
include 'function.php';

// Ensure session is started if not already started elsewhere
if (!isset($_SESSION)) {
    session_start();
}

// Redirect to login page if user is not logged in or session variables are not set
// if (!isset($_SESSION['loggedin']) || !isset($_SESSION['user'])) {
//     header("Location: login1.php");
//     exit;
// }

// Get user information if session variables are set
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
$userInfo = ($user && isset($user['klantid'])) ? getUserInfo($user['klantid']) : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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
            <?php if ($userInfo && isset($userInfo['profile_picture'])) { ?>
                <div class="profile-picture" style="background-image: url('<?php echo $userInfo['profile_picture']; ?>');"></div>
            <?php } ?>
            <div class="profile-info">
                <?php if ($userInfo && isset($userInfo['username'])) { ?>
                    <h1><?php echo $userInfo['username']; ?></h1>
                <?php } ?>
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
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
                <h2 class="loginh2">Hello <?php echo $userInfo['username'] ?? 'User'; ?>!<br> You are currently logged in. If you want to log out, click the button below.</h2>
                <form action="login1.php" method="post">
                    <button type="submit" class="submitbtn">Logout</button>
                </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>
