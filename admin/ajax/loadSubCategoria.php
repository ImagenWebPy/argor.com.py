<?php

#Se establece el tipo de contenido a json y la codificación
header('Content-type: application/json; charset=utf-8');
#CONECCIONES A LA BD
include '../../db-config/database.class.php';
#INSTANCIAMOS LA BD
$db = DataBase::getInstance();
#INCLUIMOS LIBRERIAS NECESARIAS
include '../../lib/functions.php';
$option = '';
if (!empty($_POST)) {
    $idPadre = $_POST['idPadre'];
    #Categorias Hijas
    $sqlCategoriasHijas = "select c.id, c.descripcion, c.padre_id from categoria c where c.padre_id = $idPadre";
    $db->setQuery($sqlCategoriasHijas);
    $categoriaHija = $db->loadObjectList();
    foreach ($categoriaHija as $item) {
        $option .= '<option value="' . $item->id . '">' . utf8_encode($item->descripcion) . '</option>';
    }
}
echo json_encode($option);

