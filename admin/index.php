<?php include 'header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php include './message-box.php'; ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Panel de Control</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <!-- SLIDER -->
                <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right">
                        <li class="pull-left header"><i class="fa fa-inbox"></i> Banner Inicio</li>
                    </ul>
                    <div class="tab-content no-padding" id="slider">
                        <?php
                        #Traemos todos los slider de la BD
                        $sqlBanners = "SELECT * FROM banner";
                        $db->setQuery($sqlBanners);
                        $banners = $db->loadObjectList();
                        ?>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>Imagen</th>
                                    <th>Titulo</th>
                                    <th>Descripción</th>
                                    <th>Mostrar</th>
                                    <th>Acción</th>
                                </tr>
                                <?php foreach ($banners as $banner): ?>
                                    <tr>
                                        <td style=" width: 150px;"><img src="../img/slider/<?php echo utf8_encode($banner->img); ?>" style="width: 100%;"/></td>
                                        <td><?php echo utf8_encode($banner->titulo); ?></td>
                                        <td><?php echo utf8_encode($banner->descripcion); ?></td>
                                        <td>
                                            <?php if ($banner->mostrar == 1): ?>
                                                Sí
                                            <?php else: ?>
                                                No
                                            <?php endif; ?>
                                        </td>
                                        <td><a href="#" role="button" data-toggle="modal" data-target="#modalSlider<?php echo $banner->id; ?>">Editar</a></td>
                                    </tr>
                                    <!-- Modal Slider-->
                                    <div class="modal fade" id="modalSlider<?php echo $banner->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Modificar Slider</h4>
                                                </div>
                                                <form method="post" id="banner-form<?php echo $banner->id; ?>" enctype="multipart/form-data" action="ajax/banner-ajax.php">
                                                    <div class="modal-body">
                                                        <div class="box-body">
                                                            <img src="../img/slider/<?php echo utf8_encode($banner->img); ?>" style=" width: 100%" />
                                                        </div><!-- /.box-body -->
                                                        <div class="form-group">
                                                            <label for="">Imagen</label>
                                                            <input type="file" name="img_slider">
                                                            <p class="help-block">Solo seleccione un archivo si desea modicar la imagen. <strong>[Resolución recomedada 1920px. x 1275px.]</strong></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Titulo Slider</label>
                                                            <input type="text" class="form-control" name="titulo_slider" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($banner->titulo); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Descripcion</label>
                                                            <input type="text" class="form-control" name="descripcion_slider" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($banner->descripcion); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Enlace</label>
                                                            <input type="text" class="form-control" name="enlace_slider" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($banner->enlace); ?>">
                                                        </div>
                                                        <?php if (!empty($banner->texto_enlace)): ?>
                                                            <div class="form-group">
                                                                <label>Texto Enlace</label>
                                                                <input type="text" class="form-control" name="texto_slider" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($banner->texto_enlace); ?>">
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" value="<?php echo $banner->id; ?>" name="idBanner" id="idBanner" />
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                        <button type="button" class="btn btn-primary" id="banner_submit<?php echo $banner->id; ?>">Guardar Cambios</button>
                                                    </div>
                                                </form>
                                                <script>
                                                    $(function () {
                                                        $("#banner_submit<?php echo $banner->id; ?>").click(function () {
                                                            var formData = new FormData($("#banner-form<?php echo $banner->id; ?>")[0]);
                                                            var ruta = "ajax/banner-ajax.php";
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
                                    </div><!-- END Modal Slider-->
                                <?php endforeach; ?>
                            </table>

                        </div><!-- /.box-body -->
                    </div>
                </div><!-- END SLIDER -->

                <!-- SECCION 1 -->
                <?php
                #Traemos todos los slider de la BD
                $sqlSection1 = "SELECT * FROM section_1";
                $db->setQuery($sqlSection1);
                $section1 = $db->loadObject();
                ?>
                <div class="box" id="section1">
                    <div class="box-header">
                        <h3 class="box-title">Sección 1</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body pad">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="1" id="s1_mostrar" <?php if ($section1->mostrar == 1) echo 'checked'; ?>>
                                Mostrar
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Titulo</label>
                            <input type="text" id="s1_titulo" class="form-control" placeholder="Ingrese un Titulo ..." value="<?php echo utf8_encode($section1->titulo); ?>">
                        </div>
                        <div class="form-group">
                            <label>Encabezado 1</label>
                            <textarea class="textarea" id="s1_encabezado1" placeholder="Place some text here" style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo utf8_encode($section1->encabezado_1); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Encabezado 2</label>
                            <textarea class="textarea" id="s2_encabezado2" placeholder="Place some text here" style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo utf8_encode($section1->encabezado_2); ?></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" id="s1_submit">Modificar</button>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#s1_submit').click(function () {
                                $.ajax({
                                    url: 'ajax/dashboard-ajax.php',
                                    type: 'post',
                                    dataType: 'json',
                                    data: {
                                        seccion: 'seccion1',
                                        titulo: $('#s1_titulo').val(),
                                        encabezado_1: $('#s1_encabezado1').val(),
                                        encabezado_2: $('#s2_encabezado2').val(),
                                        mostrar: $('#s1_mostrar:checked').val()
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
                    <?php
                    #Traemos la lista de la seccion 1
                    $sqlSection1_lista = "SELECT * FROM section_1_lista";
                    $db->setQuery($sqlSection1_lista);
                    $section1_Lista = $db->loadObjectList();
                    ?>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Imagen</th>
                                <th>Titulo</th>
                                <th>Contenido</th>
                                <th>Mostrar</th>
                                <th>Acción</th>
                            </tr>
                            <?php foreach ($section1_Lista as $lista1): ?>
                                <tr>
                                    <td style=" width: 100px; background-color: #000;"><img src="../img/<?php echo utf8_encode($lista1->img); ?>" style="width: 50%;"/></td>
                                    <td><?php echo utf8_encode($lista1->titulo); ?></td>
                                    <td><?php echo utf8_encode($lista1->contenido); ?></td>
                                    <td>
                                        <?php if ($lista1->mostrar == 1): ?>
                                            Sí
                                        <?php else: ?>
                                            No
                                        <?php endif; ?>
                                    </td>
                                    <td><a href="#" data-toggle="modal" data-target="#section1_modal<?php echo $lista1->id; ?>" role="button">Editar</a></td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="section1_modal<?php echo $lista1->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Modificar</h4>
                                            </div>
                                            <form method="post" id="section1-item-form<?php echo $lista1->id; ?>" enctype="multipart/form-data" action="ajax/section1-listado-ajax.php">
                                                <div class="modal-body">
                                                    <div class="box-body" style="background-color: #000;">
                                                        <img src="../img/<?php echo utf8_encode($lista1->img); ?>" />
                                                    </div><!-- /.box-body -->
                                                    <div class="form-group">
                                                        <label for="">Imagen</label>
                                                        <input type="file" name="icon_section1">
                                                        <p class="help-block">Solo seleccione un archivo si desea modicar la imagen. <strong>[Resolución recomedada 30px. x 30px. - PNG transparente]</strong></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Titulo</label>
                                                        <input type="text" class="form-control" name="titulo_items1" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($lista1->titulo); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Contenido</label>
                                                        <textarea class="textarea" name="contenido_items1" placeholder="Ingrese el Contenido" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo utf8_encode($lista1->contenido); ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Enlace</label>
                                                        <input type="text" class="form-control" name="enlace_items1" placeholder="Ingrese el Enlaces" value="<?php echo utf8_encode($lista1->enlace); ?>" />
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="1" <?php if ($lista1->mostrar == 1) echo 'checked'; ?> name="mostrar_items1">
                                                            Mostrar
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" value="<?php echo $lista1->id; ?>" name="id_section1_item" />
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary" id="section1_item<?php echo $lista1->id; ?>">Guardar Cambios</button>
                                                </div>
                                            </form>
                                            <script>
                                                $(function () {
                                                    $("#section1_item<?php echo $lista1->id; ?>").click(function () {
                                                        var formData = new FormData($("#section1-item-form<?php echo $lista1->id; ?>")[0]);
                                                        var ruta = "ajax/section1-listado-ajax.php";
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
                            <?php endforeach; ?>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- END SECCION 1 -->
                <!-- SECCION 2 -->
                <?php
                #Traemos los item seccion 2
                $sqlSection2 = "SELECT * FROM section_2";
                $db->setQuery($sqlSection2);
                $section2 = $db->loadObject();
                ?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Sección 2</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body pad">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="1" <?php if ($section2->mostrar == 1) echo 'checked'; ?> id="s2_mostrar">
                                Mostrar
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Titulo</label>
                            <input type="text" class="form-control" id="s2_titulo" placeholder="Ingrese un Titulo ..." value="<?php echo utf8_encode($section2->titulo); ?>">
                        </div>
                        <div class="form-group">
                            <label>Encabezado</label>
                            <textarea class="textarea" id="s2_encabezado" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo utf8_encode($section2->encabezado); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Contenido</label>
                            <textarea class="textarea" id="s2_contenido" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo utf8_encode($section2->contenido); ?></textarea>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" id="s2_submit">Modificar</button>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#s2_submit').click(function () {
                                    $.ajax({
                                        url: 'ajax/dashboard-ajax.php',
                                        type: 'post',
                                        dataType: 'json',
                                        data: {
                                            seccion: 'seccion2',
                                            titulo: $('#s2_titulo').val(),
                                            encabezado: $('#s2_encabezado').val(),
                                            contenido: $('#s2_contenido').val(),
                                            mostrar: $('#s2_mostrar:checked').val()
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
                    <hr />
                    <div class="col-md-6">
                        <div class="box box-success direct-chat direct-chat-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Imagen 1</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <img src="../img/pics/<?php echo utf8_encode($section2->img1); ?>" />
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <form method="post" id="img-section2-form" enctype="multipart/form-data" action="ajax/img-section2-ajax.php">
                                    <div class="form-group">
                                        <label for="">Imagen</label>
                                        <input type="file" name="img_section2_1">
                                        <input type="hidden" value="img1" name="imagen" />
                                        <p class="help-block">Solo seleccione un archivo si desea modicar la imagen. <strong>[Resolución recomedada 845px. x 536px.]</strong></p>
                                    </div>
                                </form>
                                <script>
                                    $(function () {
                                        $("input[name='img_section2_1']").on("change", function () {
                                            var formData = new FormData($("#img-section2-form")[0]);
                                            var ruta = "ajax/img-section2-ajax.php";
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
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <div class="box box-success direct-chat direct-chat-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Imagen 2</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <img src="../img/pics/<?php echo utf8_encode($section2->img2); ?>" />
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <form method="post" id="img-section2_2-form" enctype="multipart/form-data" action="ajax/img-section2-ajax.php">
                                    <div class="form-group">
                                        <label for="">Imagen</label>
                                        <input type="file" name="img_section2_2">
                                        <input type="hidden" value="img2" name="imagen" />
                                        <p class="help-block">Solo seleccione un archivo si desea modicar la imagen. <strong>[Resolución recomedada 250px. x 536px.]</strong></p>
                                    </div>
                                </form>
                                <script>
                                    $(function () {
                                        $("input[name='img_section2_2']").on("change", function () {
                                            var formData = new FormData($("#img-section2_2-form")[0]);
                                            var ruta = "ajax/img-section2-ajax.php";
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
                    </div><!-- /.col -->
                </div>
        </div><!-- END SECCION 3 -->
        <!-- SECCION 3 -->
        <?php
        #Traemos los item seccion 3
        $sqlSection3 = "SELECT * FROM section_3";
        $db->setQuery($sqlSection3);
        $section3 = $db->loadObject();
        ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Sección 3</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-5">
                            <div class="checkbox">
                                <label>
                                    <input value="1" id="s3_mostrar" type="checkbox" <?php if ($section3->mostrar == 1) echo 'checked'; ?>>
                                    Mostrar
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Titulo</label>
                                <input type="text" class="form-control" id="s3_titulo" placeholder="Ingrese un Titulo ..." value="<?php echo utf8_encode($section3->titulo); ?>">
                            </div>
                            <div class="form-group">
                                <label>Enlace</label>
                                <input type="text" class="form-control" id="s3_enlace" placeholder="Ingrese un Titulo ..." value="<?php echo utf8_encode($section3->enlace); ?>">
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" id="s3_submit">Modificar</button>
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#s3_submit').click(function () {
                                        $.ajax({
                                            url: 'ajax/dashboard-ajax.php',
                                            type: 'post',
                                            dataType: 'json',
                                            data: {
                                                seccion: 'seccion3',
                                                titulo: $('#s3_titulo').val(),
                                                enlace: $('#s3_enlace').val(),
                                                mostrar: $('#s3_mostrar:checked').val()
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
                        <div class="col-md-7">
                            <div class="box box-success direct-chat direct-chat-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Imagen</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <img src="../img/pics/<?php echo utf8_encode($section3->img); ?>" style=" width: 100%;" />
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <form method="post" id="img-section3-form" enctype="multipart/form-data" action="ajax/img-section3-ajax.php">
                                        <div class="form-group">
                                            <label for="">Imagen</label>
                                            <input type="file" name="img_section3">
                                            <p class="help-block">Solo seleccione un archivo si desea modicar la imagen. <strong>[Resolución recomedada 1417px. x 945px.]</strong></p>
                                        </div>
                                    </form>
                                    <script>
                                        $(function () {
                                            $("input[name='img_section3']").on("change", function () {
                                                var formData = new FormData($("#img-section3-form")[0]);
                                                var ruta = "ajax/img-section3-ajax.php";
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
                    </div>
                </div><!--END ROW-->
                <div class="row">
                    <?php
                    #Traemos los item seccion 3
                    $sqlSection3_lista = "SELECT * FROM section_3_lista";
                    $db->setQuery($sqlSection3_lista);
                    $section3_lista = $db->loadObjectList();
                    ?>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <tr>
                                <th>Descripción</th>
                                <th>Acción</th>
                            </tr>
                            <?php foreach ($section3_lista as $listado): ?>
                                <tr>
                                    <td><?php echo utf8_encode($listado->descripcion); ?></td>
                                    <td>
                                        <a href="#" role="button" data-toggle="modal" data-target="#seccion3<?php echo $listado->id; ?>">Editar</a> - 
                                        <a href="#" role="button" data-toggle="modal" data-target="#eliminarSeccion3_<?php echo $listado->id; ?>">Eliminar</a></td>
                                </tr>
                                <!-- Modal Editarr-->
                                <div class="modal fade" id="seccion3<?php echo $listado->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Modificar Item</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Descripción</label>
                                                    <input type="text" class="form-control" id="item<?php echo $listado->id; ?>" placeholder="Ingrese la Descripcion" value="<?php echo utf8_encode($listado->descripcion); ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                <button type="button" class="btn btn-primary" id="submit_item<?php echo $listado->id; ?>">Guardar Cambios</button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- END Modal Editar-->
                                <!-- modal eliminar item-->
                                <div class="modal fade" id="eliminarSeccion3_<?php echo $listado->id; ?>" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">¿Desea eliminar el siguiente item?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-danger" id="del_item<?php echo $listado->id; ?>">Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- END Modal Editar-->
                                <!-- END modal eliminar item-->
                                <!--SCRIPTS-->
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $('#submit_item<?php echo $listado->id; ?>').click(function () {
                                            $.ajax({
                                                url: 'ajax/section3-item-ajax.php',
                                                type: 'post',
                                                dataType: 'json',
                                                data: {
                                                    accion: 'editar',
                                                    id: <?php echo $listado->id; ?>,
                                                    item: $('#item<?php echo $listado->id; ?>').val()
                                                },
                                                success: function (data) {
                                                    location.reload();
                                                }
                                            }); //END AJAX
                                        });//END EVENTO CLIC SUBMIT_ITEM
                                        $('#del_item<?php echo $listado->id; ?>').click(function () {
                                            $.ajax({
                                                url: 'ajax/section3-item-ajax.php',
                                                type: 'post',
                                                dataType: 'json',
                                                data: {
                                                    accion: 'eliminar',
                                                    id: <?php echo $listado->id; ?>
                                                },
                                                success: function (data) {
                                                    location.reload();
                                                }
                                            }); //END AJAX
                                        });//END EVENTO CLIC DEL ITEM
                                    });
                                </script>
                                <!--END SCRIPTS-->
                            <?php endforeach; ?>
                        </table>
                        <div class="col-md-4">
                            <button type="button" id='addNewItem' class="btn btn-primary" data-toggle="modal" data-target="#addItem">
                                Agregar Item
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Agregar Item</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <input type="text" class="form-control" id="newItem" name="newItem" placeholder="Ingrese la Descripcion">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary" id="btn-addItem">Agregar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#btn-addItem').click(function () {
                                        $.ajax({
                                            url: 'ajax/section3-item-ajax.php',
                                            type: 'post',
                                            dataType: 'json',
                                            data: {
                                                accion: 'agregar',
                                                item: $('#newItem').val()
                                            },
                                            success: function (data) {
                                                location.reload();
                                            }
                                        }); //END AJAX
                                    });//END EVENTO CLIC SUBMIT_ITEM
                                });
                            </script>
                        </div>
                    </div>
                </div><!--END ROW-->
            </div><!-- end box-body pad-->
        </div><!-- END SECCION 3 -->
        <!-- SECCION 4 -->
        <?php
        #Traemos los item seccion 4
        $sqlSection4 = "SELECT * FROM section_4";
        $db->setQuery($sqlSection4);
        $section4 = $db->loadObject();
        ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Sección 4</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">
                <div class="checkbox">
                    <label>
                        <input id="s4_mostrar" value="1" type="checkbox" <?php if ($section4->mostrar == 1) echo 'checked'; ?>>
                        Mostrar
                    </label>
                </div>
                <div class="form-group">
                    <label>Titulo</label>
                    <input type="text" class="form-control" id="s4_titulo" placeholder="Ingrese un Titulo ..." value="<?php echo utf8_encode($section4->titulo); ?>">
                </div>
                <div class="form-group">
                    <label>Encabezado</label>
                    <textarea class="textarea" id="s4_encabezado" placeholder="Escriba aquí su encabezado" style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo utf8_encode($section4->encabezado); ?></textarea>
                </div>
                <div class="input-group">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-success btn-flat" id="s4_submit">Modificar</button>
                    </span>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#s4_submit').click(function () {
                            $.ajax({
                                url: 'ajax/dashboard-ajax.php',
                                type: 'post',
                                dataType: 'json',
                                data: {
                                    seccion: 'seccion4',
                                    titulo: $('#s4_titulo').val(),
                                    encabezado: $('#s4_encabezado').val(),
                                    mostrar: $('#s4_mostrar:checked').val()
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
        </div>
        <!-- END SECCION 4 -->
        <!-- SECCION 5 -->
        <?php
        #Traemos los item seccion 5
        $sqlSection5 = "SELECT * FROM section_5";
        $db->setQuery($sqlSection5);
        $section5 = $db->loadObject();
        ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Sección 5</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-5">
                            <div class="checkbox">
                                <label>
                                    <input value="1" id="s5_mostrar" type="checkbox" <?php if ($section5->mostrar == 1) echo 'checked'; ?>>
                                    Mostrar
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Titulo</label>
                                <input type="text" id="s5_titulo" class="form-control" placeholder="Ingrese un Titulo ..." value="<?php echo utf8_encode($section5->titulo); ?>">
                            </div>
                            <div class="form-group">
                                <label>Texto del Enlace</label>
                                <input type="text" class="form-control" id="s5_enlace" placeholder="Ingrese el texto del enlace ..." value="<?php echo utf8_encode($section5->texto_enlace); ?>">
                            </div>
                            <div class="form-group">
                                <textarea class="textarea" id="s5_contenido" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                    <?php echo utf8_encode($section5->contenido); ?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Nro Whatsapp</label>
                                <input type="text" class="form-control" id="s5_norWhatsapp" placeholder="Ingrese el texto del enlace ..." value="<?php echo utf8_encode($section5->nro_whatsapp); ?>">
                            </div>
                            <div class="form-group">
                                <textarea class="textarea" id="s5_textoWhatsapp" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                    <?php echo utf8_encode($section5->texto_whatsapp); ?>
                                </textarea>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" id="s5_submit">Modificar</button>
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#s5_submit').click(function () {
                                        $.ajax({
                                            url: 'ajax/dashboard-ajax.php',
                                            type: 'post',
                                            dataType: 'json',
                                            data: {
                                                seccion: 'seccion5',
                                                titulo: $('#s5_titulo').val(),
                                                enlace: $('#s5_enlace').val(),
                                                contenido: $('#s5_contenido').val(),
                                                nro_whatsapp: $('#s5_norWhatsapp').val(),
                                                texto_whatsapp: $('#s5_textoWhatsapp').val(),
                                                mostrar: $('#s5_mostrar:checked').val()
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
                        <div class="col-md-7">
                            <div class="box box-success direct-chat direct-chat-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Imagen</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <img src="../img/pics/<?php echo utf8_encode($section5->img); ?>" style=" width: 100%;" />
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <form method="post" id="img-section5-form" enctype="multipart/form-data" action="ajax/img-section5-ajax.php">
                                        <div class="form-group">
                                            <label for="">Imagen</label>
                                            <input type="file" name="img_section5">
                                            <p class="help-block">Solo seleccione un archivo si desea modicar la imagen. <strong>[Resolución recomedada 960. x 643.]</strong></p>
                                        </div>
                                    </form>
                                    <script>
                                        $(function () {
                                            $("input[name='img_section5']").on("change", function () {
                                                var formData = new FormData($("#img-section5-form")[0]);
                                                var ruta = "ajax/img-section5-ajax.php";
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
                    </div>
                </div><!--END ROW-->
            </div>
        </div>
        <!-- END SECCION 5 -->
        <!-- SECCION 6 -->
        <?php
        #Traemos los item seccion 6
        $sqlSection6 = "SELECT * FROM section_6";
        $db->setQuery($sqlSection6);
        $section6 = $db->loadObject();
        ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Sección 6</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="s6_mostrar" value="1" <?php if ($section6->mostrar == 1) echo 'checked'; ?>>
                        Mostrar
                    </label>
                </div>
                <div class="form-group">
                    <label>Titulo</label>
                    <input type="text" class="form-control" id="s6_titulo" placeholder="Ingrese un Titulo ..." value="<?php echo utf8_encode($section6->titulo); ?>">
                </div>
                <div class="form-group">
                    <label>Contenido</label>
                    <textarea class="textarea" id="s6_contenido" placeholder="Escriba aquí su Contenido" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo utf8_encode($section6->contenido); ?></textarea>
                </div>
                <div class="input-group">
                    <span class="input-group-btn">
                        <button type="button" id="s6_submit" class="btn btn-success btn-flat">Modificar</button>
                    </span>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#s6_submit').click(function () {
                            $.ajax({
                                url: 'ajax/dashboard-ajax.php',
                                type: 'post',
                                dataType: 'json',
                                data: {
                                    seccion: 'seccion6',
                                    titulo: $('#s6_titulo').val(),
                                    contenido: $('#s6_contenido').val(),
                                    mostrar: $('#s6_mostrar:checked').val()
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
        </div>
        <!-- END SECCION 6 -->
        <!-- SECCION 7 -->
        <?php
        #Traemos los item seccion 6
        $sqlSection7 = "SELECT * FROM section_7";
        $db->setQuery($sqlSection7);
        $section7 = $db->loadObject();
        ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Sección 7</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="1" id="s7_mostrar" <?php if ($section7->mostrar == 1) echo 'checked'; ?>>
                        Mostrar
                    </label>
                </div>
                <div class="form-group">
                    <label>Titulo</label>
                    <input type="text" class="form-control" id="s7_titulo" placeholder="Ingrese un Titulo ..." value="<?php echo utf8_encode($section7->titulo); ?>">
                </div>
                <div class="form-group">
                    <label>Contenido</label>
                    <textarea class="textarea" id="s7_contenido" placeholder="Escriba aquí su Contenido" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo utf8_encode($section7->contenido); ?></textarea>
                </div>
                <hr />

                <div class="form-group">
                    <label>Nombre Sucursal</label>
                    <input type="text" id="s7_nombreSucursal" class="form-control" placeholder="Ingrese un Nombre ..." value="<?php echo utf8_encode($section7->nombre_sucursal); ?>">
                </div>
                <div class="form-group">
                    <label>Datos Sucursal</label>
                    <textarea class="textarea" id="s7_datosSucursal" placeholder="Escriba aquí los datos de la sucursal" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo utf8_encode($section7->datos_sucursal); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Horario Sucursal</label>
                    <input type="text" class="form-control" id="s7_horarioSucursal" placeholder="Ingrese un Nombre ..." value="<?php echo utf8_encode($section7->texto_sucursal); ?>">
                </div>
                <div class="input-group">
                    <span class="input-group-btn">
                        <button type="button" id="s7_submit" class="btn btn-primary btn-flat">Modificar</button>
                    </span>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#s7_submit').click(function () {
                            $.ajax({
                                url: 'ajax/dashboard-ajax.php',
                                type: 'post',
                                dataType: 'json',
                                data: {
                                    seccion: 'seccion7',
                                    titulo: $('#s7_titulo').val(),
                                    contenido: $('#s7_contenido').val(),
                                    nombre_sucursal: $('#s7_nombreSucursal').val(),
                                    datos_sucursal: $('#s7_datosSucursal').val(),
                                    texto_sucursal: $('#s7_horarioSucursal').val(),
                                    mostrar: $('#s7_mostrar:checked').val()
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
        </div>
        <!-- END SECCION 7 -->
    </section><!-- /.Left col -->
</div><!-- /.row (main row) -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include 'footer.php'; ?>