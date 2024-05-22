<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $youEmail = $_POST['youEmail'];
    $authCode = rand(100000, 999999);

    session_start();
    $_SESSION['authCode'] = $authCode;

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // SMTP 서버 주소
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@example.com'; // SMTP 사용자명
        $mail->Password = 'your-email-password'; // SMTP 비밀번호
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('your-email@example.com', 'Mailer');
        $mail->addAddress($youEmail);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your Authentication Code';
        $mail->Body    = "Your authentication code is: $authCode";

        $mail->send();
        echo json_encode(['result' => 'success']);
    } catch (Exception $e) {
        echo json_encode(['result' => 'fail', 'error' => $mail->ErrorInfo]);
    }
}
?>
