<?php
// Database connection parameters
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ecs417";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve all blog posts
$sql = "SELECT * FROM blogposts";
$result = $conn->query($sql);

// Define an array to hold the blog posts
$blogPosts = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $blogPosts[] = $row;
    }
}

$archiveMonths = [];

if (isset($_GET['monthSelect'])) {
    $selectedMonth = $_GET['monthSelect'];

    // SQL query to retrieve blog posts for the selected month
    $sql = "SELECT * FROM blogposts WHERE month = '$selectedMonth'";
    $result = $conn->query($sql);

    // Define an array to hold the blog posts for the selected month
    $selectedMonthPosts = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $selectedMonthPosts[] = $row;
        }
    }

    $selectedMonthPosts = sortArray($selectedMonthPosts);
}

// Close the connection
$conn->close();

function isBigger($blogPost1, $blogPost2) {
    return $blogPost2['ID'] - $blogPost1['ID']; // Sort IDs in descending order
}

function sortArray($array) 
{
    $arrayLen = count($array);
    for ($i = 0; $i < $arrayLen; $i++) {
        for ($j = 0; $j < $arrayLen - $i - 1; $j++) {
            if (isBigger($array[$j], $array[$j + 1]) > 0) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
    return $array;
}

$blogPosts = sortArray($blogPosts);

foreach ($blogPosts as $post) {
    $month =  $post["month"];
    if (!in_array($month, $archiveMonths)) 
    {
        $archiveMonths[] = $month;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>

    <!-- Reset CSS -->
    <link rel="stylesheet" href="/Project/rathwal-phase2/css/reset.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="/Project/rathwal-phase2/css/viewBlog.css">
    <link rel="stylesheet" href="/Project/rathwal-phase2/css/viewBlogMobile.css" media="screen and (max-width: 768px)">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Allura&family=Dancing+Script:wght@400..700&family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="pageContainer">

        <header id="heading">

            <div class="navContainer">

                <figure>
                    <img id="navImage" src="/Project/rathwal-phase2/images/R.png" alt="">
                </figure>

                <nav>
                    <div class="navLinksContainer">
                        <div>
                            <a class="navLinks" href="/Project/rathwal-phase2/php/index.php">Home</a>
                        </div>
                        <div>
                            <a class="navLinks" href="/Project/rathwal-phase2/aboutme.html">About Me</a>
                        </div>
                        <div>
                            <a class="navLinks" href="/Project/rathwal-phase2/skills.html">Skills and Achievements</a>
                        </div>
                        <div>
                            <a class="navLinks" href="/Project/rathwal-phase2/education.html">Education and Qualifications</a>
                        </div>
                        <div>
                            <a class="navLinks" href="/Project/rathwal-phase2/experience.html">Experience</a>
                        </div>
                        <div>
                            <a class="navLinks" href="/Project/rathwal-phase2/projects.html">Projects </a>
                        </div>
                        <div>
                            <a class="navLinks" href="/Project/rathwal-phase2/login.html">Blog</a>
                        </div>
                    </div>
                </nav>

            </div>

        </header>

        <section id="pageTitle">
            <h1 id="header">Blog</h1>
        </section>

        <section id="archive">
            <form method="GET" action="viewBlog.php">
                <label for="monthSelect" id="selectMonthLabel">Select Month:</label>
                <select id="monthSelect" name="monthSelect" action="viewBlog.php">
                    <?php
                    foreach ($archiveMonths as $month) {
                        echo "<option value='$month'>$month</option>";
                    }
                    ?>
                </select>
                <button id="submitButton" type="submit">Submit</button>
            </form>
        </section>

        <section id="blogs">

            <?php
            if (isset($_GET['monthSelect'])) {
                // Display the blog posts for the selected month
                if (!empty($selectedMonthPosts)) {
                    echo "<div class='blogEntries'>";
                    foreach ($selectedMonthPosts as $post) {
                        echo "<div>";
                        echo "<p class='date'>" . $post["dateAndTime"] . "</p>";
                        echo "<p class='blogTitle'>" . $post["title"] . "</p>";
                        echo "<p class='blogContent'>" . $post["content"] . "</p>";
                        echo "</div>";
                    }
                    echo "</div>";
                } else {
                    echo "No blog posts found for the selected month.";
                }
            }
            else{
                if (!empty($blogPosts)) {
                    echo "<div class='blogEntries'>";
                    foreach ($blogPosts as $post) {
                        echo "<div>";
                        echo "<p class='date'>" . $post["dateAndTime"] . "</p>";
                        echo "<p class='blogTitle'>" . $post["title"] . "</p>";
                        echo "<p class='blogContent'>" . $post["content"] . "</p>";
                        echo "</div>";
                    }
                    echo "</div>";
                } else {
                    echo "No blog posts found.";
                }
            }
            ?>

        </section>

        <aside id="asideLinks">
            <a href="/Project/rathwal-phase2/php/addEntry.php">Add Post</a>
        </aside>

        <footer id="footerSection">
            <p>Copyright &copy; 2024 Rajpreet Athwal</p>
        </footer>

    </div>

</body>
</html>