<?php

// // Connect to server and select database.
// $con = mysqli_connect("localhost", "u267843737_hostel", "Hostel@123", "u267843737_hostel") or die(mysqli_connect_error());


// Database connection settings
$host = 'localhost';
$dbname = 'u267843737_hostel';
$username = 'u267843737_hostel';
$password = 'Hostel@123';

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // If connection fails, handle the exception
    echo "Connection failed: " . $e->getMessage();
}


?>