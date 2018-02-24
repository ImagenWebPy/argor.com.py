<?php
if (!empty($_POST)) {
    #CONECCIONES A LA BD
    include '../../db-config/database.class.php';
#INSTANCIAMOS LA BD
    $db = DataBase::getInstance();
#INCLUIMOS LIBRERIAS NECESARIAS
    include '../../lib/functions.php';
    #Datos del producto
    $id_producto = $_POST['id_producto'];
    $sqlProducto = "select p.* from producto p
                where p.id = $id_producto";
    $db->setQuery($sqlProducto);
    $producto = $db->loadObject();
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
    #Categorias Hijas
    $sqlCategoriasHijas = "select c.id, c.descripcion, c.padre_id from categoria c where c.padre_id > 0";
    $db->setQuery($sqlCategoriasHijas);
    $categoriaHija = $db->loadObjectList();
    //Constantes
    define('IMAGE_PRODUCT', getUrl() . 'img/productos/');
}
?>

<div class="box-body">
    <form enctype="multipart/form-data" action="<?= getUrl(); ?>admin/ajax/formProducto.php" method="post" id="editarProducto">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Categoría</label>
                    <select class="form-control select2" id="categoria" style="width: 100%;" name="producto[categoria]">
                        <?php foreach ($categoria as $item): ?>
                            <?php
                            #categoria padre
                            $sqlPadre = "select c.padre_id from categoria c where id = " . $producto->id_categoria;
                            $db->setQuery($sqlPadre);
                            $padre = $db->loadObject();
                            $selected = '';
                            ($item->id == $padre->padre_id) ? $selected = 'selected' : $selected = '';
                            ?>
                            <option value="<?= utf8_encode($item->id); ?>" <?= $selected; ?>><?= utf8_encode($item->descripcion); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Sub-Categoría</label>
                    <select class="form-control select2" id="sub-categoria" style="width: 100%;" name="producto[subcategoria]">
                        <?php foreach ($categoriaHija as $item): ?>
                            <?php
                            #categoria padre
                            //$sqlPadre = "select c.padre_id from categoria c where id = " . $producto->id_categoria;
