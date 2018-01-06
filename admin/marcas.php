<?php
include 'header.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Listado de Marcas
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
                <h3 class="box-title">Marcas</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <button class="btn btn-primary pull-right btnAgregarMarca" style=" position: relative; top: -5px;"><i class="fa fa-plus" aria-hidden="true"></i>Agregar Producto</button>
                <table id="tablaMarcas" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Marca</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>Marca</th>
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
                <h4 class="modal-title">Modificar Marca</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var table = $("#tablaMarcas").DataTable({
            "aaSorting": [[0, 'asc']],
            "paging": true,
            "orderCellsTop": true,
            //"scrollX": true,
            //"scrollCollapse": true,
            "fixedColumns": true,
            "iDisplayLength": 50,
            "ajax": "<?= getUrl(); ?>admin/ajax/cargarMarca.php",
            "columns": [
                {"data": "marca"},
                {"data": "estado"},
                {"data": "accion"}
            ]
        });
        $(document).on("click", ".cambiarEstadoMarca", function () {
            var btn = $(this);
            var id_marca = btn.attr("data-marca");
            var estado = btn.attr("data-estado");
            $.ajax({
                type: 'POST',
                url: '<?= getUrl(); ?>admin/ajax/cambiarEstadoMarca.php',
                dataType: 'json',
                data: {id_marca: id_marca,
                    estado: estado},
                success: function (data) {
                    if (data['type'] == true) {
                        btn.html('<span class="label label-' + data['css'] + '">' + data['estado'] + '</span>');
                        btn.attr('data-estado', data['id_estado']);
                    }
                }
            });//END AJAX

        });
        $(document).on("click", ".btnEditarMarca", function () {
            var marca = $(this).attr("data-marca");
            $.ajax({
                type: 'POST',
                url: 'ajax/editarMarca.php',
                data: {id_marca: marca},
                success: function (data) {
                    $(".modalModal .modal-body").html(data);
                }
            });//END AJAX
            $(".modalModal").modal("toggle");

        });
        $(".btnAgregarMarca").click(function () {
            $.ajax({
                type: 'POST',
                url: 'ajax/agregarMarca.php',
                success: function (data) {
                    $(".modalModal .modal-body").html(data);
                }
            });//END AJAX
            $(".modalModal").modal("toggle");

        });
    });

</script>
<?php include 'footer.php'; ?>