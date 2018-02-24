<?php

/*
 * Archivo utilizado para actualizar el contenido de la
 * seccion 3
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
    $id = $_POST['id'];
    //obtenemos la imagen del local a ser eliminada
    $sqlBanner = "SELECT img_local FROM locales WHERE id = $id";
    $db->setQuery($sqlBanner);
    $banner = $db->loadObject();
    #directorio de los banner
    $dir = "../../img/sucursales/";
    #eliminamos el archivo
    unlink($dir . $banner->img_local);
    $deleteItem = "DELETE FROM locales WHERE id = $id";
    db::getInstance()->exec($deleteItem);
    $data = true;
}
echo json_encode($data);
