<?php

#CONECCIONES A LA BD
include '../../db-config/database.class.php';
#INSTANCIAMOS LA BD
$db = DataBase::getInstance();
#INCLUIMOS LIBRERIAS NECESARIAS
include '../../lib/functions.php';
if (!empty($_POST)) {
    $id = $_POST['marca']['id'];
    $marca = $_POST['marca']['descripcion'];
    $estado = (!empty($_POST['marca']['estado'])) ? 1 : 0;
    $updateMarca = "UPDATE marca SET  descripcion = '$marca',"
            . "estado = '$estado'"
            . "WHERE id= $id";
    db::getInstance()->exec($updateMarca);
}
header('Location: ' . getUrl() . 'admin/marcas.php');
?>