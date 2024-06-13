<?php
// Include necessary functions
include("function.php");

// Connect to the database
db_connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameWorld - Leaderboard</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <nav>
            <?php 
            // Display navigation menu
            shownav(); 
            userLoggedIn();
            ?>
            
        </nav>
    </header>

    <video autoplay muted loop class="video-background">
        <source src="back\mylivewallpapers-com-Black-Hole-FHD.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Main Content Section -->
    <div class="container">
        <h1>Leaderboard</h1>
        <table>
            <tr>
                <th>Rank</th>
                <th>Username</th>
                <th>Map</th>
                <th>Score</th>
                <th>Date</th>
            </tr>
            <?php
            // Get leaderboard data
            $leaderboard = getLeaderboard();

            // Output leaderboard data
            if ($leaderboard) {
                $rank = 1;
                foreach ($leaderboard as $row) {
                    echo "<tr>";
                    echo "<td>" . $rank++ . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['map'] . "</td>";
                    echo "<td>" . $row['score'] . "</td>";
                    echo "<td>" . $row['time_date'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No data available</td></tr>";
            }
            ?>
        </table>
    </div>

    <!-- Footer Section -->
    <footer>
        <!-- Button to scroll to the top of the page -->
        <!-- <button onclick="topFunction()" id="myBtn" class="Top" title="Go to top">^</button> -->
        <!-- Include JavaScript file -->
        <script src="js/main.js"></script>
    </footer>
</body>
</html>
