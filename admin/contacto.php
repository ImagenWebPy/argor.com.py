<?php
include 'header.php';
#El contenido de contacto
$sqlContacto = "SELECT * FROM contacto WHERE id = 1";
$db->setQuery($sqlContacto);
$contacto = $db->loadObject();
?>
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php include './message-box.php'; ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Contacto
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Contacto</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="col-md-8">
                    <h4>Sección lateral Izquierda</h4>
                    <div class="form-group">
                        <label>Titulo Lateral Izquierdo</label>
                        <input type="text" class="form-control" id="titulo_left" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($contacto->titulo_left); ?>">
                    </div>
                    <hr />
                    <div class="form-group">
                        <label>Titulo Local</label>
                        <input type="text" class="form-control" id="titulo_local" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($contacto->titulo_local); ?>">
                    </div>
                    <div class="form-group">
                        <label>Dirección Local</label>
                        <input type="text" class="form-control" id="direccion_local" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($contacto->direccion_local); ?>">
                    </div>
                    <div class="form-group">
                        <label>Teléfono Local</label>
                        <input type="text" class="form-control" id="telefono_local" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($contacto->telefono_local); ?>">
                    </div>
                    <div class="form-group">
                        <label>Email Local</label>
                        <input type="text" class="form-control" id="email_local" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($contacto->email_local); ?>">
                    </div>
                    <hr />
                    <div class="form-group">
                        <label>Titulo Horario</label>
                        <input type="text" class="form-control" id="titulo_horario" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($contacto->titulo_horario); ?>">
                    </div>
                    <div class="form-group">
                        <label>Horario Día</label>
                        <input type="text" class="form-control" id="horario_dia" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($contacto->horario_dia); ?>">
                    </div>
                    <div class="form-group">
                        <label>Horario Fin de Semana</label>
                        <input type="text" class="form-control" id="horario_sabados" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($contacto->horario_sabados); ?>">
                    </div>
                    <div class="form-group">
                        <label>Info adicional Locales</label>
                        <input type="text" class="form-control" id="horario_info" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($contacto->horario_info); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <h4>Sección lateral Derecha</h4>
                    <div class="form-group">
                        <label>Titulo Formulario</label>
                        <input type="text" class="form-control" id="titulo_right" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($contacto->titulo_right); ?>">
                    </div>
                    <hr />
                    <h4>Google Maps</h4>
                    <div class="form-group">
                        <label>Latitud</label>
                        <input type="text" class="form-control" id="map_latitude" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($contacto->map_latitude); ?>">
                    </div>
                    <div class="form-group">
                        <label>Longitud</label>
                        <input type="text" class="form-control" id="map_longitude" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($contacto->map_longitude); ?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email de contacto (Formulario)</label>
                        <input type="email" class="form-control" id="email_formulario" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($contacto->email_formulario); ?>">
                    </div>
                    <div class="form-group">
                        <label>Email de contacto CV (Informara sobre los CV enviados)</label>
                        <input type="email" class="form-control" id="email_cv" placeholder="Ingrese el titulo" value="<?php echo utf8_encode($contacto->email_cv); ?>">
                    </div>
                    <hr />
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-primary btn-flat" id="modificar-contacto" name="modificar-contacto">Modificar Datos</button>
                        </span>
                    </div>
                </div>
            </div><!-- /.body -->
        </div><!-- /.box -->
        <script type="text/javascript">
            $(document).ready(function () {
                $('#modificar-contacto').click(function () {
                    $.ajax({
                        url: 'ajax/contacto-ajax.php',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            titulo_left: $('#titulo_left').val(),
                            titulo_local: $('#titulo_local').val(),
                            direccion_local: $('#direccion_local').val(),
                            telefono_local: $('#telefono_local').val(),
                            email_local: $('#email_local').val(),
                            titulo_horario: $('#titulo_horario').val(),
                            horario_dia: $('#horario_dia').val(),
                            horario_sabados: $('#horario_sabados').val(),
                            horario_info: $('#horario_info').val(),
                            titulo_right: $('#titulo_right').val(),
                            map_latitude: $('#map_latitude').val(),
                            map_longitude: $('#map_longitude').val(),
                            email_formulario: $('#email_formulario').val(),
                            email_cv: $('#email_cv').val(),
                            id_contacto: 1
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
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include 'footer.php'; ?>