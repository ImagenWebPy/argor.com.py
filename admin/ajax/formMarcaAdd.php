<?php

#CONECCIONES A LA BD
include '../../db-config/database.class.php';
#INSTANCIAMOS LA BD
$db = DataBase::getInstance();
#INCLUIMOS LIBRERIAS NECESARIAS
include '../../lib/functions.php';
if (!empty($_POST)) {
    $marca = $_POST['marca']['descripcion'];
    $estado = (!empty($_POST['marca']['estado'])) ? 1 : 0;
    $insertMarca = "INSERT INTO marca (descripcion, estado) VALUES "
            . "('$marca',"
            . "'$estado')";
    db::getInstance()->exec(str_replace('&#39;', '', $insertMarca));
}
header('Location: ' . getUrl() . 'admin/marcas.php');
?>