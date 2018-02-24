<?php
include 'header.php';
#Traemos todos las sucursales
$sqlLocales = "SELECT * FROM locales";
$db->setQuery($sqlLocales);
$locales = $db->loadObjectList();
?>
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sucursales
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Sucursales</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Listado Sucursales</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#newSucursal">
                            Agregar Sucursal
                        </button>
                        <p>&nbsp;</p>
                        <!-- Modal -->
                        <div class="modal fade" id="newSucursal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" id="frm-addLocal" enctype="multipart/form-data" action="ajax/add-local-ajax.php">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Agregar Nueva Sucursal</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="1" name="mostrar">
                                                            Mostrar
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nombre Sucursal</label>
                                                        <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre ..." value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Dirección</label>
                                                        <input type="text" class="form-control" name="direccion" placeholder="Ingrese la Direccion ..." value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Teléfono 1</label>
                                                        <input type="text" class="form-control" name="tel1" placeholder="Ingrese el numero de teléfono ..." value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Teléfono 2</label>
                                                        <input type="text" class="form-control" name="tel2" placeholder="Ingrese el numero de teléfono ..." value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="email" placeholder="Ingrese la direccion de email de local ..." value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <!--                                                    <div class="form-group">
                                                                                                            <label>Latitud</label>
                                                                                                            <input type="text" class="form-control" name="latitud" placeholder="Ingrese la Latitud del Local ..." value="">
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                            <label>Longitud</label>
                                                                                                            <input type="text" class="form-control" name="longitud" placeholder="Ingrese la Longitud del Local ..." value="">
                                                                                                        </div>-->
                                                    <div class="form-group">
                                                        <label>Iframe de Google Maps</label>
                                                        <input type="text" class="form-control" name="google_maps" placeholder="Ingrese el Iframe De Google Mpas ..." value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Imagen</label>
                                                        <input type="file" name="img">
                                                        <p class="help-block"><strong>[Resolución recomedada 915px. x 536px.]</strong></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary" id="btn-addLocal">Agregar</button>
                                        </div>
                                    </form>
                                    <script>
                                        $(function () {
                                            $("#btn-addLocal").click(function () {
                                                var formData = new FormData($("#frm-addLocal")[0]);
                                                var ruta = "ajax/add-local-ajax.php";
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($locales as $item): ?>
                        <div class="col-md-6">
                            <!-- Box Comment -->
                            <div class="box box-widget collapsed-box">
                                <div class='box-header with-border'>
                                    <div class='user-block'>
                                        <span class='username'><a href="#"><?php echo utf8_encode($item->nombre); ?></a></span>
                                    </div><!-- /.user-block -->
                                    <div class='box-tools'>
                                        <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-plus'></i></button>
                                        <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
                                    </div><!-- /.box-tools -->
                                </div><!-- /.box-header -->
                                <div class='box-body'>
                                    <div class="row">
                                        <form method="post" id="form-locales<?php echo $item->id; ?>" id="local_<?php echo $item->id; ?>" enctype="multipart/form-data" action="ajax/locales-ajax.php">
                                            <div class="col-md-5">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="1" name="mostrar" <?php if ($item->mostrar == 1) echo 'checked'; ?>>
                                                        Mostrar
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nombre Sucursal</label>
                                                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese el Nombre ..." value="<?php echo utf8_encode($item->nombre); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Dirección</label>
                                                    <input type="text" class="form-control" name="direccion" placeholder="Ingrese la Direccion ..." value="<?php echo utf8_encode($item->direccion); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Teléfono 1</label>
                                                    <input type="text" class="form-control" name="tel1" placeholder="Ingrese el numero de teléfono ..." value="<?php echo utf8_encode($item->tel1); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Teléfono 2</label>
                                                    <input type="text" class="form-control" name="tel2" placeholder="Ingrese el numero de teléfono ..." value="<?php echo utf8_encode($item->tel2); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email" placeholder="Ingrese la direccion de email de local ..." value="<?php echo utf8_encode($item->email); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <!--                                                <div class="form-group">
                                                                                                    <label>Latitud</label>
                                                                                                    <input type="text" class="form-control" name="latitud" placeholder="Ingrese la Latitud del Local ..." value="<?php echo utf8_encode($item->latitud); ?>">
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label>Longitud</label>
                                                                                                    <input type="text" class="form-control" name="longitud" placeholder="Ingrese la Longitud del Local ..." value="<?php echo utf8_encode($item->longitud); ?>">
                                                                                                </div>-->
                                                <div class="form-group">
                                                    <label>Iframe de Google Maps</label>
                                                    <textarea class="form-control" name="google_maps" ><?php echo $item->google_maps; ?></textarea>
                                                </div>
                                                <div class="box box-success direct-chat direct-chat-success">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title">Imagen Sucursal</h3>
                                                        <div class="box-tools pull-right">
                                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                                        </div>
                                                    </div><!-- /.box-header -->
                                                    <div class="box-body">
                                                        <?php if (!empty($item->img_local)): ?>
                                                            <img src="../img/sucursales/<?php echo utf8_encode($item->img_local); ?>" style=" width: 100%" />
                                                        <?php else: ?>
                                                            <img src="../img/no-disponible.png" />
                                                        <?php endif; ?>
                                                    </div><!-- /.box-body -->
                                                    <div class="box-footer">
                                                        <div class="form-group">
                                                            <label for="">Imagen</label>
                                                            <input type="file" name="img">
                                                            <p class="help-block">Solo seleccione un archivo si desea modicar la imagen. <strong>[Resolución recomedada 915px. x 536px.]</strong></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <input type="hidden" name="id_local" value="<?php echo $item->id; ?>" />
                                                        <button type="button" id="button-local<?php echo $item->id; ?>" class="btn btn-primary btn-flat">Modificar Datos</button>
                                                        <a href="#" role="button" data-toggle="modal" data-target="#del-sucursal<?php echo $item->id; ?>" class="btn btn-danger pull-right">Eliminar Sucursal</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- modal eliminar item-->
                                        <div class="modal fade" id="del-sucursal<?php echo $item->id; ?>" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">¿Desea eliminar la sucursal?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                        <button type="button" class="btn btn-danger" id="del_sucursal<?php echo $item->id; ?>">Eliminar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- END Modal Editar-->
                                        <script>
                                            $(function () {
                                                $("#button-local<?php echo $item->id; ?>").click(function () {
                                                    var formData = new FormData($("#form-locales<?php echo $item->id; ?>")[0]);
                                                    var ruta = "ajax/locales-ajax.php";
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
                                                $('#del_sucursal<?php echo $item->id; ?>').click(function () {
                                                    $.ajax({
                                                        url: 'ajax/del-sucursal-ajax.php',
                                                        type: 'post',
                                                        dataType: 'json',
                                                        data: {
                                                            id: <?php echo $item->id; ?>
                                                        },
                                                        success: function (data) {
                                                            location.reload();
                                                        }
                                                    }); //END AJAX
                                                });//END EVENTO CLIC DEL ITEM
                                            });
                                        </script>
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    <?php endforeach; ?>
                </div><!-- /.row -->
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include 'footer.php'; ?>