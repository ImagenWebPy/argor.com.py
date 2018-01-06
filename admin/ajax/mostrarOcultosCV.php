<?php

#Se establece el tipo de contenido a json y la codificación
header('Content-type: application/json; charset=utf-8');
#CONECCIONES A LA BD
include '../../db-config/database.class.php';
#INSTANCIAMOS LA BD
$db = DataBase::getInstance();
#INCLUIMOS LIBRERIAS NECESARIAS
include '../../lib/functions.php';
$data = '';
if (!empty($_POST)) {
    $checked = $_POST['checked'];
    $oculto = 0;
    if ($checked == 1)
        $oculto = 1;
    $sqlCV = "SELECT * FROM cv where oculto = $oculto order by id desc";
    $db->setQuery($sqlCV);
    $cvs = $db->loadObjectList();
    foreach ($cvs as $cv) {
        $data .= '
            <tr id="filaCV' . $cv->id . '">
                                <td>' . utf8_encode($cv->nombre) . '</td>
                                <td>' . utf8_encode($cv->email) . '</td>
                                <td>' . utf8_encode($cv->telefono) . '</td>
                                <td>';
        $ext = strstr($cv->archivo, '.');
        if ($ext == '.pdf') {
            $data .= '              <a href="../archivos/' . utf8_encode($cv->archivo) . '" title="Descargar CV" target="_blank"><img src="../img/pdf-icon.png" alt="PDF"  /></a>';
        } else {
            $data .= '              <a href="../archivos/' . utf8_encode($cv->archivo) . '" title="Descargar CV" target="_blank"><img src="../img/word-icon.png" alt="PDF"  /></a>';
        }
        $data .= '              <td>';
        if ($oculto == 0) {
            $data .= '              <span class="badge bg-aqua"><a href="#" role="button" style="color: #fff;" data-toggle="modal" data-target="#verCV' . $cv->id . '">Ver</a></span>
                                    <a class="pointer text-red linkOcutarCV" style="font-size: 16px; position: relative; top: 3px;" data-id="' . $cv->id . '" data-toggle="tooltip" data-placement="left" title="Ocultar"><i class="fa fa-ban" aria-hidden="true"></i></a>';
        }
        $data .= '              </td>
                            </tr>
                        <div class="modal fade" id="verCV' . $cv->id . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">C.V. ' . utf8_encode($cv->nombre) . '</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            <p><strong>Nombre</strong>: ' . utf8_encode($cv->nombre) . '</p>
                                            <p><strong>Email</strong>: ' . utf8_encode($cv->email) . '</p>
                                            <p><strong>Teléfono</strong>: ' . utf8_encode($cv->telefono) . '</p>
                                            <p><strong>Mensaje</strong>: ' . utf8_encode($cv->mensaje) . '</p>
                                            <p><strong>Descargar CV</strong>:';
        $ext = strstr($cv->archivo, '.');
        if ($ext == '.pdf') {

            $data .= '                          <a href="../archivos/' . utf8_encode($cv->archivo) . '" title="Descargar CV" target="_blank"><img src="../img/pdf-icon.png" alt="PDF"  /></a>';
        } else {
            $data .= '                          <a href="../archivos/' . utf8_encode($cv->archivo) . '" title="Descargar CV" target="_blank"><img src="../img/word-icon.png" alt="PDF"  /></a>';
        }
        $data .= '                          </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- END Modal Editar-->
                ';
    }
}
echo json_encode($data);

