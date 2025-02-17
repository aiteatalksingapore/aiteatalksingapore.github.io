<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mail = new PHPMailer(true);

        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Gmail SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'ranxuming@gmail.com'; // Your Gmail address
            $mail->Password   = 'zqcgdgllzviwvzrg'; // Your Gmail app-specific password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Email settings
            $mail->setFrom('ranxuming@gmail.com', 'AI-TeaTalkSG Subscription');
            $mail->addAddress('ai-teatalksg+subscribe@googlegroups.com'); // Google Group subscription address

            // Email content
            $mail->Subject = 'Subscribe';
            $mail->Body    = "Please subscribe me to AI-TeaTalkSG Google Group. My email: $email";

            $mail->send();
            echo "Subscription request sent! Please check your email to confirm.";
        } catch (Exception $e) {
            echo "Failed to send subscription request. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "Invalid request method.";
}
?>
