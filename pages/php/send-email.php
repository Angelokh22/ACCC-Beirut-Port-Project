<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer-master/src/Exception.php';
require '../../PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/src/SMTP.php';

if (isset($_POST["email"])){
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;   
        $mail->Username   = 'emailsenderotp@gmail.com';
        $mail->Password   = 'kkon ibin gwvu jckp'; // Use your App Password here not your password
        $mail->SMTPSecure =  PHPMailer::ENCRYPTION_STARTTLS;; // Use TLS encryption
        $mail->Port       = 587; // Port for TLS encryption

        $mail->setFrom('emailsenderotp@gmail.com', 'ACCC Beirut Port');
        $mail->addAddress($_POST["email"]);
        
        $mail->isHTML(true); 
        $mail->Subject = $_POST["subject"];
        $mail->Body    = $_POST["message"];
        $mail->send();
        echo json_encode(['success' => true, 'message' => 'email sent']);
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo json_encode(['success' => false, 'error' => $mail->ErrorInfo]);
    }
}
?>