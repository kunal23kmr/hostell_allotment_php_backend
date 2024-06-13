<?php
require_once ("db.php");
// include 'cors.php';
header("Access-Control-Allow-Origin: http://localhost:8000");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

require 'mailer.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    error_log(print_r($data, true));

    $roll_number = $data['roll_number'];
    $email = $data['email'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT);

    // Check if the email is already verified
    $sql_check = "SELECT email_verified,verification_code FROM users WHERE email = ?";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([$email]);
    $result = $stmt_check->fetch();

    if ($result) {
        http_response_code(409);
        if ($result['email_verified'] == 1) {
            // Email is already registerd and verified
            echo json_encode(['status' => 'error', 'message' => 'Email is already registered, Please try to login.']);
        } else {
            // Email is already registered but not verified.
            // sendVerificationEmail($email, $result['verification_code']); // Send verification email
            echo json_encode(['status' => 'error', 'message' => 'This email is already registered, first verify your email, then try to login.']);
        }
    } else {
        // Email is not verified, proceed with registration
        try {
            $verification_code = bin2hex(random_bytes(25)); // Generate a random verification code

            $sql = "INSERT INTO users (email, roll_number, password,  verification_code) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$email, $roll_number, $password, $verification_code])) {
                sendVerificationEmail($email, $verification_code); // Send verification email
                http_response_code(200);
                echo json_encode(['status' => 'success', 'message' => 'User registered successfully. Please verify your email.']);
            } else {
                http_response_code(500);
                echo json_encode(['status' => 'error', 'message' => 'User registration failed.']);
            }
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => "Message could not be sent. Mailer Error: {$e}"]);
        }
    }
}

?>