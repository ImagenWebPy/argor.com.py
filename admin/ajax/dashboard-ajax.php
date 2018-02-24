<?php

/*
 * Archivo utilizado para actualizar el contenido de la
 * pagina de empresa
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
if (isset($_POST['seccion'])) {
    $seccion = $_POST['seccion'];
    switch ($seccion) {
        case 'seccion1':
            $titulo = input_special($_POST['titulo']);
            $encabezado_1 = $_POST['encabezado_1'];
            $encabezado_2 = $_POST['encabezado_2'];
            if (isset($_POST['mostrar'])) {
                $mostrar = $_POST['mostrar'];
            } else {
                $mostrar = 0;
            }
            $updateSeccion1 = "UPDATE section_1 SET titulo = '$titulo',"
                    . "encabezado_1 = '$encabezado_1',"
                    . "encabezado_2 = '$encabezado_2',"
                    . "mostrar = '$mostrar'"
                    . "WHERE id = 1";
            db::getInstance()->exec($updateSeccion1);
            $data = true;
            break;
        case 'seccion2':
            $titulo = input_special($_POST['titulo']);
            $encabezado = $_POST['encabezado'];
            $contenido = $_POST['contenido'];
            if (isset($_POST['mostrar'])) {
                $mostrar = $_POST['mostrar'];
            } else {
                $mostrar = 0;
            }
            $updateSeccion2 = "UPDATE section_2 SET titulo = '$titulo',"
                    . "encabezado = '$encabezado',"
                    . "contenido = '$contenido',"
                    . "mostrar = '$mostrar'"
                    . "WHERE id = 1";
            db::getInstance()->exec($updateSeccion2);
            $data = true;
            break;
        case 'seccion3':
            $titulo = input_special($_POST['titulo']);
            $enlace = input_special($_POST['enlace']);
            if (isset($_POST['mostrar'])) {
                $mostrar = $_POST['mostrar'];
            } else {
                $mostrar = 0;
            }
            $updateSeccion3 = "UPDATE section_3 SET titulo = '$titulo',"
                    . "enlace = '$enlace',"
                    . "mostrar = '$mostrar'"
                    . "WHERE id = 1";
            db::getInstance()->exec($updateSeccion3);
            $data = true;
            break;
        case 'seccion4':
            $titulo = $_POST['titulo'];
            $encabezado = $_POST['encabezado'];
            if (isset($_POST['mostrar'])) {
                $mostrar = $_POST['mostrar'];
            } else {
                $mostrar = 0;
            }
            $updateSeccion4 = "UPDATE section_4 SET titulo = '$titulo',"
                    . "encabezado = '$encabezado',"
                    . "mostrar = '$mostrar'"
                    . "WHERE id = 1";
            db::getInstance()->exec($updateSeccion4);
            $data = true;
            break;
        case 'seccion5':
            $titulo = input_special($_POST['titulo']);
            $enlace = input_special($_POST['enlace']);
            $contenido = $_POST['contenido'];
            $nro_whatsapp = $_POST['nro_whatsapp'];
            $texto_whatsapp = $_POST['texto_whatsapp'];
            if (isset($_POST['mostrar'])) {
                $mostrar = $_POST['mostrar'];
            } else {
                $mostrar = 0;
            }
            $updateSeccion5 = "UPDATE section_5 SET titulo = '$titulo',"
                    . "texto_enlace = '$enlace',"
                    . "contenido = '$contenido',"
                    . "nro_whatsapp = '$nro_whatsapp',"
                    . "texto_whatsapp = '$texto_whatsapp',"
                    . "mostrar = '$mostrar'"
                    . "WHERE id = 1";
            db::getInstance()->exec($updateSeccion5);
            $data = true;
            break;
        case 'seccion6':
            $titulo = input_special($_POST['titulo']);
            $contenido = $_POST['contenido'];
            if (isset($_POST['mostrar'])) {
                $mostrar = $_POST['mostrar'];
            } else {
                $mostrar = 0;
            }
            $updateSeccion6 = "UPDATE section_6 SET titulo = '$titulo',"
                    . "contenido = '$contenido',"
                    . "mostrar = '$mostrar'"
                    . "WHERE id = 1";
            db::getInstance()->exec($updateSeccion6);
            $data = true;
            break;
        case 'seccion7':
            $titulo = input_special($_POST['titulo']);
            $contenido = $_POST['contenido'];
            $nombre_sucursal = input_special($_POST['nombre_sucursal']);
            $datos_sucursal = $_POST['datos_sucursal'];
            $texto_sucursal = $_POST['texto_sucursal'];
            if (isset($_POST['mostrar'])) {
                $mostrar = $_POST['mostrar'];
            } else {
                $mostrar = 0;
            }
            $updateSeccion7 = "UPDATE section_7 SET titulo = '$titulo',"
                    . "contenido = '$contenido',"
                    . "nombre_sucursal = '$nombre_sucursal',"
                    . "datos_sucursal = '$datos_sucursal',"
                    . "texto_sucursal = '$texto_sucursal',"
                    . "mostrar = '$mostrar'"
                    . "WHERE id = 1";
            db::getInstance()->exec($updateSeccion7);
            $data = true;
            break;
    }
}
echo json_encode($data);
