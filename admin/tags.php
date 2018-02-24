<?php
include 'header.php';
#Cargamos todas los tags
$sqlTags = "SELECT * FROM tags";
$db->setQuery($sqlTags);
$tags = $db->loadObjectList();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tags
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Tags</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTag">
                Agregar Tag
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addTag" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Agregar Tag</h4>
                        </div>
                        <form method="post" id="frm-addTag" action="ajax/tags-ajax.php">
                            <div class="modal-body">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="mostrar">
                                        Mostrar
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <input type="text" name="descripcion" class="form-control" name="descripcion" placeholder="Ingrese el tag que desea agregar" value="">
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
                        var formData = new FormData($("#frm-addTag")[0]);
                        var ruta = "ajax/tags-ajax.php";
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
                            <th>Descripcion</th>
                            <th>Mostrar</th>
                            <th style="width: 140px">Acción</th>
                        </tr>
                        <?php foreach ($tags as $tag): ?>
                            <tr>
                                <td><?php echo utf8_encode($tag->descripcion); ?></td>
                                <td>
                                    <?php
                                    if ($tag->mostrar == 1) {
                                        echo 'Sí';
                                    } else {
                                        echo 'No';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <span class="badge bg-aqua"><a href="#" role="button" style="color: #fff;" data-toggle="modal" data-target="#editTag<?php echo $tag->id; ?>">Editar</a></span>
                                    <span class="badge bg-red"><a href="#" role="button" style="color: #fff;" data-toggle="modal" data-target="#delTag<?php echo $tag->id; ?>">Eliminar</a></span>
                                </td>
                            </tr>
                            <div class="modal fade" id="editTag<?php echo $tag->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Editar Tag</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" id="frm-editTag<?php echo $tag->id; ?>" action="ajax/tags-ajax.php">
                                                <div class="modal-body">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="1" name="mostrar" <?php if ($tag->mostrar == 1) echo 'checked'; ?>>
                                                            Mostrar
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Descripcion</label>
                                                        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese el Tag que desea agregar" value="<?php echo utf8_encode($tag->descripcion); ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" value="<?php echo $tag->id; ?>" name="id_tag" />
                                                    <input type="hidden" value="editar" name="accion" />
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-primary" id="btn-editTag<?php echo $tag->id; ?>">Editar Tag</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- END Modal Editar-->
                            <!-- modal eliminar item-->
                            <div class="modal fade" id="delTag<?php echo $tag->id; ?>" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">¿Desea eliminar el siguiente item?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-danger" id="del_item<?php echo $tag->id; ?>">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END modal eliminar item-->
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#btn-editTag<?php echo $tag->id; ?>").click(function () {
                                        var formData = new FormData($("#frm-editTag<?php echo $tag->id; ?>")[0]);
                                        var ruta = "ajax/tags-ajax.php";
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
                                    $('#del_item<?php echo $tag->id; ?>').click(function () {
                                        $.ajax({
                                            url: 'ajax/tags-ajax.php',
                                            type: 'post',
                                            dataType: 'json',
                                            data: {
                                                accion: 'eliminar',
                                                id: <?php echo $tag->id; ?>
                                            },
                                            success: function (datos) {
                                                location.reload();
                                            }
                                        }); //END AJAX
                                    });//END EVENTO CLIC DEL TAG
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