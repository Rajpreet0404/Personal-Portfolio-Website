<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    session_start(); // Start new or resume existing session

    // Reset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to index.html
    header("Location: /Project/rathwal-phase2/php/index.php");
    exit();
    ?>
    
</body>
</html>