<?php
include 'header.php';
#El contenido de La Empresa
$sqlLogo = "SELECT * FROM logo WHERE id = 1";
$db->setQuery($sqlLogo);
$logo = $db->loadObject();
?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php include './message-box.php'; ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Logo
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Logo</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box box-success direct-chat direct-chat-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Imagen Logo</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <img src="../img/<?php echo utf8_encode($logo->logo); ?>" style=" width: 100%" />
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <form method="post" id="img-empresa-form" enctype="multipart/form-data" action="ajax/img-empresa-ajax.php">
                                    <div class="form-group">
                                        <label for="">Imagen</label>
                                        <input type="file" name="img_logo">
                                        <p class="help-block">Solo seleccione un archivo si desea modicar el logo. <strong>[Resolución recomedada 250px. x 119px. Tipo de Archivo recomendado: PNG]</strong></p>
                                    </div>
                                </form>
                                <script>
                                    $(function () {
                                        $("input[name='img_logo']").on("change", function () {
                                            var formData = new FormData($("#img-empresa-form")[0]);
                                            var ruta = "ajax/img-logo-ajax.php";
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
                            </div><!-- /.box-footer-->
                        </div><!--/.direct-chat -->
                    </div>
                </div><!--end row-->
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include 'footer.php'; ?>