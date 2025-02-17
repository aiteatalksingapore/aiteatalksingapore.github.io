<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
try {
    // 配置 SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ranxuming@gmail.com'; // 你的 Gmail
    $mail->Password   = '123rxmRXM'; // 你的应用专用密码
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // 发送邮件
    $mail->setFrom('your-email@gmail.com', 'Your Name');
    $mail->addAddress('recipient@example.com'); 

    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a test email sent via SMTP.';

    $mail->send();
    echo "Email sent successfully.";
} catch (Exception $e) {
    echo "Email failed: {$mail->ErrorInfo}";
}
?>
