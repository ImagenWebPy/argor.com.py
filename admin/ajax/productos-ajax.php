<?php
#CONECCIONES A LA BD
include '../../db-config/database.class.php';
#INSTANCIAMOS LA BD
$db = DataBase::getInstance();
#INCLUIMOS LIBRERIAS NECESARIAS
include '../../lib/functions.php';
$id_cat = $_POST['catProducto'];
#Traemos todos los productos de la categoria
$sqlProductos = "SELECT * FROM productos WHERE id_categoria = $id_cat";
$db->setQuery($sqlProductos);
$productos = $db->loadObjectList();
if (!empty($productos)):
    foreach ($productos as $producto):
        ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Agregar Producto
        </button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Agregar Producto</h4>
                    </div>
                    <form method="post" id="frm-addProducto" enctype="multipart/form-data" action="ajax/add-producto-ajax.php">
                        <div class="modal-body">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="mostrar">
                                    Mostrar
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Nombre Producto</label>
                                <input type="text" name="nombre" class="form-control" name="nombre_remate" placeholder="Ingrese el nombre del Remate" value="">
                            </div>
                            <div class="input-group">
                                <label>Precio</label>
                                <input type="text" name="precio" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Imagen del Producto</label>
                                <input type="file" name="img">
                            </div>
                            <div class="box-body pad">
                                <label>Contenido del Producto</label>
                                <textarea class="textarea" name="contenido" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                            <input type="hidden" name="id_categoria" value="<?php echo $producto->id_categoria; ?>" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="btn-addProducto">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>Nombre Producto</th>
                <th>Precio</th>
                <th style="width: 140px">Acción</th>
            </tr>
            <tr>
                <td><?php echo utf8_encode($producto->nombre); ?></td>
                <td><?php echo number_format($producto->precio, 0, ',', '.'); ?></td>
                <td>
                    <span class="badge bg-aqua"><a href="#" role="button" style="color: #fff;" data-toggle="modal" data-target="#editProducto<?php echo $producto->id; ?>">Editar</a></span>
                    <span class="badge bg-red"><a href="#" role="button" style="color: #fff;" data-toggle="modal" data-target="#delProducto<?php echo $producto->id; ?>">Eliminar</a></span>
                </td>
            </tr>
        </table>
        <!--END EDITAR-->
        <div class="modal fade" id="editProducto<?php echo $producto->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Editar Producto</h4>
                    </div>
                    <form method="post" id="frm-addProducto" enctype="multipart/form-data" action="ajax/edit-producto-ajax.php">
                        <div class="modal-body">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="mostrar"  <?php if ($producto->mostrar == 1) echo 'checked'; ?>>
                                    Mostrar
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Nombre Producto</label>
                                <input type="text" name="nombre" class="form-control" value="<?php echo utf8_encode($producto->nombre); ?>" placeholder="Ingrese el nombre del Remate" value="">
                            </div>
                            <div class="input-group">
                                <label>Precio</label>
                                <input type="text" name="precio" class="form-control" value="<?php echo $producto->precio; ?>">
                            </div>
                            <div class="form-group">
                                <label>Imagen del Producto</label>
                                <input type="file" name="img">
                            </div>
                            <div class="box-body pad">
                                <label>Contenido del Producto</label>
                                <textarea class="textarea" name="contenido" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo utf8_encode($producto->contenido); ?></textarea>
                            </div>
                            <input type="hidden" name="id_categoria" value="<?php echo $producto->id_categoria; ?>" />
                            <input type="hidden" name="id_producto" value="<?php echo $producto->id; ?>" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="btn-addProducto">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END EDITAR-->
        <!-- modal eliminar item-->
        <div class="modal fade" id="delProducto<?php echo $producto->id; ?>" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">¿Desea eliminar el siguiente producto?</h4>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="ajax/del-producto-ajax.php">
                            <input type="hidden" value="<?php echo $producto->id; ?>" name="id" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END modal eliminar item-->
    <?php endforeach; ?>
<?php else: ?>
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-info"></i> No exites ningún producto en esta categoría!</h4>
        Lo sentimos, aún no se han cargado productos para esta categoria.
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        Agregar Producto
    </button>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Producto</h4>
                </div>
                <form method="post" id="frm-addProducto" enctype="multipart/form-data" action="ajax/add-producto-ajax.php">
                    <div class="modal-body">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="1" name="mostrar">
                                Mostrar
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Nombre Producto</label>
                            <input type="text" name="nombre" class="form-control" name="nombre_remate" placeholder="Ingrese el nombre del Remate" value="">
                        </div>
                        <div class="input-group">
                            <label>Precio</label>
                            <input type="text" name="precio" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Imagen del Producto</label>
                            <input type="file" name="img">
                        </div>
                        <div class="box-body pad">
                            <label>Contenido del Producto</label>
                            <textarea class="textarea" name="contenido" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                        <input type="hidden" name="id_categoria" value="<?php echo $id_cat; ?>" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btn-addProducto">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>


