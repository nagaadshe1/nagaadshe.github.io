<?php
// Replace with your database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'my form';

// Establish a database connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert the form data into the 'users' table
    $sql = "INSERT INTO users (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Form data has been stored in the database successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    // Close the database connection
    $mysqli->close();
}
?>
