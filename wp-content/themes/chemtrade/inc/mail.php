<?php
    // if (isset($_POST)){
    //     $EmailAddress = trim($_POST['EmailAddress']);
    //     $adminemail = trim($_POST['adminemail']);
    //     $username = trim($_POST['username']);
    //     $password = trim($_POST['password']);
    //     $mail_subject = trim($_POST['mail_subject']);
    //     $mail_body = trim($_POST['mail_body']);
    // }
    // $error = '';
    
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;

    // require 'PHPMailer/src/Exception.php';
    // require 'PHPMailer/src/PHPMailer.php';
    // require 'PHPMailer/src/SMTP.php';

    // $mail = new PHPMailer(true);
    // if ($EmailAddress == ""){
    //     $error .= "<li>Please enter email address.</li>";
    // } 
    // else if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $EmailAddress)){
    //     $error .= '<li>Enter a valid email.</li>';
    // }
    // if ($error == ""){

    //     try {
    //         // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    //         $mail->SMTPDebug = 0;
    //         $mail->isSMTP();
    //         $mail->Host       = 'smtp.gmail.com';
    //         $mail->SMTPAuth   = true;
    //         $mail->Username   = $username;
    //         $mail->Password   = $password;
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    //         $mail->Port       = 465;

    //         //Recipients
    //         $mail->setFrom($username, 'Admin');
    //         $mail->addAddress($adminemail, 'Admin');

    //         //Content
    //         $mail->isHTML(true);
    //         $mail->Subject = $mail_subject;
    //         $mail->Body    = $mail_body.'<b>'.$EmailAddress.'</b>';
    //         $mail->send();
    //         echo '1';
    //     } catch (Exception $e) {
    //         echo '0';
    //     }
    // }
    // else{
    //     echo '2';
    // }
    

?>