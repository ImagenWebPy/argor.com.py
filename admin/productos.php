<?php
include 'header.php';
$sqlListado = "select p.id, 
			p.nombre, 
			p.codigo, 
			m.descripcion as marca, 
			p.imagen,
                        p.precio,
                        p.estado as id_estado,
			CASE p.estado when 1 then 'Activo' when 0 then 'Deshabilitado' end as estado 
from producto p 
LEFT JOIN marca m on m.id = p.id_marca 
ORDER BY p.nombre ASC";
$db->setQuery($sqlListado);
$listado = $db->loadObjectList();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Listado de Productos
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Listado</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Productos</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <button class="btn btn-primary pull-right btnAgregar" style=" position: relative; top: -5px;"><i class="fa fa-plus" aria-hidden="true"></i>Agregar Producto</button>
                <table id="tablaProductos" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listado as $item): ?>
                            <?php
                            $imagen = $item->imagen;
                            $imagen = explode('|', $imagen);
                            ?>
                            <tr>
                                <td><img src="<?= getUrl(); ?>img/productos/<?= $imagen[0]; ?>" class="img-responsive" alt="<?= utf8_encode($item->nombre); ?>" style=" width: 80px; margin: 0 auto;"> </td>
                                <td><?= utf8_encode($item->codigo); ?></td>
                                <td><?= utf8_encode($item->nombre); ?></td>
                                <td><?= utf8_encode($item->marca); ?></td>
                                <td><?= number_format($item->precio, 0, ',', '.'); ?></td>
                                <td>
                                    <?php if ($item->estado == 'Activo'): ?>
                                        <a id="estado<?= $item->id; ?>" class="pointer cambiarEstadoProducto" data-producto="<?= $item->id; ?>" data-estado="1"><span class="label label-success"><?= $item->estado; ?></span></a>
                                    <?php else: ?>
                                        <a id="estado<?= $item->id; ?>" class="pointer cambiarEstadoProducto" data-producto="<?= $item->id; ?>" data-estado="0"><span class="label label-danger"><?= $item->estado; ?></span></a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a class="btn btn-app small-btn pointer btnEditar" data-producto="<?= $item->id; ?>"><i class="fa fa-edit"></i>Editar</a>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Imagen</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade modalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modificar Producto</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#tablaProductos").DataTable();
        $(document).on("click", ".cambiarEstadoProducto", function () {
            var btn = $(this);
            var id_producto = btn.attr("data-producto");
            var estado = btn.attr("data-estado");
            $.ajax({
                type: 'POST',
                url: 'ajax/cambiarEstadoProducto.php',
                dataType: 'json',
                data: {id_producto: id_producto,
                    estado: estado},
                success: function (data) {
                    if (data['type'] == true) {
                        btn.html('<span class="label label-' + data['css'] + '">' + data['estado'] + '</span>');
                        btn.attr('data-estado', data['id_estado']);
                    }
                }
            });//END AJAX
        });
        $(document).on("click", ".btnEditar", function () {
            var producto = $(this).attr("data-producto");
            $.ajax({
                type: 'POST',
                url: 'ajax/editarProducto.php',
                data: {id_producto: producto},
                success: function (data) {
                    $(".modalModal .modal-body").html(data);
                }
            });//END AJAX
            $(".modalModal").modal("toggle");

        });

        $(".btnAgregar").click(function () {
            $.ajax({
                type: 'POST',
                url: 'ajax/agregarProducto.php',
                success: function (data) {
                    $(".modalModal .modal-body").html(data);
                }
            });//END AJAX
            $(".modalModal").modal("toggle");

        });
    });
</script>
<?php include 'footer.php'; ?>
