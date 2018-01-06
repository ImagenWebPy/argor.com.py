<?php
include 'header.php';
#Cargamos todas los remates
$sqlRemates = "SELECT * FROM remate order by fecha_remate desc";
$db->setQuery($sqlRemates);
$remates = $db->loadObjectList();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Remates
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Remates</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRemate">
                Agregar Remate
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addRemate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Agregar Remate</h4>
                        </div>
                        <form method="post" id="frm-addRemate" action="ajax/remate-ajax.php">
                            <div class="modal-body">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="mostrar">
                                        Mostrar
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Nombre Remate</label>
                                    <input type="text" name="titulo" class="form-control" name="nombre_remate" placeholder="Ingrese el nombre del Remate" value="">
                                </div>
                                <label>Fecha Remate</label>
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="text" class="form-control" name="fecha_remate">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Contenido (Opcional)</label>
                                    <textarea class="textarea" name="contenido" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" value="agregar" name="accion" />
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary" id="btn-add">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                $(function () {
                    $("#btn-add").click(function () {
                        var formData = new FormData($("#frm-addRemate")[0]);
                        var ruta = "ajax/remate-ajax.php";
                        $.ajax({
                            url: ruta,
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (datos)
                            {
                                location.reload();
                            }
                        });
                    });
                });
            </script>
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Titulo</th>
                            <th>Fecha Remate</th>
                            <th style="width: 140px">Acción</th>
                        </tr>
                        <?php foreach ($remates as $remate): ?>
                            <tr>
                                <td><?php echo utf8_encode($remate->titulo); ?></td>
                                <?php setlocale(LC_TIME, "es_ES"); ?>
                                <td><?php echo strftime('%d-%B-%Y', strtotime($remate->fecha_remate)); ?></td>
                                <td>
                                    <span class="badge bg-aqua"><a href="#" role="button" style="color: #fff;" data-toggle="modal" data-target="#editRemate<?php echo $remate->id; ?>">Editar</a></span>
                                    <span class="badge bg-red"><a href="#" role="button" style="color: #fff;" data-toggle="modal" data-target="#delRemate<?php echo $remate->id; ?>">Eliminar</a></span>
                                </td>
                            </tr>
                            <div class="modal fade" id="editRemate<?php echo $remate->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" id="frm-editRemate<?php echo $remate->id; ?>" action="ajax/remate-ajax.php">
                                                <div class="modal-body">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="1" name="mostrar" <?php if ($remate->mostrar == 1) echo 'checked'; ?>>
                                                            Mostrar
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nombre Remate</label>
                                                        <input type="text" name="titulo" class="form-control" placeholder="Ingrese el nombre del Remate" value="<?php echo utf8_encode($remate->titulo); ?>">
                                                    </div>
                                                    <label>Fecha Remate</label>
                                                    <div class="input-group date" data-provide="datepicker">
                                                        <input type="text" class="form-control" name="fecha_remate" value="<?php echo date('m/d/Y', strtotime($remate->fecha_remate)); ?>">
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-th"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Contenido (Opcional)</label>
                                                        <textarea class="textarea" name="contenido" placeholder="Ingrese un texto aquí" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo utf8_encode($remate->contenido); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" value="<?php echo $remate->id; ?>" name="id_remate" />
                                                    <input type="hidden" value="editar" name="accion" />
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-primary" id="btn-editRemate<?php echo $remate->id; ?>">Editar Remate</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- END Modal Editar-->
                            <!-- modal eliminar item-->
                            <div class="modal fade" id="delRemate<?php echo $remate->id; ?>" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">¿Desea eliminar el siguiente item?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-danger" id="del_item<?php echo $remate->id; ?>">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END modal eliminar item-->
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#btn-editRemate<?php echo $remate->id; ?>").click(function () {
                                        var formData = new FormData($("#frm-editRemate<?php echo $remate->id; ?>")[0]);
                                        var ruta = "ajax/remate-ajax.php";
                                        $.ajax({
                                            url: ruta,
                                            type: "POST",
                                            data: formData,
                                            contentType: false,
                                            processData: false,
                                            success: function (datos)
                                            {
                                                location.reload();
                                            }
                                        });
                                    });
                                    $('#del_item<?php echo $remate->id; ?>').click(function () {
                                        $.ajax({
                                            url: 'ajax/remate-ajax.php',
                                            type: 'post',
                                            dataType: 'json',
                                            data: {
                                                accion: 'eliminar',
                                                id: <?php echo $remate->id; ?>
                                            },
                                            success: function (datos) {
                                                location.reload();
                                            }
                                        }); //END AJAX
                                    });//END EVENTO CLIC DEL REMATE
                                });
                            </script>
                        <?php endforeach; ?>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include 'footer.php'; ?>