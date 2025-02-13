<?php
$db_host = "localhost";  // Server host
$db_user = "root";       // Database username
$db_password = "";       // Database password
$db_name = "db_medline";     // Database name

// Create connection
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Create Database 
$sql = "CREATE DATABASE IF NOT EXISTS db_medline";
if($conn->query($sql)=== TRUE){
    echo "Database created successfully";
} else {
    echo "error creating database". $conn->error;
}
$conn->select_db("db_medline");

$sql = "CREATE TABLE IF NOT EXISTS record (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL, message TEXT)";

if($conn->query($sql)===TRUE){
    echo "Table created successfully";
}
else {
    echo "Error creating Table".$conn->error;
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "contact_form_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert into database
    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
