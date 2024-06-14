<?php
session_start();
header("Access-Control-Allow-Origin: http://localhost:8000");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}
session_unset();
session_destroy();
echo json_encode(['status' => 'success', 'message' => 'Logged out successfully']);
?>