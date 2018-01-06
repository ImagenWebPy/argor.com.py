<?php

/*
 * Archivo utilizado para subir los cv
 * desde la web
 * Devuelve true or false
 */
session_start();
ini_set('memory_limit', '16M');
#CONECCIONES A LA BD
include '../db-config/database.class.php';
#INSTANCIAMOS LA BD
$db = DataBase::getInstance();
#INCLUIMOS LIBRERIAS NECESARIAS
include '../lib/functions.php';
#Se establece el tipo de contenido a json y la codificación
header('Content-type: application/json; charset=utf-8');
$_SESSION['DATA'] = false;
if (!empty($_POST)) {
    $captchaForm = cleanInput($_POST['contact-captcha']);
    $captchaImage = $_SESSION['digit'];
    #datos del formulario
    $nombre = cleanInput($_POST['contact-name']);
    $email = cleanInput($_POST['contact-email']);
    $asunto = cleanInput($_POST['contact-subject']);
    $mensaje = cleanInput($_POST['contact-message']);
    #guardamos los datos ingresados en una session
    $_SESSION['formData'] = array(
        'nombre' => $nombre,
        'email' => $email,
        'asunto' => $asunto,
        'mensaje' => $mensaje,
        'codigo' => $captchaForm
    );
    #si el captcha ingresado no es igual retornamos el error
    if ($captchaImage == $captchaForm) {
        $sqlContacto = "SELECT * FROM contacto WHERE id = 1";
        $db->setQuery($sqlContacto);
        $contact = $db->loadObject();
        #

        $email_destino = $contact->email_destino;

        $destinatario = $email_destino;
        //$destinatario = "raul.chuky@gmail.com";
        $asunto = "Mensaje enviado desde el sitio web";
        $cuerpo = ' 
<html> 
<head> 
   <title>Mail de Contacto</title> 
</head> 
<body> 
<h1>Mensaje enviado desde el sitio web!</h1> 
<p>Nombre: ' . $nombre . '</p> 
<p>Email: ' . $email . '</p> 
<p>Asunto: ' . $asunto . '</p> 
<p>Mensaje: ' . $mensaje . '</p> 
</body> 
</html> 
';

//para el envío en formato HTML 
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//dirección del remitente 
        $headers .= "From: $nombre <$email>\r\n";

//dirección de respuesta, si queremos que sea distinta que la del remitente 
        $headers .= "Reply-To: $destinatario\r\n";

//ruta del mensaje desde origen a destino 
        //$headers .= "Return-path: $destinatario\r\n";
//direcciones que recibián copia 
        //$headers .= "Cc: maria@desarrolloweb.com\r\n";
//direcciones que recibirán copia oculta 
        //$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n";

        mail($destinatario, $asunto, $cuerpo, $headers);
        $message = array(
            'type' => 'success',
            'mensaje' => 'El mensaje se ha enviado correctamente'
        );
    } else {
        $message = array(
            'type' => 'error',
            'mensaje' => 'El captcha (código) ingresado no coincide con la imagen'
        );
    }
}
$_SESSION['message'] = $message;
header('Location:' . getUrl() . 'contacto.php');
