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
if (isset($_POST['id'])) {
    #Guardamos las variables post
    $id = $_POST['id'];
    $contenido = input_special($_POST['contenido']);
    $encabezado = input_special($_POST['encabezado']);
    #REALIZAMOS EL UPDATE
    $updateTrabaja = "UPDATE trabaja_con_nosotros SET contenido = '$contenido',"
            . "encabezado = '$encabezado'"
            . "WHERE id = $id";
    db::getInstance()->exec($updateTrabaja);
    $data = true;
}
echo json_encode($data);
