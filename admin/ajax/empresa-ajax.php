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
        case 'contenidos':
            $titulo_principal = input_special($_POST['titulo_principal']);
            $contenido_principal = $_POST['contenido_principal'];
            $titulo_lateral = input_special($_POST['titulo_lateral']);
            $contenido_lateral = $_POST['contenido_lateral'];
            $updateContenidos = "UPDATE la_empresa SET titulo1 = '$titulo_principal',"
                    . "contenido1 = '$contenido_principal',"
                    . "titulo2 = '$titulo_lateral',"
                    . "contenido2 = '$contenido_lateral'"
                    . "WHERE id = 1";
            db::getInstance()->exec($updateContenidos);
            $data = true;
            break;
        case 'mvv':
            $mision = $_POST['mision'];
            $vision = $_POST['vision'];
            $valores = $_POST['valores'];
            $updateMvv = "UPDATE la_empresa SET mision = '$mision',"
                    . "vision = '$vision',"
                    . "valores = '$valores'"
                    . "WHERE id = 1";
            db::getInstance()->exec($updateMvv);
            $data = true;
            break;
        case 'pas':
            $titulo_pas = $_POST['titulo_pas'];
            $pas = $_POST['pas'];
            $updatePas = "UPDATE la_empresa SET titulo_pas = '$titulo_pas',"
                    . "pas = '$pas'"
                    . "WHERE id = 1";
            db::getInstance()->exec($updatePas);
            $data = true;
            break;
    }
}
echo json_encode($data);
