<?php

#Se establece el tipo de contenido a json y la codificación
header('Content-type: application/json; charset=utf-8');
#CONECCIONES A LA BD
include '../../db-config/database.class.php';
#INSTANCIAMOS LA BD
$db = DataBase::getInstance();
#INCLUIMOS LIBRERIAS NECESARIAS
include '../../lib/functions.php';
$data = FALSE;
if (!empty($_POST)) {
    $id_cv = $_POST['id_cv'];
    try {
        $update = "UPDATE cv SET oculto = 1 WHERE id = $id_cv";
        db::getInstance()->exec($update);
        $data = TRUE;
    } catch (Exception $exc) {
        $data = FALSE;
    }
}
echo json_encode($data);

