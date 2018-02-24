<?php

/*
 * Archivo utilizado para generar una nueva
 * contraseña
 * Devuelve true or false
 */
ini_set('memory_limit', '16M');
#CONECCIONES A LA BD
include '../../db-config/database.class.php';
#INSTANCIAMOS LA BD
$db = DataBase::getInstance();
#INCLUIMOS LIBRERIAS NECESARIAS
include '../../lib/functions.php';
#Se establece el tipo de contenido a json y la codificación
header('Content-type: application/json; charset=utf-8');
$data = false;
if (!empty($_POST)) {
    $email = input_special($_POST['emailPass']);
    #recuperamos los datos del usuario
    $sqlUser = "SELECT * FROM users WHERE email = '$email'";
    $db->setQuery($sqlUser);
    $user = $db->loadObject();
    #datos a ser enviado por email
    $name = $user->name;
    $user = $user->user;
    #generamos un nuevo string para la contraseña
    $newpass = generateRandomString();
    #actualizamos el campo pass
    $hashedNewPass = crypt_hash($newpass);
    $sqlUpdate = "UPDATE users set pass = '$hashedNewPass' WHERE email = '$email'";
    db::getInstance()->exec($sqlUpdate);
    #enviamos un email con su nuevo pass al usuario
    $destinatario = $email;
    //$destinatario = "raul.chuky@gmail.com";
    $asunto = "Su nueva contraseña - Argor.com.py";
    $cuerpo = ' 
<html> 
<head> 
   <title>Reseteo de Contraseña</title> 
</head> 
<body> 
<h2>Hola '.$name.'</h2>
<p>hemos reseteado tu contraseña para ingresar al admnistrador de <a href="http://argor.com.py/admin">argor.com.py/admin</a>.</p>
<p>Usuario: ' . $user . '</p> 
<p>Nueva Contraseña: ' . $newpass . '</p> 
<p>Email: ' . $email . '</p> 
</body> 
</html> 
';

//para el envío en formato HTML 
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//dirección del remitente 
    $headers .= "From: Argor <administracion@argor.com.py>\r\n";

//dirección de respuesta, si queremos que sea distinta que la del remitente 
    $headers .= "Reply-To: $destinatario\r\n";

//ruta del mensaje desde origen a destino 
    //$headers .= "Return-path: $destinatario\r\n";
//direcciones que recibián copia 
    //$headers .= "Cc: maria@desarrolloweb.com\r\n";
//direcciones que recibirán copia oculta 
    //$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n";

    mail($destinatario, $asunto, $cuerpo, $headers);
    $data = true;
}
echo json_encode($data);
