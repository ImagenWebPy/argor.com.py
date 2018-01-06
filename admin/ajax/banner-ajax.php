<?php

/*
 * Archivo utilizado para actualizar el contenido de los
 * banners
 * Devuelve true or false
 */
ini_set('memory_limit', '16M');
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
    $id = $_POST['idBanner'];
    if (!empty($_FILES["img_slider"]['name'])) {
        //obtenemos la imagen del banner a ser eliminada
        $sqlBanner = "SELECT img FROM banner WHERE id = $id";
        $db->setQuery($sqlBanner);
        $banner = $db->loadObject();
        #directorio de los banner
        $dir = "../../img/slider/";
        #eliminamos el archivo
        unlink($dir . $banner->img);
        #subimos la nueva imagen
        $file = $_FILES["img_slider"];
        $nombre = limpiar($file["name"]);
        $tipo = $file["type"];
        $ruta_provisional = $file["tmp_name"];
        $tmp_name = $ruta_provisional;
        $size = $file["size"];
        $dimensiones = getimagesize($ruta_provisional);
        $width = $dimensiones[0];
        $height = $dimensiones[1];
        $carpeta = "../../img/slider/";
        if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif') {
            echo "Error, el archivo no es una imagen";
        } else if ($size > 2048 * 2048) {
            echo "Error, el tamaño máximo permitido son 2MB";
        } else {
            $src = $carpeta . $nombre;
            move_uploaded_file($ruta_provisional, $src);
//            $max_upload_width = $width;
//            $max_upload_height = $height;
//            // if uploaded image was JPG/JPEG
//            if ($type == "image/jpeg" || $type == "image/pjpeg") {
//                $image_source = imagecreatefromjpeg($tmp_name);
//            }
//            // if uploaded image was GIF
//            if ($type == "image/gif") {
//                $image_source = imagecreatefromgif($tmp_name);
//            }
//            // BMP doesn't seem to be supported so remove it form above image type test (reject bmps)	
//            // if uploaded image was BMP
//            if ($type == "image/bmp") {
//                $image_source = imagecreatefromwbmp($tmp_name);
//            }
//            // if uploaded image was PNG
//            if ($type == "image/x-png") {
//                $image_source = imagecreatefrompng($tmp_name);
//            }
//
//            $remote_file = $carpeta . limpia_espacios(limpiar($nombre));
//            imagejpeg($image_source, $remote_file, 70);
//            chmod($remote_file, 0644);
//
//            // get width and height of original image
//            list($image_width, $image_height) = getimagesize($remote_file);
//
//            if ($image_width > $max_upload_width || $image_height > $max_upload_height) {
//                $proportions = $image_width / $image_height;
//
//                if ($image_width > $image_height) {
//                    $new_width = $max_upload_width;
//                    $new_height = round($max_upload_width / $proportions);
//                } else {
//                    $new_height = $max_upload_height;
//                    $new_width = round($max_upload_height * $proportions);
//                }
//
//                $new_image = imagecreatetruecolor($new_width, $new_height);
//                $image_source = imagecreatefromjpeg($remote_file);
//
//                imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
//                imagejpeg($new_image, $remote_file, 70);
//
//                imagedestroy($new_image);
//            }
//
//            imagedestroy($image_source);
        }
        #insertamos en la BD la nueva imagen
        if (!empty($nombre)) {
            $updateImg = "UPDATE banner SET img = '$nombre'"
                    . "WHERE id = $id";
            db::getInstance()->exec($updateImg);
        }
    }
    #obtenemos todos los demas datos del slider
    $titulo_slider = $_POST['titulo_slider'];
    $descripcion_slider = $_POST['descripcion_slider'];
    $enlace_slider = $_POST['enlace_slider'];
    if (isset($_POST['texto_slider'])) {
        $texto_slider = $_POST['texto_slider'];
    }
    #actualizamos los demas datos
    if (isset($texto_slider)) {
        $updateSlider = "UPDATE banner SET titulo = '$titulo_slider',"
                . "descripcion = '$descripcion_slider',"
                . "enlace = '$enlace_slider',"
                . "texto_enlace = '$texto_slider'"
                . "WHERE id = $id";
    } else {
        $updateSlider = "UPDATE banner SET titulo = '$titulo_slider',"
                . "descripcion = '$descripcion_slider',"
                . "enlace = '$enlace_slider'"
                . "WHERE id = $id";
    }
    db::getInstance()->exec($updateSlider);
    $data = true;
}
echo json_encode($data);
