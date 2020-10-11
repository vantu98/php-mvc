<?php

namespace Core;

use App\Config;
use PDOException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Mail
{
    public static function create()
    {
        $mail = new PHPMailer(true);

        //Serve Settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = Config::MAIL_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = Config::MAIL_USERNAME;
        $mail->Password = Config::MAIL_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        return $mail;
    }

    public static function sendMail($user_email)
    {
        $mail = static::create();
        //Recipients
        $mail->setFrom(Config::MAIL_USERNAME, 'Mailer');
        $mail->addAddress($user_email, ' User');     // Add a recipient
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        try {
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (PDOException $e) {
            echo $e->getMessage() . "Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