//                            $db->setQuery($sqlPadre);
//                            $padre = $db->loadObject();
                            $selected = '';
                            ($item->id == $producto->id_categoria) ? $selected = 'selected' : $selected = '';
                            ?>
                            <option value="<?= utf8_encode($item->id); ?>" <?= $selected; ?>><?= utf8_encode($item->descripcion); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Marca</label>
                    <select class="form-control select2" style="width: 100%;" name="producto[marca]">
                        <?php foreach ($marca as $item): ?>
                            <?php
                            $selected = '';
                            ($item->id == $producto->id_marca) ? $selected = 'selected' : $selected = '';
                            ?>
                            <option value="<?= utf8_encode($item->id); ?>" <?= $selected; ?>><?= utf8_encode($item->descripcion); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Local</label>
                    <select class="form-control select2" style="width: 100%;" name="producto[local]">
                        <?php foreach ($locales as $item): ?>
                            <?php
                            $selected = '';
                            ($item->id == $producto->id_local) ? $selected = 'selected' : $selected = '';
                            ?>
                            <option value="<?= utf8_encode($item->id); ?>" <?= $selected; ?>><?= utf8_encode($item->nombre); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" placeholder="Nombre del Producto" value="<?= utf8_encode($producto->nombre); ?>" name="producto[nombre]">
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
                            <?php
                            $selected = '';
                            ($item->id == $producto->id_moneda) ? $selected = 'selected' : $selected = '';
                            ?>
                            <option value="<?= utf8_encode($item->id); ?>" <?= $selected; ?>><?= utf8_encode($item->simbolo) . ' - ' . utf8_encode($item->descripcion); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="text" class="form-control" data-inputmask="'alias': 'decimal', 'groupSeparator': '.', 'autoGroup': true" value="<?= number_format($producto->precio, 0, ',', '.'); ?>" placeholder="Precio del Producto" name="producto[precio]">
                        </div><!-- /.form-group -->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Precio Oferta</label>
                            <input type="text" class="form-control" data-inputmask="'alias': 'decimal', 'groupSeparator': '.', 'autoGroup': true" placeholder="Precio Oferta" value="<?= number_format($producto->precio_oferta, 0, ',', '.'); ?>" name="producto[precio_oferta]">
                        </div><!-- /.form-group -->
                    </div>
                </div>
            </div><!-- /.col -->
            <hr>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Stock</label>
                    <input type="number" class="form-control" value="<?= number_format($producto->stock, 0, ',', '.'); ?>" name="producto[stock]">
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-3">
                <div class="form-group">
                    <label>Codigo</label>
                    <input type="text" class="form-control" value="<?= $producto->codigo; ?>" name="producto[codigo]">
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-3">
                <?php $checked = 'checked="checked" '; ?>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="producto[nuevo]" <?= ($producto->nuevo == 1) ? 'checked' : '' ?>>
                            Nuevo
                        </label>
                    </div>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-3">
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="producto[estado]" <?= ($producto->estado == 1) ? 'checked' : '' ?>>
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
                        <textarea class="textarea" id="descripcion" name="producto[descripcion]" ><?= $producto->descripcion; ?></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box-header">
                        <h3 class="box-title">Descripcion <small>Larga</small></h3>
                        <!-- tools box -->
                    </div><!-- /.box-header -->
                    <div class="box-body pad">
                        <textarea id="contenido" rows="10" cols="80" name="producto[contenido]"><?= $producto->contenido; ?></textarea>                           
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
                        <textarea rows="10" cols="80" name="producto[tags]"><?= utf8_encode($producto->tags); ?></textarea>                           
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
            <div class="row">
                <?php
                $imagenes = explode('|', $producto->imagen);
                $i = 1;
                ?>
                <?php foreach ($imagenes as $item): ?>
                    <?php $sinExtension = strstr($item, '.', true); ?>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-danger btn-lg btn-xs" data-toggle="modal" data-target="#eliminar-<?= $sinExtension; ?>">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>Eliminar
                        </button>
                        <img src="<?php echo IMAGE_PRODUCT . $item; ?>" class="img-responsive" />
                    </div>
                    <div class="modal fade" id="eliminar-<?= $sinExtension; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Eliminar Imagen</h4>
                                </div>
                                <div class="modal-body">
                                    ¿Está seguro que desea la siguiente imagen?
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" id="id-<?= $sinExtension; ?>" value="<?= $producto->id; ?>">
                                    <input type="hidden" id="imagen-<?= $sinExtension; ?>" value="<?= $item; ?>">
                                    <input type="hidden" id="posicion-<?= $sinExtension; ?>" value="<?= $i; ?>">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="button" id="btn-delImagen-<?= $sinExtension; ?>" class="btn btn-danger">Eliminar</button>
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $("#btn-delImagen-<?= $sinExtension; ?>").click(function () {
                                            var id = $('#id-<?= $sinExtension; ?>').val();
                                            var imagen = $('#imagen-<?= $sinExtension; ?>').val();
                                            var posicion = $('#posicion-<?= $sinExtension; ?>').val();
                                            $.ajax({
                                                url: '<?= getUrl(); ?>admin/eliminarImagenProducto',
                                                type: 'POST',
                                                data: {
                                                    id: id,
                                                    imagen: imagen,
                                                    posicion: posicion
                                                },
                                                success: function (data) {
                                                    location.reload();
                                                }
                                            }); //END AJAX
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php endforeach; ?>

            </div>
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
        <input type="hidden" name="producto[id]" value="<?= $producto->id; ?>" />
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
     $("[data-inputmask]").inputmask();
</script>
<script type="text/javascript">
    $(document).ready(function () {
        //INPUT-MASK
       
        //COMBO DEPENDIENTE
        $('#categoria').change(function () {
            $.ajax({
                url: "<?php echo getUrl(); ?>admin/loadSubCategoria",
                type: 'get',
                dataType: 'json',
                data: {
                    idPadre: $(this).val()
                },
                success: function (data) {
                    var select = $('#sub-categoria');
                    select.html("");
                    $.each(data, function (index, data) {
                        select.append($('<option>', {
                            value: data['id'],
                            text: data['descripcion']
                        }));
                    })
                }
            }); //END AJAX
        });

    });
</script>
