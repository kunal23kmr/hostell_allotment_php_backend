<?php
// Example PHP file: data.php

// Simulating database data
$users = [
    ["id" => 1, "name" => "John Doe", "email" => "john@example.com"],
    ["id" => 2, "name" => "Jane Doe", "email" => "jane@example.com"]
];

// Encoding data to JSON format
echo json_encode($users);
?>