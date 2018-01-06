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
if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    switch ($accion) {
        case 'editar':
            $id = $_POST['id'];
            $item = $_POST['item'];
            $updateItem = "UPDATE section_3_lista SET descripcion = '$item'"
                    . "WHERE id = $id";
            db::getInstance()->exec($updateItem);
            $data = true;
            break;
        case 'agregar':
            $itemAdd = $_POST['item'];
            $insertItem = "INSERT INTO section_3_lista (descripcion) VALUES ('$itemAdd')";
            $db->setQuery($insertItem);
            $db->alter();
            $data = true;
            break;
        case 'eliminar':
            $id = $_POST['id'];
            $deleteItem = "DELETE FROM section_3_lista WHERE id = $id";
            db::getInstance()->exec($deleteItem);
            $data = true;
            break;
    }
}
echo json_encode($data);
