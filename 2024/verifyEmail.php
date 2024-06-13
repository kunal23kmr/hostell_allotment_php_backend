<?php
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
    $email = $data['email'];
    $code = $data['code'];

    // Check if the verification code matches
    $sql_check = "SELECT verification_code FROM users WHERE email = ?";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([$email]);
    $result = $stmt_check->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        if ($result['verification_code'] === $code) {
            // Update the email_verified status
            $sql_update = "UPDATE users SET email_verified = 1 WHERE email = ?";
            $stmt_update = $pdo->prepare($sql_update);
            if ($stmt_update->execute([$email])) {
                http_response_code(200);
                echo json_encode(['status' => 'success', 'message' => 'Email verified successfully.']);
            } else {
                http_response_code(500);
                echo json_encode(['status' => 'error', 'message' => 'Failed to verify email.']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Invalid verification code.']);
        }
    } else {
        http_response_code(404);
        echo json_encode(['status' => 'error', 'message' => 'User not found.']);
    }
}
?>
