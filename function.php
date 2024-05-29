<?php
session_start();

// Function to establish database connection
function db_connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ProftaakTD";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    // Return the connection object
    return $conn;
}

// Function to retrieve navigation items from the database
function getNavigation()
{
    // connect to DB
    $conn = db_connect();
 
    // the query to be executed
    $sql = "SELECT * FROM nav";
 
    // execute
    $resource = $conn->query($sql) or die($conn->error);
 
    // Check if there are results
    if ($resource->num_rows > 0) 
    {
        $navigation = $resource->fetch_all(MYSQLI_ASSOC);
    } 
    else 
    {
        $navigation = array(); // Initialize as an empty array if no results
    }
 
    return $navigation;
}

// Function to display navigation items
function shownav()
{
    // Get navigation items
    $navigationItems = getNavigation();

    // Check if there are any navigation items
    if (empty($navigationItems)) 
    {
        echo "No navigation items found.";
        return;
    }

    // Loop through navigation items and display them
    foreach ($navigationItems as $item)
    {
        // Check if the keys "nav" and "label" exist in the current item
        if (isset($item['nav']) && isset($item['label'])) 
        {
            ?>
            <a href="<?php echo $item['nav']; ?>"><?php echo $item['label']; ?></a>
            <?php
        } 
        else 
        {
            echo "Missing 'nav' or 'label' key for a navigation item.";
        }
    }
}

function login()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // Check if username and password are set and not empty
        if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) 
        {
            // Connect to the database
            $conn = db_connect();

            // Retrieve username and password from POST data
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Prepare SQL statement to retrieve user information based on username and password
            $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $result = $conn->query($sql);

            // Check if a user with the provided username and password exists
            if ($result->num_rows == 1) 
            {
                // Authentication successful, set session variables
                $user = $result->fetch_assoc();
                $_SESSION['loggedin'] = true;
                $_SESSION['user'] = $user;
                // Redirect user to products page
                header("Location:login.php");
                exit;
            } 
            else 
            {
                // Authentication failed, show error message
                $error = "Invalid username or password.";
            }
        } 
        else 
        {
            // If username or password is empty, show error message
            $error = "Username and password are required.";
        }

        if ($_SESSION['loggedin'] = true && $_POST == 'logout')
        {
            $_SESSION['loggedin'] = false;
        }

    }
}

function register() 
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // Check if username and password are set and not empty
        if (isset($_POST['usernameR']) && isset($_POST['passwordR']) && !empty($_POST['usernameR']) && !empty($_POST['passwordR'])) 
        {
            // Connect to the database
            $conn = db_connect();

            // Prepare data for insertion
            $username = $_POST['usernameR'];
            $password = $_POST['passwordR']; // For simplicity, you can hash the password here before storing it

            // Check if the username already exists
            $sql = "SELECT * FROM user WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) 
            {
                // Username already exists, show error message
                $error = "Username already exists.";
            } 
            else 
            {
                // Insert new user into the database
                $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $username, $password); // For security, you should hash the password here
                if ($stmt->execute()) 
                {
                    // Registration successful, redirect to login page
                    header("Location:login.php");
                    exit;
                } 
                else 
                {
                    // Error inserting user, show error message
                    $error = "Error registering user.";
                }
            }
        } 
        else 
        {
            // If username or password is empty, show error message
            $error = "Username and password are required.";
        }
    }
}

function dd($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}


function reload($address = false)
{
    if($address != false)
    {
        header("location:" . $address);
    } 
    else
    {
        header("location:cart.php");
    }
}

function init()
{
    if(!isset($_SESSION['shopping-cart']))
    {
        $_SESSION['shopping-cart'] = [];
    }
}
function createPost()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $title = $_POST['title'];
        $author = $_POST['author'];
        $date = $_POST['date'];
        $category = $_POST['category'];
        $content = $_POST['content'];

        // Insert data into the blog table
        $conn = db_connect();
        $sql = "INSERT INTO blog (title, author, date, category, content) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $title, $author, $date, $category, $content);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Insertion successful, redirect to a confirmation page or any other page
            header("Location: blog.php");
            exit;
        } else {
            // Insertion failed, handle the error (you can display an error message or log it)
            echo "Error: " . $conn->error;
        }
    }
}

function getBlogs($category = false)
{
    // Connect to DB
    $conn = db_connect();
 
    // Initialize SQL query
    $sql = "SELECT * FROM blog";
    
    // Add condition for category if provided
    if($category) {
        $sql .= " WHERE category = '" . $category . "'";
    }

    // Add ORDER BY clause to sort by date in descending order
    $sql .= " ORDER BY date DESC";
 
    // Execute the query
    $resourceB = $conn->query($sql) or die($conn->error);
 
    // Check if there are results
    if ($resourceB->num_rows > 0) {
        $blogs = $resourceB->fetch_all(MYSQLI_ASSOC);
    } else {
        $blogs = array(); // Initialize as an empty array if no results
    }

    return $blogs;
}

