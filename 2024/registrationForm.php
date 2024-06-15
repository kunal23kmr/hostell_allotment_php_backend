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

    // Ensure the user is logged in
    if (!isset($_SESSION['user'])) {
        http_response_code(401);
        echo json_encode(['status' => 'error', 'message' => 'Unauthorized access']);
        exit();
    }

    // Get form data
    $formData = json_decode(file_get_contents('php://input'), true);
    error_log(print_r($formData, true));

    // Get email from session
    $email = $_SESSION['user']['email'];

    // Get data from form
    $name = $formData['name'];
    $roll_number = $formData['roll_number'];//registration_number
    $registration_number = $formData['registration_number'];
    $father = $formData['father'];
    $mother = $formData['mother'];
    $branch = $formData['branch'];
    $physically_handicapped = $formData['physically_handicapped'];
    $blood_group = $formData['blood_group'];
    $gender = $formData['gender'];
    $official_email = $formData['official_email'];
    $self_mob_no = $formData['self_mob_no'];
    $father_mob_no = $formData['father_mob_no'];
    $mother_mob_no = $formData['mother_mob_no'];
    $sibling_mob_no = $formData['sibling_mob_no'];
    $address = $formData['address'];
    $state = $formData['state'];
    $local_guardian_address = $formData['local_guardian_address'];

    try {
        // Check if the user exists
        $sql_check = "SELECT * FROM users WHERE email = ?";
        $stmt_check = $pdo->prepare($sql_check);
        $stmt_check->execute([$email]);
        $result = $stmt_check->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Update user information
            $sql_update = "UPDATE users SET 
                            name = ?, 
                            roll_number = ?, 
                            father = ?, 
                            mother = ?, 
                            branch = ?, 
                            physically_handicapped = ?, 
                            blood_group = ?, 
                            gender = ?, 
                            official_email = ?, 
                            self_mob_no = ?, 
                            father_mob_no = ?, 
                            mother_mob_no = ?, 
                            sibling_mob_no = ?, 
                            address = ?, 
                            state = ?, 
                            local_guardian_address = ?,
                            registration_number =?
                          WHERE email = ?";
            $stmt_update = $pdo->prepare($sql_update);
            if (
                $stmt_update->execute([
                    $name,
                    $roll_number,
                    $father,
                    $mother,
                    $branch,
                    $physically_handicapped,
                    $blood_group,
                    $gender,
                    $official_email,
                    $self_mob_no,
                    $father_mob_no,
                    $mother_mob_no,
                    $sibling_mob_no,
                    $address,
                    $state,
                    $local_guardian_address,
                    $registration_number,
                    $email
                ])
            ) {
                http_response_code(200);
                echo json_encode(['status' => 'success', 'message' => 'User information updated successfully']);
            } else {
                http_response_code(500);
                echo json_encode(['status' => 'error', 'message' => 'Error submitting form. Server error']);
            }
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'User not found']);
        }
    } catch (PDOException $e) {
        error_log('Database error: ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
}
?>