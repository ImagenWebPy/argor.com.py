<?php

/*
 * Archivo utilizado para actualizar el contenido de la
 * pagina de contacto
 * Devuelve true or false
 */
#CONECCIONES A LA BD
include '../../db-config/database.class.php';
#INSTANCIAMOS LA BD
$db = DataBase::getInstance();
#INCLUIMOS LIBRERIAS NECESARIAS
include '../../lib/functions.php';
#Se establece el tipo de contenido a json y la codificación
header('Content-type: application/json; charset=utf-8');
$data = false;
if (isset($_POST['id_contacto'])) {
    #Guardamos las variables post
    $id_contacto = $_POST['id_contacto'];
    $titulo_left = input_special($_POST['titulo_left']);
    $titulo_local = input_special($_POST['titulo_local']);
    $direccion_local = input_special($_POST['direccion_local']);
    $telefono_local = input_special($_POST['telefono_local']);
    $email_local = input_special($_POST['email_local']);
    $titulo_horario = input_special($_POST['titulo_horario']);
    $horario_dia = input_special($_POST['horario_dia']);
    $horario_sabados = input_special($_POST['horario_sabados']);
    $horario_info = input_special($_POST['horario_info']);
    $titulo_right = input_special($_POST['titulo_right']);
    $map_latitude = input_special($_POST['map_latitude']);
    $map_longitude = input_special($_POST['map_longitude']);
    $email_formulario = input_special($_POST['email_formulario']);
    $email_cv = input_special($_POST['email_cv']);
    #REALIZAMOS EL UPDATE
    $updateContacto = "UPDATE contacto SET titulo_left = '$titulo_left',"
            . "titulo_local = '$titulo_local',"
            . "direccion_local = '$direccion_local',"
            . "telefono_local = '$telefono_local',"
            . "email_local = '$email_local',"
            . "titulo_horario = '$titulo_horario',"
            . "horario_dia = '$horario_dia',"
            . "horario_sabados = '$horario_sabados',"
            . "horario_info = '$horario_info',"
            . "titulo_right = '$titulo_right',"
            . "map_latitude = '$map_latitude',"
            . "map_longitude = '$map_longitude',"
            . "email_formulario = '$email_formulario',"
            . "email_cv = '$email_cv'"
            . "WHERE id = $id_contacto";
    db::getInstance()->exec($updateContacto);
    $data = true;
}
echo json_encode($data);