// Function to get a blog post by ID
function getBlog($blogId) {
    // Connect to DB
    $conn = db_connect();
    
    // Prepare SQL query
    $sql = "SELECT * FROM blog WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $blogId);
    
    // Execute query
    $stmt->execute();
    
    // Get result
    $result = $stmt->get_result();
    
    // Check if result is not empty
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}


function showBlogs()
{
    $category = isset($_GET['category']) ? $_GET['category'] : false;

    if($category)
    {
        // Get blogs of the selected $category only
        $blogItems = getBlogs($category);
    }
    else
    {
        // Get all blogs if no $category is selected
        $blogItems = getBlogs();
    }

    // Check if there are any blog items
    if (empty($blogItems)) 
    {
        echo "No blogss found.";
        return;
    }

    // Loop through blog items and display them
    foreach ($blogItems as $bItem)
    {
        // Display blog details
    }


// Loop through blog items and display them
foreach ($blogItems as $bItem)
{
    if (isset($bItem['id'], $bItem['title'], $bItem['author'], $bItem['date'], $bItem['category'], $bItem['content'])) 
    {
        ?>
        <div class="blog-item">
                <h1 class="titleb"><?php echo $bItem['title']; ?></h1>
                <p class="author"><?php echo $bItem['author']; ?></p>
                <p class="date"><?php echo $bItem['date']; ?></p>
                <p class="categoryb"><?php echo $bItem['category']; ?></p>
                <p class="content"><?php echo substr($bItem['content'], 0, 100) . '...'; ?></p>
                <a class="Clickable" href="blog.php?id=<?php echo $bItem['id']; ?>">Read more</a>
        </div>
        <?php
    } 
    else 
    {
        echo "Missing data for this blog item";
    }
}
}

function showBlogCategory()
{
    // Check if there are any blog items
    if (empty($blogCategory)) 
    {
        echo "No blog items found.";
        return;
    }
 
    // Loop through blog items and display them
    foreach ($$blogCategory as $bItem)
    {
        // Check if the keys "link" and "label" exist in the current item
        if (isset($bItem['title']) && isset($bItem['author'])) 
        {
            ?>
            <a href="<?php echo $bItem['title']; ?>"><?php echo $bItem['author']; ?>><?php echo $bItem['date']; ?></a>
            <?php
        }
        else 
        {
            echo "Missing 'link' or 'label' key for a blog item.";
        }
    }
}

function showBlog($blogId) {
    // Get the blog post by ID
    $blogPost = getBlog($blogId);
    
    // Check if the blog post exists
    if ($blogPost) {
        ?>
        <a href="blog.php" class="block Clickable"><h1>Go Back</h1></a>
        <div class="Content">
            <div class="blog-item">
                <h1 class="titleb"><?php echo $blogPost['title']; ?></h1>
                <p class="author"><?php echo $blogPost['author']; ?></p>
                <p class="date"><?php echo $blogPost['date']; ?></p>
                <p class="categoryb"><?php echo $blogPost['category']; ?></p>
                <p class="content"><?php echo $blogPost['content']; ?></p>
            </div>
        </div>
  
        <!-- Comment Section -->
        <div class="comment-section">
            <h2>Comments</h2>
            <!-- Display existing comments -->
            <?php
                $comments = getComments($blogId);
                if (!empty($comments)) {
                    foreach ($comments as $comment) 
                    {
                        ?>
                        <div class="comment">
                            <h3><?php echo $comment['name']; ?> says:</h3>
                            <p><?php echo $comment['comment']; ?></p>
                            <!-- Display date and time of the comment -->
                            <h5 class="comment-time"><?php echo $comment['created_at']; ?></h5>
                        </div>
                        <?php
                    }
                } 
                else 
                {
                    echo "<p>No comments yet.</p>";
                }
            ?>
            <!-- Comment Form -->
            <div class="addcomment">
            <form action="addComment.php" method="post">
                <input type="hidden" name="blog_id" value="<?php echo $blogId; ?>">
                <label for="author">Name:</label><br>
                <input type="text" id="author" name="name" value="<?php echo isset($_SESSION['user']) ? $_SESSION['user']['username'] : ''; ?>" required readonly><br>
                <label for="content">Comment:</label><br>
                <textarea id="content" name="comment" rows="10" cols="50" required></textarea><br>
                <input type="submit" value="Post Comment">
            </form>
            </div>
        </div>
        <?php
    } 
    else 
    {
        echo "Blog post not found.";
    }
}

function getComments($blogId) {
    // Connect to DB
    $conn = db_connect();
    
    // Prepare SQL query
    $sql = "SELECT * FROM comments WHERE blog_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $blogId);
    
    // Execute query
    $stmt->execute();
    
    // Get result
    $result = $stmt->get_result();
    
    // Fetch comments
    $comments = [];
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
    
    return $comments;
}

function addComment($blogId, $name, $comment) {
    // Connect to DB
    $conn = db_connect();
    
    // Prepare SQL statement
    $sql = "INSERT INTO comments (blog_id, name, comment) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $blogId, $name, $comment);
    
    // Execute SQL statement
    if ($stmt->execute()) {
        return true; // Comment added successfully
    } else {
        return false; // Error adding comment
    }
}
?>