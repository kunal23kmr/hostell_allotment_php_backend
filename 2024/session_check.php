<?php
session_start();

header("Access-Control-Allow-Origin: http://localhost:8000");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
// header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

$response = [];
if (isset($_SESSION['user'])) {
    $response['loggedIn'] = true;
    $response['user'] = $_SESSION['user'];
} else {
    $response['loggedIn'] = false;
}

echo json_encode($response);
exit();
?>