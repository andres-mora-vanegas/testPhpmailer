<?php

require_once("class.phpmailer.php");
require_once("class.smtp.php");

/**
 * función que envía el email, solicita los parametros, regresa un true o false:
 * 
 * @param type $obj->name =es el nombre de la persona que recibirá el correo
 * @param type $obj->subject= es el asunto del correo
 * @param type $obj->email = es el correo de la persona que recibirá el correo
 * @param type $obj->body = mensaje a enviar
 * @return int state = El estado del envío
 */

function sendEmailPhpMailer($obj) {

    $mail = new PHPMailer;    

    try {
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->Port = "587";
        $mail->SMTPAuth = "true";
        $mail->SMTPSecure = "tls";
        $mail->SMTPDebug = 0;
        $mail->CharSet = 'UTF-8';
        $mail->Body = $obj->body;
        $mail->From = "email@gmail.com";
        $mail->FromName = "remitente";
        $mail->Subject = $obj->subject . " - " . $obj->name;
        $mail->AddReplyTo($obj->email, $obj->name);
        $mail->AddAddress($obj->email, $obj->name);
        $mail->Username = "email@gmail.com";
        $mail->Password = "password";
        $mail->IsHTML(true);
        $mail->Send();
        $obj->statex = true;
    } catch (phpmailerException $e) {
        $obj->statex = false;
        $state = $e->errorMessage(); //Pretty error messages from PHPMailer
    } catch (Exception $e) {
        $state = $e->getMessage(); //Boring error messages from anything else!
        $obj->statex = false;
    }

    return $obj->statex;
}

?>