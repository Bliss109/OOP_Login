<?php

require './PhpMailer/src/PHPMailer.php';
require './PhpMailer/src/SMTP.php';
require './PhpMailer/src/Exception.php';

use   PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){
    //Retrieve form data
    $name = $_POST['name'];
    $email = $_POST ['email'];
    $message= $_POST ['message'];

    //Create an instance; passing true enables exceptions
    $mail = new PHPMailer(true);

    try{
        //Server settings
        $mail-> isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail-> Username = 'cindyogutu0@gmail.com';
        $mail->Password = 'hgec hlgl mbwv bbrz';
        $mail-> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //Recipients
        $mail->setFrom($email, $name);                       // Sender's email and name
        $mail->addAddress('cindyogutu0@gmail.com');          // Add a recipient (your email)
        $mail->addReplyTo($email, $name);
        
        // Content
        $mail->isHTML(true);                                 // Set email format to HTML
        $mail->Subject = 'New Contact Message';              // Email subject
        $mail->Body    = "<strong>Name:</strong> $name<br>
                          <strong>Email:</strong> $email<br>
                          <strong>Message:</strong><br>$message"; // Email body// Add a reply-to address
    
     // Send the email
     $mail->send();
     echo "<script>alert('Message sent successfully!'); window.location.href='../index.php';</script>";
    } catch (Exception $e){
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
    }
}
?>
