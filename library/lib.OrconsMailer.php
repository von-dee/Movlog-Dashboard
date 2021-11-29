<?php

/**
 * Created by PhpStorm.
 * User: Chamamme Andrew
 * Date: 18/7/2018
 * Time: 11:48 AM
 * Orc ons Systems Email Class
 */


require __DIR__.'/../plugins/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
class OrconsMailer  {

    private $mail;
    public $status;
    public function __construct()
    {
        $this->mail =  new PHPMailer(true);
        $this->mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $this->mail->isSMTP();                                      // Set mailer to use SMTP
        $this->mail->Host = 'a2plcpnl0083.prod.iad2.secureserver.net';  // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
        $this->mail->Username = 'xtenzar@orconssystems.com';                 // SMTP username
        $this->mail->Password = 'Kotoo))@@';                           // SMTP password
        $this->mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = 465;
        $this->mail->setFrom("xtenzar@orconssystems.com");
    }


    /**
     * @param array $recipients
     * @param string $subject
     * @param string $message
     * @param array $attachments
     * @param bool $isHTML
     * @return PHPMailer|string
     */
    public function send( $recipients,  $subject,  $message,  $isHTML=false){
        try{
            $this->mail->isHTML($isHTML);
            $this->mail->Subject = $subject;
            $this->mail->Body =$message;
            foreach ($recipients as $key=>$recipient){
                $this->mail->addAddress($recipient);
            }
            $this->mail->send();

        return $this->mail;

        }catch (phpmailerException $exception){
            return $this->status =  false;
        }
    }
    

    public function sendWithAttachment( $recipients,  $subject,  $message, $attachments = [],  $isHTML=false){
        try{
            $this->mail->isHTML($isHTML);
            $this->mail->Subject = $subject;
            $this->mail->Body =$message;
            foreach ($recipients as $key=>$recipient){
                $this->mail->addAddress($recipient);
            }
            foreach ($attachments as $attachment){
                $this->mail->addAttachment($attachment);
            }
            $this->mail->send();

            return $this->mail;

        }catch (phpmailerException $exception){
            return $this->status =  false;
        }
    }

}