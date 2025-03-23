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

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "ecs417";
    // Creates connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Checks connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO BLOGPOSTS (title, content, dateAndTime,month)
            VALUES ('$title', '$content', '$formattedDateTime', '$monthName')";

    if ($conn->query($sql) === TRUE) 
    {
        header("Location: /Project/rathwal-phase2/php/viewBlog.php");
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    exit();
} 
?>