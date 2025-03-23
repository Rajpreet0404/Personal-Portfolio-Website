<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['UserID'])) {
    // If not logged in, redirect to the login page
    header("Location: /Project/rathwal-phase2/login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rajpreets Portfolio - Add Blog</title>
    <link rel="stylesheet" href="/Project/rathwal-phase2/css/reset.css">
    <link rel="stylesheet" href="/Project/rathwal-phase2/css/addblog.css">
    <link rel="stylesheet" href="/Project/rathwal-phase2/css/addblogMobile.css" media="screen and (max-width: 768px)">

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

        <header id="headerSection">
            <section>
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
                                <a class="navLinks" href="/Project/rathwal-phase2/php/viewBlog.php">Blog</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </section>
        </header>

        <aside id="logoutSection">
            <a id="logoutLink" href="/Project/rathwal-phase2/php/logout.php">Log Out</a>
        </aside>

        <aside id="previewSection">
            <form action="/Project/rathwal-phase2/php/preview.php" method="post">
                <input type="hidden" id="previewTitle" name="title">
                <input type="hidden" id="previewContent" name="content">
                <div>
                    <input type="submit" id="previewButton" value="Preview">
                </div>
            </form>
        </aside>

        <section id="loginSection">
            <div class="blogContainer">
                <div>
                    <h1 id="header">Add Blog</h1>
                </div>
                <div>
                    <form action="/Project/rathwal-phase2/php/addPost.php" method="post">
                        <div>
                            <input type="text" id="title" name="title" placeholder="Title">
                        </div>
                        <div>
                            <textarea id="content" name="content" placeholder="Enter your text here"></textarea>
                        </div>
                        <div>
                            <input type="submit" id="postButton" value="Post">
                            <input type="reset" id="clearButton" value="Clear">
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <footer id="footerSection">
            <p>Copyright &copy; 2024 Rajpreet Athwal</p>
        </footer>
    </div>

    <!-- Placed at the end of the body so the DOM objects are fully loaded before the function tries to execute -->
    <script src="/Project/rathwal-phase2/js/addblog.js"></script>

</body>
</html>