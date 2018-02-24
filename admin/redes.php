<?php
include 'header.php';
#Cargamos todas los remates
$sqlRedes = "SELECT * FROM redes_sociales";
$db->setQuery($sqlRedes);
$redes = $db->loadObjectList();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Redes Sociales
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Redes Sociales</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Red Social</th>
                            <th>Enlace</th>
                            <th>Mostrar</th>
                            <th style="width: 140px">Acción</th>
                        </tr>
                        <?php foreach ($redes as $red): ?>
                            <tr>
                                <td><?php echo utf8_encode($red->descripcion); ?></td>
                                <td><?php echo utf8_encode($red->url); ?></td>
                                <td>
                                    <?php
                                    if ($red->mostrar == 1) {
                                        echo 'Sí';
                                    } else {
                                        echo 'No';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <span class="badge bg-aqua"><a href="#" role="button" style="color: #fff;" data-toggle="modal" data-target="#editRed<?php echo $red->id; ?>">Editar</a></span>
                                </td>
                            </tr>
                            <div class="modal fade" id="editRed<?php echo $red->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Red Social <?php echo utf8_encode($red->descripcion); ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" id="frm-editRed<?php echo $red->id; ?>" action="ajax/redes-sociales-ajax.php">
                                                <div class="modal-body">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="1" name="mostrar" <?php if ($red->mostrar == 1) echo 'checked'; ?>>
                                                            Mostrar
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Enlace</label>
                                                        <input type="text" class="form-control" name="enlace" placeholder="Ingrese el enlace de la red social" value="<?php echo utf8_encode($red->url); ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" value="<?php echo $red->id; ?>" name="id_red" />
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-primary" id="btn-editRed<?php echo $red->id; ?>">Editar Red Social</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- END Modal Editar-->
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#btn-editRed<?php echo $red->id; ?>").click(function () {
                                        var formData = new FormData($("#frm-editRed<?php echo $red->id; ?>")[0]);
                                        var ruta = "ajax/redes-sociales-ajax.php";
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
                        <?php endforeach; ?>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include 'footer.php'; ?>