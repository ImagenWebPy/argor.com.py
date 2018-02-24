<?php

ini_set('memory_limit', '16M');
#CONECCIONES A LA BD
include '../../db-config/database.class.php';
#INSTANCIAMOS LA BD
$db = DataBase::getInstance();
#INCLUIMOS LIBRERIAS NECESARIAS
include '../../lib/functions.php';
define('UPLOAD_IMAGE', '../../img/productos/');
if (!empty($_POST)) {
    $images = '';
    if (!empty($_FILES['upload_file']['name'])) {
        for ($i = 0; $i < count($_FILES['upload_file']['name']); $i++) {
            $uploadfile = $_FILES["upload_file"]["tmp_name"][$i];
            $folder = UPLOAD_IMAGE;
            move_uploaded_file($_FILES["upload_file"]["tmp_name"][$i], $folder . $_FILES["upload_file"]["name"][$i]);
        }
        $images = implode('|', $_FILES['upload_file']['name']);
    }
    $idCategoria = $_POST['producto']['categoria'];
    $idSubCategoria = $_POST['producto']['subcategoria'];
    $marca = $_POST['producto']['marca'];
    $nombre = $_POST['producto']['nombre'];
    $id_moneda = $_POST['producto']['moneda'];
    $precio = str_replace('.', '', $_POST['producto']['precio']);
    $precio_oferta = str_replace('.', '', $_POST['producto']['precio_oferta']);
    $stock = str_replace('.', '', $_POST['producto']['stock']);
    $codigo = $_POST['producto']['codigo'];
    $estado = (!empty($_POST['producto']['estado'])) ? 1 : 0;
    $nuevo = (!empty($_POST['producto']['nuevo'])) ? 1 : 0;
    $descripcion = $_POST['producto']['descripcion'];
    $contenido = $_POST['producto']['contenido'];
    $tags = $_POST['producto']['tags'];
    $id_local = $_POST['producto']['local'];
    $id = $_POST['producto']['id'];
    #obtenemos las imagenes de la BD
    $sqlLocales = "select imagen from producto where id = $id";
    $db->setQuery($sqlLocales);
    $imagen = $db->loadObject();
    if (!empty($images)) {
        $img = $imagen->imagen . '|' . $images;
    } else {
        $img = $imagen->imagen;
    }
    $updateProducto = "UPDATE producto SET  id_categoria = '$idSubCategoria',"
            . "id_marca = '$marca',"
            . "codigo = '$codigo',"
            . "nombre = '$nombre',"
            . "descripcion = '$descripcion',"
            . "contenido = '$contenido',"
            . "imagen = '$img',"
            . "id_moneda = '$id_moneda',"
            . "precio = '$precio',"
            . "precio_oferta = '$precio_oferta',"
            . "stock = '$stock',"
            . "tags = '$tags',"
            . "nuevo = $nuevo,"
            . "estado = '$estado',"
            . "id_local = '$id_local'"
            . "WHERE id= $id";
    db::getInstance()->exec($updateProducto);
}
header('Location: ' . getUrl() . 'admin/productos.php');
?>