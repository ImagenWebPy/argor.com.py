<?php

/*
 * Archivo utilizado para actualizar las
 * redes sociales
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
if (!empty($_POST)) {
    $id_red = $_POST['id_red'];
    $enlace = $_POST['enlace'];
    if (!empty($_POST['mostrar'])) {
        $mostrar = 1;
    } else {
        $mostrar = 0;
    }
    $updateRed = "UPDATE redes_sociales SET url = '$enlace',"
            . "mostrar = '$mostrar'"
            . "WHERE id = $id_red";
    db::getInstance()->exec($updateRed);
    $data = true;
}
echo json_encode($data);
