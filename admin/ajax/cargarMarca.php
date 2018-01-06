<?php

/**
 * Formato del array json que tiene que retornar
 * {
 *   "data": [
 *              {
 *                  "marca": "np",
 *                  "estado": "operador",
 *                  "accion": "producto"
 *              },
 *           ]
 * }
 * @return json array
 */
#CONECCIONES A LA BD
include '../../db-config/database.class.php';
#INSTANCIAMOS LA BD
$db = DataBase::getInstance();
#INCLUIMOS LIBRERIAS NECESARIAS
include '../../lib/functions.php';
$sqlMarcas = "select * from marca";
$db->setQuery($sqlMarcas);
$marcas = $db->loadObjectList();
$datos = array();
foreach ($marcas as $item) {
    if ($item->estado == 1) {
        $estado = '<a id="estado' . $item->id . '" class="pointer cambiarEstadoMarca" data-marca="' . $item->id . '" data-estado="1"><span class="label label-success">Habilitado</span></a>';
    } else {
        $estado = '<a id="estado' . $item->id . '" class="pointer cambiarEstadoMarca" data-marca="' . $item->id . '" data-estado="0"><span class="label label-danger">Deshabilitado</span></a>';
    }
    array_push($datos, array(
        'marca' => utf8_encode($item->descripcion),
        'estado' => $estado,
        'accion' => '<a class="btn btn-app small-btn pointer btnEditarMarca" data-marca="' . $item->id . '"><i class="fa fa-edit"></i>Editar</a>'
    ));
}
$json = '{"data": ' . json_encode($datos) . '}';
echo $json;
?>
