<?php
require_once ("db.php");
require 'mailer.php'; 

header("Access-Control-Allow-Origin: http://localhost:8000");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    error_log(print_r($data, true));

    $email = $data['email'] ?? null;

    if ($email === null) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Email is required.']);
        exit;
    }

    // Check if the email exists in the database
    $sql_check = "SELECT verification_code FROM users WHERE email = ?";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([$email]);
    $code = $stmt_check->fetch();

    if ($user) {
        if (sendResetEmail($email, $code)) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'Password reset link has been sent to your email.']);
        } else {
            http_response_code(505);
            echo json_encode(['status' => 'error', 'message' => 'Error sending email.']);
        }
    } else {
        http_response_code(404);
        echo json_encode(['status' => 'error', 'message' => 'Email not found.']);
    }
}

?>