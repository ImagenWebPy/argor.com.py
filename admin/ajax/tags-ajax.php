<?php

/*
 * Archivo utilizado para actualizar/agregar el contenido de los
 * remates
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
    $accion = $_POST['accion'];
    switch ($accion) {
        case 'agregar':
            $descripcion = $_POST['descripcion'];
            if (!empty($_POST['mostrar'])) {
                $mostrar = 1;
            } else {
                $mostrar = 0;
            }
            $insertTag = "INSERT INTO tags (descripcion, mostrar) values('$descripcion','$mostrar')";
            db::getInstance()->exec($insertTag);
            $data = true;
            break;
        case 'editar':
            $id_tag = $_POST['id_tag'];
            $descripcion = $_POST['descripcion'];
            if (!empty($_POST['mostrar'])) {
                $mostrar = 1;
            } else {
                $mostrar = 0;
            }
            $updateTag = "UPDATE tags SET descripcion = '$descripcion',"
                    . "mostrar = '$mostrar'"
                    . "WHERE id = $id_tag";
            db::getInstance()->exec($updateTag);
            $data = true;
            break;
        case 'eliminar':
            $id = $_POST['id'];
            $deleteItem = "DELETE FROM tags WHERE id = $id";
            db::getInstance()->exec($deleteItem);
            $data = true;
            break;
    }
}
echo json_encode($data);
