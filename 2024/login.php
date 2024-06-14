<?php
session_start();
require_once ("db.php");
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

    $email = $data['email'];
    $password = $data['password'];

    // Check if the user exists and is verified
    $sql_check = "SELECT * FROM users WHERE email = ?";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([$email]);
    $result = $stmt_check->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        if ($result['email_verified'] == 1) {
            if (password_verify($password, $result['password'])) {
                // Password is correct, set session variables
                $_SESSION['user'] = [
                    'email' => $result['email'],
                    'roll_number' => $result['roll_number'],
                ];

                // Remove sensitive data before returning the user info
                unset($result['password']);
                unset($result['verification_code']);

                http_response_code(200);
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Login successful',
                    'user' => $result
                ]);
            } else {
                http_response_code(401);
                echo json_encode(['status' => 'error', 'message' => 'Incorrect password']);
            }
        } else {
            http_response_code(403);
            echo json_encode(['status' => 'error', 'message' => 'Email not verified. Please verify your email.']);
        }
    } else {
        http_response_code(404);
        echo json_encode(['status' => 'error', 'message' => 'User not found']);
    }
}

// session_start();
// if (!isset($_SESSION['user'])) {
// http_response_code(401);
// echo json_encode(['status' => 'error', 'message' => 'Unauthorized access']);
// exit();
// }

// Your protected resource code here
// echo json_encode(['status' => 'success', 'message' => 'Authorized access', 'user' => $_SESSION['user']]);
// 
?>