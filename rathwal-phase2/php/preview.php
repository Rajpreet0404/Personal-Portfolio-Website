<?php
session_start(); // Start the session

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Retrieve form data
    $title = $_POST['title'];
    $content = $_POST['content'];
    // Get current date and time
    // Set timezone to British Summer Time (BST)
    date_default_timezone_set('Europe/London');

    // Get current timestamp
    $timestamp = time();

    // Format the timestamp to desired format
    // e.g., 1(j)st(S) January(F) 2021(Y), 12:00(H:i) GMT(T)
    $formattedDateTime = date("jS F Y, H:i T", $timestamp);
    $monthName = date("F");

    echo "<div class='blogEntries'>";
    echo "<div>";
    echo "<p class='date'>" . $formattedDateTime . "</p>";
    echo "<p class='blogTitle'>" . $title . "</p>";
    echo "<p class='blogContent'>" . $content . "</p>";
    echo "</div>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/Project/rathwal-phase2/css/reset.css">
    <link rel="stylesheet" href="/Project/rathwal-phase2/css/preview.css">

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

    <div class="flexContainer">

        <nav>
            <form action="/Project/rathwal-phase2/php/addEntry.php" method="post">
                <input type="submit" id="editButton" value="Edit">
            </form>
        </nav>

        <nav>
            <form action="/Project/rathwal-phase2/php/addPost.php" method="post">
                <input type="hidden" id="hiddenTitle" name="title">
                <input type="hidden" id="hiddenContent" name="content">
                <input type="submit" id="postButton" value="Post">
            </form>
        </nav>

    </div>

    <script src="/Project/rathwal-phase2/js/preview.js"></script>
    
</body>
</html>