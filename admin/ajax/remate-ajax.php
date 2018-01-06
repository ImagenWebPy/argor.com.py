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
            $titulo = $_POST['titulo'];
            $fecha_remate = date('Y-m-d', strtotime($_POST['fecha_remate']));
            $contenido = $_POST['contenido'];
            if (!empty($_POST['mostrar'])) {
                $mostrar = 1;
            } else {
                $mostrar = 0;
            }
            $fecha = date('Y-m-d H:i:s');
            $insertRemate = "INSERT INTO remate (titulo, fecha_remate, contenido, fecha, mostrar) values('$titulo','$fecha_remate','$contenido','$fecha','$mostrar')";
            db::getInstance()->exec($insertRemate);
            $data = true;
            break;
        case 'editar':
            $id_remate = $_POST['id_remate'];
            $titulo = $_POST['titulo'];
            $fecha_remate = date('Y-m-d', strtotime($_POST['fecha_remate']));
            $contenido = $_POST['contenido'];
            if (!empty($_POST['mostrar'])) {
                $mostrar = 1;
            } else {
                $mostrar = 0;
            }
            $fecha = date('Y-m-d H:i:s');
            $updateRemate = "UPDATE remate SET titulo = '$titulo',"
                    . "fecha_remate = '$fecha_remate',"
                    . "contenido = '$contenido',"
                    . "mostrar = '$mostrar'"
                    . "WHERE id = $id_remate";
            db::getInstance()->exec($updateRemate);
            $data = true;
            break;
        case 'eliminar':
            $id = $_POST['id'];
            $deleteItem = "DELETE FROM remate WHERE id = $id";
            db::getInstance()->exec($deleteItem);
            $data = true;
            break;
    }
}
echo json_encode($data);
