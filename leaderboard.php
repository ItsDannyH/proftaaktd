<?php
// Include necessary functions
include("function.php");

// Establish database connection (assuming db_connect() returns the connection)
$conn = db_connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tower Defense Game - Leaderboard</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <nav>
            <?php 
            // Display navigation menu
            shownav(); 
            // Check if user is logged in and display appropriate content
            userLoggedIn();
            ?>
        </nav>
    </header>

    <!-- Video Background -->
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
            if (!empty($leaderboard)) {
                $rank = 1;
                foreach ($leaderboard as $row) {
                    echo "<tr>";
                    echo "<td>" . $rank++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['username']) . "</td>"; // htmlspecialchars to prevent XSS
                    echo "<td>" . htmlspecialchars($row['map']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['score']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['time_date']) . "</td>";
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
        <!-- Include JavaScript file if necessary -->
        <!-- <script src="js/main.js"></script> -->
    </footer>
</body>
</html>
