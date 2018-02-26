<?php
require_once "phpmailer/mail.php";
$obj = new stdClass();

$obj->name = "es el nombre de la persona que recibirá el correo";
$obj->subject = "Contacto web";
$obj->email = "email@hotmail.com";
$obj->body = "body";
$send = sendEmailPhpMailer($obj);

if ($send == 1) {
    $obj->message = "Hemos enviado tu solicitud correctamente, se contactarán contigo pronto";
} else {
    $obj->message = "Ocurrió un error al realizar el proceso.";
}
