<?php
#CONECCIONES A LA BD
include '../../db-config/database.class.php';
#INSTANCIAMOS LA BD
$db = DataBase::getInstance();
#INCLUIMOS LIBRERIAS NECESARIAS
include '../../lib/functions.php';
#Marca
$sqlMarca = "select m.id, m.descripcion from marca m order by m.descripcion asc";
$db->setQuery($sqlMarca);
$marca = $db->loadObjectList();
#Local
$sqlLocales = "select l.id, l.nombre from locales l order by l.nombre asc";
$db->setQuery($sqlLocales);
$locales = $db->loadObjectList();
#Moneda
$sqlMoneda = "select m.id, m.simbolo, m.descripcion from moneda m where estado = 1";
$db->setQuery($sqlMoneda);
$moneda = $db->loadObjectList();
#Categorias Padres
$sqlCategorias = "select c.id, c.descripcion, c.padre_id from categoria c where c.padre_id = 0 order by c.descripcion asc";
$db->setQuery($sqlCategorias);
$categoria = $db->loadObjectList();

//Constantes
define('IMAGE_PRODUCT', getUrl() . 'img/productos/');
?>

<div class="box-body">
    <form enctype="multipart/form-data" action="<?= getUrl(); ?>admin/ajax/formProductoAdd.php" method="post" id="editarProducto">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Categoría</label>
                    <select class="form-control select2" id="categoria" style="width: 100%;" name="producto[categoria]">
                        <?php foreach ($categoria as $item): ?>
                            <option value="<?= utf8_encode($item->id); ?>"><?= utf8_encode($item->descripcion); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Sub-Categoría</label>
                    <select class="form-control select2" id="sub-categoria" style="width: 100%;" name="producto[subcategoria]">

                    </select>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Marca</label>
                    <select class="form-control select2" style="width: 100%;" name="producto[marca]">
                        <?php foreach ($marca as $item): ?>
                            <option value="<?= utf8_encode($item->id); ?>"><?= utf8_encode($item->descripcion); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Local</label>
                    <select class="form-control select2" style="width: 100%;" name="producto[local]">
                        <?php foreach ($locales as $item): ?>
                            <option value="<?= utf8_encode($item->id); ?>"><?= utf8_encode($item->nombre); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" placeholder="Nombre del Producto" value="" name="producto[nombre]">
                </div><!-- /.form-group -->
            </div><!-- /.col -->
        </div><!-- /.row -->
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Moneda</label>
                    <select class="form-control select2" style="width: 100%;" name="producto[moneda]">
                        <?php foreach ($moneda as $item): ?>
                            <option value="<?= utf8_encode($item->id); ?>"><?= utf8_encode($item->simbolo) . ' - ' . utf8_encode($item->descripcion); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="text" class="form-control" data-inputmask="'alias': 'decimal', 'groupSeparator': '.', 'autoGroup': true" value="" placeholder="Precio del Producto" name="producto[precio]">
                        </div><!-- /.form-group -->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Precio Oferta</label>
                            <input type="text" class="form-control" data-inputmask="'alias': 'decimal', 'groupSeparator': '.', 'autoGroup': true" placeholder="Precio Oferta" value="" name="producto[precio_oferta]">
                        </div><!-- /.form-group -->
                    </div>
                </div>
            </div><!-- /.col -->
            <hr>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Stock</label>
                    <input type="number" class="form-control" value="" name="producto[stock]">
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-3">
                <div class="form-group">
                    <label>Codigo</label>
                    <input type="text" class="form-control"  name="producto[codigo]">
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-3">
                <?php $checked = 'checked="checked" '; ?>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="producto[nuevo]">
                            Nuevo
                        </label>
                    </div>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-3">
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="producto[estado]">
                            Estado
                        </label>
                    </div>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="box-header">
                        <h3 class="box-title">Breve <small>Descripción</small></h3>
                        <!-- tools box -->
                    </div><!-- /.box-header -->
                    <div class="box-body pad">
                        <textarea class="textarea" id="descripcion" name="producto[descripcion]" ></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box-header">
                        <h3 class="box-title">Descripcion <small>Larga</small></h3>
                        <!-- tools box -->
                    </div><!-- /.box-header -->
                    <div class="box-body pad">
                        <textarea id="contenido" rows="10" cols="80" name="producto[contenido]"></textarea>                           
                    </div>
                </div>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('descripcion');
                    CKEDITOR.replace('contenido');
                </script>
                <div class="col-md-12">
                    <div class="box-header">
                        <h3 class="box-title">Tags <small>Lista separada por comas(,)</small></h3>
                        <!-- tools box -->
                    </div><!-- /.box-header -->
                    <div class="box-body pad">
                        <textarea rows="10" cols="80" name="producto[tags]"></textarea>                           
                    </div>
                </div>
            </div>
        </div><!-- /.box-body -->
        <hr>
        <div class="row">
            <div class="box-header">
                <h3 class="box-title">Imagenes</h3>
                <!-- tools box -->
            </div><!-- /.box-header -->
        </div><!-- /.box -->
        <div class="row">
            <div class="col-md-4">
                <div class="form-group" id="img-entrega">
                    <label class="text-info">Suba una imagenes del producto</label>
                    <input type="file" name="upload_file[]">
                    <button type="button" class="add_more">Agregar más archivos</button>
                    <p class="text-danger" style="font-size: 12px;">Solo se permiten imagenes(JPG, PNG, BMP, GIF)</p>
                </div>
                <script>
                    //AGREGAR MAS IMAGENES
                    $('.add_more').click(function () {
                        $(this).before("<input name='upload_file[]' type='file'/>");
                    });
                </script>
                <div class='progress' id="progress_div">
                    <div class='bar' id='bar1'></div>
                    <div class='percent' id='percent1'>0%</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-block btn-primary btn-flat" name="guardarCambios" type="submit">Guardar Cambios</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="<?= getUrl(); ?>js/input-mask/jquery.inputmask.js"></script>
<script type="text/javascript" src="<?= getUrl(); ?>js/input-mask/jquery.inputmask.numeric.extensions.js"></script>
<script type="text/javascript">
                    //INPUT-MASK
                    $("[data-inputmask]").inputmask();
</script>
<script type="text/javascript">
    //COMBO DEPENDIENTE
    $('#categoria').change(function () {
        $.ajax({
            url: "<?php echo getUrl(); ?>admin/ajax/loadSubCategoria.php",
            type: 'post',
            dataType: 'json',
            data: {
                idPadre: $(this).val()
            },
            success: function (data) {
                $('#sub-categoria').html("");
                $('#sub-categoria').html(data);
            }
        }); //END AJAX
    });
</script>
