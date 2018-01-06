<?php
include 'header.php';
#Cargamos todas las categorias
$sqlCategorias = "SELECT * FROM categorias";
$db->setQuery($sqlCategorias);
$categorias = $db->loadObjectList();
?>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ofertas
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Ofertas</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- CATEGORIAS -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Categorias</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <?php foreach ($categorias as $item): ?>
                            <li><a href="#tab_<?php echo utf8_encode($item->id); ?>" data-toggle="tab"><?php echo utf8_encode($item->descripcion); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tab-content">
                        <?php foreach ($categorias as $item): ?>
                            <div class="tab-pane" id="tab_<?php echo utf8_encode($item->id); ?>">
                                <div class="row">
                                    <form id="categoria<?php echo utf8_encode($item->id); ?>" method="post" enctype="multipart/form-data" action="ajax/categorias-ajax.php">
                                        <div class="col-md-7">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" <?php if ($item->mostrar == 1) echo 'checked'; ?> name="mostrar">
                                                    Mostrar
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label>Nombre Categoría</label>
                                                <input type="text" class="form-control" name="nombre_categoria" placeholder="Ingrese el nombre de la categoría" value="<?php echo utf8_encode($item->descripcion); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Url Amigable</label>
                                                <input type="text" class="form-control" name="url_amigable" placeholder="Ingrese la URL amigable" value="<?php echo utf8_encode($item->url_amigable); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="box box-success direct-chat direct-chat-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Imagen Categoría</h3>
                                                    <div class="box-tools pull-right">
                                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div><!-- /.box-header -->
                                                <div class="box-body">
                                                    <img src="../img/ofertas/<?php echo utf8_encode($item->img); ?>" />
                                                </div><!-- /.box-body -->
                                                <div class="box-footer">
                                                    <div class="form-group">
                                                        <label>Imagen</label>
                                                        <input type="file" name="img_oferta">
                                                        <p class="help-block">Solo seleccione un archivo si desea modicar la imagen. <strong>[Resolución recomedada 370px. x 250px.]</strong></p>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="hidden" value="<?php echo utf8_encode($item->id); ?>" name="categoria_id" />
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-primary btn-flat" id="mod_cat_<?php echo utf8_encode($item->id); ?>">Modificar Categoria</button>
                                                        </span>
                                                    </div>
                                                </div><!-- /.box-footer-->
                                            </div><!--/.direct-chat -->
                                        </div>
                                    </form>
                                    <script>
                                        $(function () {
                                            $("#mod_cat_<?php echo utf8_encode($item->id); ?>").click(function () {
                                                var formData = new FormData($("#categoria<?php echo utf8_encode($item->id); ?>")[0]);
                                                var ruta = "ajax/categorias-ajax.php";
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
                            </div><!-- /.tab-pane -->
                        <?php endforeach; ?>
                    </div><!-- /.tab-content -->
                </div><!-- nav-tabs-custom -->
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <!-- END CATEGORIAS -->
        <!-- PRODUCTOS -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Productos</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form method="post" id="frm_select-cat" enctype="multipart/form-data" action="ajax/productos-ajax.php">
                    <div class="form-group">
                        <label>Seleccione una Categoria</label>
                        <select class="form-control cat" name="catProducto">
                            <option>Seleccione</option>
                            <?php foreach ($categorias as $item): ?>
                                <option value="<?php echo $item->id; ?>"><?php echo utf8_encode($item->descripcion); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </form>
                <script>
                    $(function () {
                        $(".cat").on("change", function () {
                            var formData = new FormData($("#frm_select-cat")[0]);
                            var ruta = "ajax/productos-ajax.php";
                            $.ajax({
                                url: ruta,
                                type: "POST",
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function (datos)
                                {
                                    $('#productos').html(datos);
                                }
                            });
                        });
                    });
                    $(document).ready(function () {
                        $("#btn-addProducto").click(function () {
                            alert('hola');
                            var formData = new FormData($("#frm-addProducto")[0]);
                            var ruta = "ajax/add-producto-ajax.php";
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
                <div id="productos">

                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <!-- END CATEGORIAS -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include 'footer.php'; ?>