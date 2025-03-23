<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // Retrieve form data
        $email = $_POST['email'];
        $userPassword = $_POST['password'];

        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "ecs417";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to select user with provided email and password
        $sql = "SELECT * FROM AUTHORISEDUSERS WHERE email='$email' AND password='$userPassword'";
        $result = $conn->query($sql);

        // Check if user exists and credentials match
        if ($result->num_rows > 0) 
        {
            session_start(); // Start the session
            // User authenticated successfully, store user ID in session
            $row = $result->fetch_assoc();
            $_SESSION['UserID'] = $row['ID'];
            // Redirect to addblog.html
            header("Location: addEntry.php");
            exit();
        } 
        else 
        {
            // Invalid credentials
            echo "<h1> Invalid email or password. Please try again. </h1>";
            echo "<h2> Redirecting back to the log in page... </h2>";
            header("refresh:5; url=/Project/rathwal-phase2/login.html"); // Redirect after 5 seconds
            exit();
        }

        $conn->close();
    }
?>
    
</body>
</html>