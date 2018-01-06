<?php
include 'header.php';
#Cargamos la informacion de Trabaja con Nosotros
$sqlNosotros = "SELECT * FROM trabaja_con_nosotros where id=1";
$db->setQuery($sqlNosotros);
$nosotros = $db->loadObject();
#Cargamos todos los cv enviados
$sqlCV = "SELECT * FROM cv where oculto = 0 order by id desc";
$db->setQuery($sqlCV);
$cvs = $db->loadObjectList();
?>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Trabaja con Nosotros
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Trabaja con Nosotros</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label>Texto Lateral Izquierdo</label>
                    <textarea class="textarea" id="contenido" placeholder="Ingrese el Contenido" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo utf8_encode($nosotros->contenido); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Titulo Formulario</label>
                    <textarea class="form-control" id="encabezado" rows="3" placeholder="Ingrese el contenido"><?php echo utf8_encode($nosotros->encabezado); ?></textarea>
                </div>
                <div class="input-group">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-primary btn-flat" id="modificar-trabaja" name="modificar-trabaja">Modificar Datos</button>
                    </span>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#modificar-trabaja').click(function () {
                            $.ajax({
                                url: 'ajax/trabaja-ajax.php',
                                type: 'post',
                                dataType: 'json',
                                data: {
                                    contenido: $('#contenido').val(),
                                    encabezado: $('#encabezado').val(),
                                    id: 1
                                },
                                success: function (data) {
                                    location.reload();
                                }
                            }); //END AJAX
                        });
                    });
                </script>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="chkCVOcultos" name="mostrarOcultos">
                            Mostrar CV ocultos
                        </label>
                    </div>
                </div>
                <table class="table table-bordered" id="listaCV">
                    <thead>
                        <tr>
                            <th>Nombre Postulante</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>C.V.</th>
                            <th style="width: 80px">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cvs as $cv): ?>
                            <tr id="filaCV<?= $cv->id; ?>">
                                <td><?php echo utf8_encode($cv->nombre); ?></td>
                                <td><?php echo utf8_encode($cv->email); ?></td>
                                <td><?php echo utf8_encode($cv->telefono); ?></td>
                                <td>
                                    <?php
                                    $ext = strstr($cv->archivo, '.');
                                    if ($ext == '.pdf'):
                                        ?>
                                        <a href="../archivos/<?php echo utf8_encode($cv->archivo); ?>" title="Descargar CV" target="_blank"><img src="../img/pdf-icon.png" alt="PDF"  /></a>
                                    <?php else: ?>
                                        <a href="../archivos/<?php echo utf8_encode($cv->archivo); ?>" title="Descargar CV" target="_blank"><img src="../img/word-icon.png" alt="PDF"  /></a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge bg-aqua"><a href="#" role="button" style="color: #fff;" data-toggle="modal" data-target="#verCV<?php echo $cv->id; ?>">Ver</a></span>
                                    <a class="pointer text-red linkOcutarCV" style="font-size: 16px; position: relative; top: 3px;" data-id="<?= $cv->id; ?>" data-toggle="tooltip" data-placement="left" title="Ocultar"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <div class="modal fade" id="verCV<?php echo $cv->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">C.V. <?php echo utf8_encode($cv->nombre); ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            <p><strong>Nombre</strong>: <?php echo utf8_encode($cv->nombre); ?></p>
                                            <p><strong>Email</strong>: <?php echo utf8_encode($cv->email); ?></p>
                                            <p><strong>Teléfono</strong>: <?php echo utf8_encode($cv->telefono); ?></p>
                                            <p><strong>Mensaje</strong>: <?php echo utf8_encode($cv->mensaje); ?></p>
                                            <p><strong>Descargar CV</strong>: <?php
                                                $ext = strstr($cv->archivo, '.');
                                                if ($ext == '.pdf'):
                                                    ?>
                                                    <a href="../archivos/<?php echo utf8_encode($cv->archivo); ?>" title="Descargar CV" target="_blank"><img src="../img/pdf-icon.png" alt="PDF"  /></a>
                                                <?php else: ?>
                                                    <a href="../archivos/<?php echo utf8_encode($cv->archivo); ?>" title="Descargar CV" target="_blank"><img src="../img/word-icon.png" alt="PDF"  /></a>
                                                <?php endif; ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- END Modal Editar-->
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.linkOcutarCV', function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                var id_cv = $(this).attr("data-id");
                $.ajax({
                    url: "ajax/ocultarCV.php",
                    type: "POST",
                    data: {id_cv: id_cv},
                    dataType: "json"
                }).done(function (data) {
                    $("#filaCV" + id_cv).remove();
                });
            }
        });
        $(document).on('click', '.chkCVOcultos', function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                var checked = $("input[name='mostrarOcultos']:checked").length;
                $.ajax({
                    url: "ajax/mostrarOcultosCV.php",
                    type: "POST",
                    data: {checked: checked},
                    dataType: "json"
                }).done(function (data) {
                    $("#listaCV").html(data);
                });
            }
        });
    });
</script>
<?php include 'footer.php'; ?>