<?php

namespace Compo\Admin\Auth;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailSender
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->configure();
    }

    private function configure()
    {
        $mailConfig = $GLOBALS['config']['mail'];
        $this->mail->isSMTP();
        $this->mail->Host = $mailConfig['host'];
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $mailConfig['username'];
        $this->mail->Password = $mailConfig['password'];
        $this->mail->SMTPSecure = $mailConfig['smtp_secure'];
        $this->mail->Port = $mailConfig['port'];

        $this->mail->setFrom($mailConfig['username'], 'Mailer');
        $this->mail->isHTML(true);
    }


    public function sendResetEmail($toEmail, $token)
    {
        $this->mail->addAddress($toEmail);
        $this->mail->Subject = 'Reset Your Password';
        $this->mail->Body    = 'Please click on the following link to reset your password: <a href="http://localhost/cms/CMS-Compo/admin/reset.php?token=' . urlencode($token) . '">Reset Password</a>';

        try {
            $this->mail->send();
          return true;
        } catch (Exception $e) {
            return 'Message could not be sent. Mailer Error: ' . $this->mail->ErrorInfo;
        }
    }
}
