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
    error_log(print_r($data, true));

    $email = $data['email'] ?? null;
    $new_password = $data['password'] ?? null;
    $verification_code = $data['code'] ?? null;

    if (!$email || !$new_password || !$verification_code) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Email, verification code, and new password are required.']);
        exit;
    }

    // Verify the email and code
    $sql_check = "SELECT email FROM users WHERE email = ? AND verification_code = ?";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([$email, $verification_code]);
    $user = $stmt_check->fetch();

    if ($user) {
        // Update the user's password and reset the verification code
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $new_verification_code = bin2hex(random_bytes(25)); // Generate a random verification code

        $sql_update = "UPDATE users SET password = ?, verification_code = ? WHERE email = ? AND verification_code = ?";
        $stmt_update = $pdo->prepare($sql_update);
        if ($stmt_update->execute([$hashed_password, $new_verification_code, $email, $verification_code])) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'Password has been reset successfully.']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Failed to reset password.']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Invalid email or verification code.']);
    }
}
?>