<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Email extends LBase
{
    public function sendmail($data)
    {
        $mail = new PHPMailer;
        $mail = $this->getmailconfig($mail);
        $mail->From = "staff@fancygrocery.com";
        $mail->FromName = "Fancy Grocery";
        $mail->addAddress($data['email'], $data['name']);
        $mail->isHTML(true);
        $mail->Subject = "Order Created";
        $mail->Body = "Address: ".$data['address'] ?? '';
        if (!$mail->send()) {
            return $mail->ErrorInfo;
        } else {
            return true;
        }
    }

    private function getmailconfig($mail)
    {
        //Enable SMTP debugging.
        $mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '72eaa0d47dff07';
        $mail->Password = 'bf9fffa49f6efd';
        return $mail;
    }
}