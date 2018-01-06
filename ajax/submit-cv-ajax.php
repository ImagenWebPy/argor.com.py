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
    #obtenemos todos los demas datos de la categoria
    $nombre_cv = input_special($_POST['cv-name']);
    $telefono_local = input_special($_POST['cv-telephone']);
    $mensaje = input_special($_POST['cv-message']);
    $email = input_special($_POST['cv-email']);
    if (!empty($_FILES["cv-file"]["name"])) {
        #subimos la nueva imagen
        $file = $_FILES["cv-file"];
        $nombre = limpiar($file["name"]);
        $tipo = $file["type"];
        $ruta_provisional = $file["tmp_name"];
        $size = $file["size"];
        $dimensiones = getimagesize($ruta_provisional);
        $width = $dimensiones[0];
        $height = $dimensiones[1];
        $carpeta = "../archivos/";
        if ($tipo != 'application/pdf' && $tipo != 'application/msword' && $tipo != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' && $tipo != 'application/rtf') {
            echo "Error, no es un tipo de archivo permitido";
        } else if ($size > 2048 * 2048) {
            echo "Error, el tamaño máximo permitido son 2MB";
        } else {
            $src = $carpeta . $nombre;
            move_uploaded_file($ruta_provisional, $src);
        }
        #INSERTAMOS
        $insertCV = "INSERT INTO cv (nombre, email, telefono, mensaje) VALUES ('$nombre_cv',"
                . "'$email',"
                . "'$telefono_local',"
                . "'$mensaje')";
        db::getInstance()->exec($insertCV);
        $last_id = db::getInstance()->lastInsertId();
        #insertamos en la BD la nueva imagen
        if (!empty($nombre)) {
            $updateCV = "UPDATE cv SET archivo = '$nombre'"
                    . "WHERE id = $last_id";
            db::getInstance()->exec($updateCV);
        }
        $sqlContacto = "SELECT * FROM contacto WHERE id = 1";
        $db->setQuery($sqlContacto);
        $contact = $db->loadObject();
        #
        $email_destino = $contact->email_cv;
        $destinatario = $email_destino;
        //$destinatario = "raul.chuky@gmail.com";
        $asunto = "Mensaje enviado desde el sitio web";
        $cuerpo = ' 
<html> 
<head> 
   <title>Mail de CV</title> 
</head> 
<body> 
<h1>Se ha adjuntado un nuevo CV desde el sitio Web!</h1> 
<p>Nombre: ' . $nombre_cv . '</p> 
<p>Teléfono: ' . $telefono_local . '</p> 
<p>Email: ' . $email . '</p> 
<p>Mensaje: ' . $mensaje . '</p> 
</body> 
</html> 
';

//para el envío en formato HTML 
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//dirección del remitente 
        $headers .= "From: $nombre_cv <$email>\r\n";

//dirección de respuesta, si queremos que sea distinta que la del remitente 
        $headers .= "Reply-To: $destinatario\r\n";

//ruta del mensaje desde origen a destino 
        //$headers .= "Return-path: $destinatario\r\n";
//direcciones que recibián copia 
        //$headers .= "Cc: maria@desarrolloweb.com\r\n";
//direcciones que recibirán copia oculta 
        //$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n";

        mail($destinatario, $asunto, $cuerpo, $headers);
        $_SESSION['DATA'] = true;
    }
}
header('Location:' . getUrl() . 'trabaja-con-nosotros.php');
