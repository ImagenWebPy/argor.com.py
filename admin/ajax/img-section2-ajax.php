<?php

ini_set('memory_limit', '16M');
if (isset($_POST['imagen'])) {
    if (!empty($_FILES)) {
        $imagen = $_POST['imagen'];
        switch ($imagen) {
            case 'img1':
                $file = $_FILES["img_section2_1"];
                //$nombre = $file["name"];
                $nombre = 'bkg-img1.jpg';
                $tipo = $file["type"];
                $ruta_provisional = $file["tmp_name"];
                $size = $file["size"];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones[0];
                $height = $dimensiones[1];
                $carpeta = "../../img/pics/";

                if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif') {
                    echo "Error, el archivo no es una imagen";
                } else if ($size > 2048 * 2048) {
                    echo "Error, el tamaño máximo permitido son 2MB";
                } else {
                    $src = $carpeta . $nombre;
                    move_uploaded_file($ruta_provisional, $src);
//                    $max_upload_width = $width;
//                    $max_upload_height = $height;
//                    // if uploaded image was JPG/JPEG
//                    if ($type == "image/jpeg" || $type == "image/pjpeg") {
//                        $image_source = imagecreatefromjpeg($tmp_name);
//                    }
//                    // if uploaded image was GIF
//                    if ($type == "image/gif") {
//                        $image_source = imagecreatefromgif($tmp_name);
//                    }
//                    // BMP doesn't seem to be supported so remove it form above image type test (reject bmps)	
//                    // if uploaded image was BMP
//                    if ($type == "image/bmp") {
//                        $image_source = imagecreatefromwbmp($tmp_name);
//                    }
//                    // if uploaded image was PNG
//                    if ($type == "image/x-png") {
//                        $image_source = imagecreatefrompng($tmp_name);
//                    }
//
//                    $remote_file = $carpeta . limpia_espacios(limpiar($nombre));
//                    imagejpeg($image_source, $remote_file, 70);
//                    chmod($remote_file, 0644);
//
//                    // get width and height of original image
//                    list($image_width, $image_height) = getimagesize($remote_file);
//
//                    if ($image_width > $max_upload_width || $image_height > $max_upload_height) {
//                        $proportions = $image_width / $image_height;
//
//                        if ($image_width > $image_height) {
//                            $new_width = $max_upload_width;
//                            $new_height = round($max_upload_width / $proportions);
//                        } else {
//                            $new_height = $max_upload_height;
//                            $new_width = round($max_upload_height * $proportions);
//                        }
//
//                        $new_image = imagecreatetruecolor($new_width, $new_height);
//                        $image_source = imagecreatefromjpeg($remote_file);
//
//                        imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
//                        imagejpeg($new_image, $remote_file, 70);
//
//                        imagedestroy($new_image);
//                    }
//
//                    imagedestroy($image_source);
                }
                break;
            case 'img2':
                $file = $_FILES["img_section2_2"];
                //$nombre = $file["name"];
                $nombre = 'bkg-img2.jpg';
                $tipo = $file["type"];
                $ruta_provisional = $file["tmp_name"];
                $size = $file["size"];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones[0];
                $height = $dimensiones[1];
                $carpeta = "../../img/pics/";

                if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif') {
                    echo "Error, el archivo no es una imagen";
                } else if ($size > 2048 * 2048) {
                    echo "Error, el tamaño máximo permitido son 2MB";
                } else {
                    $src = $carpeta . $nombre;
                    move_uploaded_file($ruta_provisional, $src);
//                    $max_upload_width = $width;
//                    $max_upload_height = $height;
//                    // if uploaded image was JPG/JPEG
//                    if ($type == "image/jpeg" || $type == "image/pjpeg") {
//                        $image_source = imagecreatefromjpeg($tmp_name);
//                    }
//                    // if uploaded image was GIF
//                    if ($type == "image/gif") {
//                        $image_source = imagecreatefromgif($tmp_name);
//                    }
//                    // BMP doesn't seem to be supported so remove it form above image type test (reject bmps)	
//                    // if uploaded image was BMP
//                    if ($type == "image/bmp") {
//                        $image_source = imagecreatefromwbmp($tmp_name);
//                    }
//                    // if uploaded image was PNG
//                    if ($type == "image/x-png") {
//                        $image_source = imagecreatefrompng($tmp_name);
//                    }
//
//                    $remote_file = $carpeta . limpia_espacios(limpiar($nombre));
//                    imagejpeg($image_source, $remote_file, 70);
//                    chmod($remote_file, 0644);
//
//                    // get width and height of original image
//                    list($image_width, $image_height) = getimagesize($remote_file);
//
//                    if ($image_width > $max_upload_width || $image_height > $max_upload_height) {
//                        $proportions = $image_width / $image_height;
//
//                        if ($image_width > $image_height) {
//                            $new_width = $max_upload_width;
//                            $new_height = round($max_upload_width / $proportions);
//                        } else {
//                            $new_height = $max_upload_height;
//                            $new_width = round($max_upload_height * $proportions);
//                        }
//
//                        $new_image = imagecreatetruecolor($new_width, $new_height);
//                        $image_source = imagecreatefromjpeg($remote_file);
//
//                        imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
//                        imagejpeg($new_image, $remote_file, 70);
//
//                        imagedestroy($new_image);
//                    }
//
//                    imagedestroy($image_source);
                }
                break;
        }
    }
}