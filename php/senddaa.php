 <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../php/phpmailer/vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['mail']) || empty($_POST['subject']) || empty($_POST['text'])) {
        die("All fields are required.");
    }

   
    $recipientEmail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
    $emailSubject = htmlspecialchars($_POST['subject']);
    $emailMessage = nl2br(htmlspecialchars($_POST['text']));

    if (!filter_var($recipientEmail, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username   = 'jadavdeep560@gmail.com';
        $mail->Password   = 'dlny ybsy rbwl ebsa'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('jadavdeep560@gmail.com', 'Your Name');
        $mail->addAddress($recipientEmail);

        $mail->isHTML(true);
        $mail->Subject = $emailSubject;

        $mail->Body = "
        <h3>Your Submitted Data</h3>
        <p><strong>Email:</strong> $recipientEmail</p>
        <p><strong>Subject:</strong> $emailSubject</p>
        <p><strong>Message:</strong><br> $emailMessage</p>
        ";

        if ($mail->send()) {
            echo "Message sent successfully!";
        }
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?> 