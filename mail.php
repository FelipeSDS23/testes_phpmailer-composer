<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    class Mail {
        
        public static function sendMail($from, $to, $subject, $message) {

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = getenv('SMTP_HOST');                    //Set the SMTP server to send through
                $mail->SMTPAuth   = getenv('SMTP_SECURE');                  //Enable SMTP authentication
                $mail->Username   = getenv('TRANSPORT_AUTH_USER');          //SMTP username
                $mail->Password   = getenv('TRANSPORT_AUTH_PASS');          //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = getenv('SMTP_PORT');                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom($from, 'My php app');
                $mail->addAddress($to);                                     //Add a recipient


                //Content
                $mail->isHTML(true);                                        //Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $message;

                $mail->send();
                header('Location: '. 'http://localhost/testes_php_mailer/src/index.php?returnMsg=Message has been sent&status=sucess');
            } catch (Exception $e) {
                header('Location: '. 'http://localhost/testes_php_mailer/src/index.php?returnMsg=Message could not be sent&status=error');
            }
        }

    }