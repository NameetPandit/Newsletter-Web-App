<?php
include("database.php");
// Include PHPMailer classes
require 'PHPMailer-master\PHPMailer-master\src\PHPMailer.php';
require 'PHPMailer-master\PHPMailer-master\src\SMTP.php';
require 'PHPMailer-master\PHPMailer-master\src\Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// Fetch all subscribers
$sql = "SELECT email FROM subscribers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'panditnameet41@gmail.com'; // Replace with your email
        $mail->Password = 'wkjpwqwqpbchfebm'; // Replace with your password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Sender and recipients
        $mail->setFrom('panditnameet41@gmail.com', 'Newsletter');
        while ($row = $result->fetch_assoc()) {
            $mail->addBCC($row['email']);
        }

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your Weekly Newsletter';
        $mail->Body    = '<h1>Newsletter</h1><p>Thank you, yet again for subscribing to our newsletter!</p>';

        $mail->send();
        echo "Newsletter sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "No subscribers found.";
}

$conn->close();
?>
