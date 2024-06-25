<?php
require_once 'function.php';

// Check if the user is logged in and is an admin
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] || !isAdmin()) {
    header("Location: Login.php");
    exit;
}

// Connect to the database
$conn = db_connect();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all users
$sql_users = "SELECT * FROM user";
$result_users = $conn->query($sql_users);
if (!$result_users) {
    die("Error executing query: " . $conn->error);
}

// Fetch all comments
$sql_comments = "SELECT * FROM comments"; // Assuming you have a comments table
$result_comments = $conn->query($sql_comments);
if (!$result_comments) {
    die("Error executing query: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        <h1>Admin Dashboard</h1>
        
        <section>
            <h2>Registered Users</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
                <?php while ($user = $result_users->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $user['klantid']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td>
                        <form method="get" action="delete_user.php" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            <input type="hidden" name="klantid" value="<?php echo $user['klantid']; ?>">
                            <input type="submit" class="loginbtn" value="Delete">
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </section>

        <section>
            <h2>Comments</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Blog ID</th>
                    <th>Comment</th>
                    <th>Actions</th>
                </tr>
                <?php while ($comment = $result_comments->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $comment['id']; ?></td>
                    <td><?php echo $comment['blog_id']; ?></td>
                    <td><?php echo $comment['comment']; ?></td>
                    <td>
                        <form method="get" action="delete_comment.php" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                            <input type="hidden" name="id" value="<?php echo $comment['id']; ?>">
                            <input type="submit" class="loginbtn" value="Delete">
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </section>

    </div>
</body>
</html>
