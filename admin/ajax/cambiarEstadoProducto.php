<?php

#CONECCIONES A LA BD
include '../../db-config/database.class.php';
#INSTANCIAMOS LA BD
$db = DataBase::getInstance();
#INCLUIMOS LIBRERIAS NECESARIAS
include '../../lib/functions.php';
#Se establece el tipo de contenido a json y la codificación
header('Content-type: application/json; charset=utf-8');
$data = array(
    'type' => FALSE
);
if (!empty($_POST)) {
    $id_producto = $_POST['id_producto'];
    switch ($_POST['estado']) {
        case 1:
            $estado = 0;
            $newEstado = 'Deshabilitado';
            $css = 'danger';
            break;
        case 0:
            $estado = 1;
            $newEstado = 'Activo';
            $css = 'success';
            break;
    }
    $updateEstado = "UPDATE producto SET estado = '$estado'"
            . "WHERE id = $id_producto";
    db::getInstance()->exec($updateEstado);
    $data = array(
        'type' => TRUE,
        'estado' => $newEstado,
        'css' => $css,
        'id_estado' => $estado
    );
}
echo json_encode($data);
