<?php
include 'header.php';
#El contenido de La Empresa
$sqlEmpresa = "SELECT * FROM la_empresa WHERE id = 1";
$db->setQuery($sqlEmpresa);
$empresa = $db->loadObject();
?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php include './message-box.php'; ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            La Empresa
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">La Empresa</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Titulo Principal</label>
                            <input type="text" class="form-control" id="titulo_principal" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($empresa->titulo1); ?>">
                        </div>
                        <div class="form-group">
                            <label>Contenido Principal</label>
                            <textarea class="form-control" id="contenido_principal" rows="3" placeholder="Ingrese el contenido"><?php echo utf8_encode($empresa->contenido1); ?></textarea>
                        </div>
                        <hr />
                        <div class="form-group">
                            <label>Titulo Lateral</label>
                            <input type="text" class="form-control" id="titulo_lateral" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($empresa->titulo2); ?>">
                        </div>
                        <div class="form-group">
                            <label>Contenido Lateral</label>
                            <textarea class="textarea" id="contenido_lateral" placeholder="Ingrese el Contenido" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo utf8_encode($empresa->contenido2); ?></textarea>
                        </div>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <input type="hidden" id="seccion" value="contenidos" />
                                <button type="button" id="button-principal" class="btn btn-primary btn-flat">Modificar Datos</button>
                            </span>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#button-principal').click(function () {
                                    $.ajax({
                                        url: 'ajax/empresa-ajax.php',
                                        type: 'post',
                                        dataType: 'json',
                                        data: {
                                            seccion: $('#seccion').val(),
                                            titulo_principal: $('#titulo_principal').val(),
                                            contenido_principal: $('#contenido_principal').val(),
                                            titulo_lateral: $('#titulo_lateral').val(),
                                            contenido_lateral: $('#contenido_lateral').val()
                                        },
                                        success: function (data) {
                                            //mostramos el message-box de exitoso
                                            $('#message-success').show();
                                            //borramos cualquier mensaje que pudo haberse quedado
                                            $('#text-success').html('');
                                            //imprimimos el nuevo mensaje
                                            $('#text-success').html('La operación fue realizada con éxito.');
                                            //enviamos al usuario al mensaje
                                            $('#message-success').focus();
                                        }
                                    }); //END AJAX
                                });
                            });
                        </script>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-success direct-chat direct-chat-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Imagen Empresa</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <img src="../img/pics/<?php echo utf8_encode($empresa->img); ?>" style=" width: 100%" />
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <form method="post" id="img-empresa-form" enctype="multipart/form-data" action="ajax/img-empresa-ajax.php">
                                    <div class="form-group">
                                        <label for="">Imagen</label>
                                        <input type="file" name="img_empresa">
                                        <p class="help-block">Solo seleccione un archivo si desea modicar la imagen. <strong>[Resolución recomedada 915px. x 536px.]</strong></p>
                                    </div>
                                </form>
                                <script>
                                    $(function () {
                                        $("input[name='img_empresa']").on("change", function () {
                                            var formData = new FormData($("#img-empresa-form")[0]);
                                            var ruta = "ajax/img-empresa-ajax.php";
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
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Misión</label>
                            <textarea class="textarea" id="mision" placeholder="Ingrese el Contenido" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo utf8_encode($empresa->mision); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Visión</label>
                            <textarea class="textarea" id="vision" placeholder="Ingrese el Contenido" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo utf8_encode($empresa->vision); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Valores</label>
                            <textarea class="textarea" id="valores" placeholder="Ingrese el Contenido" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo utf8_encode($empresa->valores); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <input type="hidden" id="seccion_mvv" value="mvv" />
                                <button type="button" id="button-mvv" class="btn btn-primary btn-flat">Modificar Datos</button>
                            </span>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#button-mvv').click(function () {
                                $.ajax({
                                    url: 'ajax/empresa-ajax.php',
                                    type: 'post',
                                    dataType: 'json',
                                    data: {
                                        seccion: $('#seccion_mvv').val(),
                                        mision: $('#mision').val(),
                                        vision: $('#vision').val(),
                                        valores: $('#valores').val()
                                    },
                                    success: function (data) {
                                        //mostramos el message-box de exitoso
                                        $('#message-success').show();
                                        //borramos cualquier mensaje que pudo haberse quedado
                                        $('#text-success').html('');
                                        //imprimimos el nuevo mensaje
                                        $('#text-success').html('La operación fue realizada con éxito.');
                                        //enviamos al usuario al mensaje
                                        $('#message-success').focus();
                                    }
                                }); //END AJAX
                            });
                        });
                    </script>
                </div><!--end row-->
                <hr />
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Titulo PAS</label>
                            <input type="text" class="form-control" id="titulo_pas" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($empresa->titulo_pas); ?>">
                        </div>
                        <div class="form-group">
                            <label>Texto PAS</label>
                            <textarea class="textarea" id="pas" placeholder="Ingrese el Contenido" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo utf8_encode($empresa->pas); ?></textarea>
                        </div>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <input type="hidden" id="seccion_pass" value="pas" />
                                <button type="button" id="button-pas" class="btn btn-primary btn-flat">Modificar Datos PAS</button>
                            </span>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#button-pas').click(function () {
                                    $.ajax({
                                        url: 'ajax/empresa-ajax.php',
                                        type: 'post',
                                        dataType: 'json',
                                        data: {
                                            seccion: $('#seccion_pass').val(),
                                            titulo_pas: $('#titulo_pas').val(),
                                            pas: $('#pas').val()
                                        },
                                        success: function (data) {
                                            //mostramos el message-box de exitoso
                                            $('#message-success').show();
                                            //borramos cualquier mensaje que pudo haberse quedado
                                            $('#text-success').html('');
                                            //imprimimos el nuevo mensaje
                                            $('#text-success').html('La operación fue realizada con éxito.');
                                            //enviamos al usuario al mensaje
                                            $('#message-success').focus();
                                        }
                                    }); //END AJAX
                                });
                            });
                        </script>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-success direct-chat direct-chat-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Imagen PAS</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <img src="../img/pics/<?php echo utf8_encode($empresa->img_pas); ?>"  style=" width: 100%" />
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <form method="post" id="img-pos-form" enctype="multipart/form-data" action="ajax/img-pas-ajax.php">
                                    <div class="form-group">
                                        <label>Imagen:</label>
                                        <div style="width: 100%;">
                                            <input type="file" name="file"/>
                                            <p class="help-block">Solo seleccione un archivo si desea modicar la imagen. <strong>[Resolución recomedada 1920px. x 552px.]</strong></p>
                                        </div>
                                    </div>
                                </form>
                                <script>
                                    $(function () {
                                        $("input[name='file']").on("change", function () {
                                            var formData = new FormData($("#img-pos-form")[0]);
                                            var ruta = "ajax/img-pas-ajax.php";
                                            $.ajax({
                                                url: ruta,
                                                type: "POST",
                                                data: formData,
                                                contentType: false,
                                                processData: false,
                                                success: function (datos)
                                                {
                                                    //mostramos el message-box de exitoso
                                                    $('#message-success').show();
                                                    //borramos cualquier mensaje que pudo haberse quedado
                                                    $('#text-success').html('');
                                                    //imprimimos el nuevo mensaje
                                                    $('#text-success').html('La imagen se ha subido con exito.');
                                                    //enviamos al usuario al mensaje
                                                    $('#message-success').focus();
                                                    location.reload();
                                                }
                                            });
                                        });
                                    });
                                </script>
                            </div><!-- /.box-footer-->
                        </div><!--/.direct-chat -->
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include 'footer.php'; ?>