<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // This loads the installed PHPMailer library

function sendVerificationEmail($email, $verification_code)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'kunal24kmr@gmail.com';           // SMTP username
        $mail->Password = 'ajodrbvdxuywikyo';              // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom('no-reply@example.com', 'Mailer');
        $mail->addAddress($email);                            // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Email Verification';
        $mail->Body = "Please click the link below to verify your email for NITJ Hostel allotment:<br><br>";
        $mail->Body .= "<a href='http://localhost:8000/Verify/$verification_code'>Verify Email</a><br><br>";
        $mail->Body .= "If this is not you please ignore this mail.";

        $mail->send();
        return true;
        // echo json_encode(['status' => 'success', 'message' => 'User registered successfully. Please verify your email.']);
        // 'Verification email has been sent';
    } catch (Exception $e) {
        return false;
        // exit(0);
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}



function sendResetEmail($email, $code)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'kunal24kmr@gmail.com';           // SMTP username
        $mail->Password = 'ajodrbvdxuywikyo';              // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        // Recipients

        
        // $mail->setFrom('Kunal', 'NITJ Hostel allotment');
        $mail->setFrom('kunal24kmr@gmail.com', 'NITJ Hostel allotment');
        $mail->addAddress($email);                            // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Password reset';
        $mail->Body = "Please click the link below to change your password for NITJ Hostel allotment (email: $email):<br><br>";
        $mail->Body .= "<a href='http://localhost:8000/NewPassword/$code'>Change password</a><br><br>";
        $mail->Body .= "If this is not you please ignore this mail.";

        $mail->send();
        return true;
        // echo json_encode(['status' => 'success', 'message' => 'User registered successfully. Please verify your email.']);
        // 'Verification email has been sent';
    } catch (Exception $e) {
        return false;
        // exit(0);
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>