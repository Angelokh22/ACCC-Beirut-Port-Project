<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer-master/src/Exception.php';
require '../../PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/src/SMTP.php';


function send_mail($to, $subject, $body) {
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
        $mail->addAddress($to);
        
        $mail->isHTML(true); 
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->send();
        echo json_encode(['success' => true, 'message' => 'email sent']);
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo json_encode(['success' => false, 'error' => $mail->ErrorInfo]);
    }
}
?>