<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = 'ai-teatalksg+subscribe@googlegroups.com';
        $subject = 'Subscribe';
        $message = 'Please subscribe me to the Google Group.';
        $headers = 'From: ' . $email . "\r\n" .
                   'Reply-To: ' . $email . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            echo "Subscription request sent successfully.";
        } else {
            echo "Failed to send subscription request.";
            error_log("Mail function failed. Check server email configuration.");
        }
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "Invalid request method.";
}
?> 
