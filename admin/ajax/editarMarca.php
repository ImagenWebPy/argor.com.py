<?php
if (!empty($_POST)) {
    #CONECCIONES A LA BD
    include '../../db-config/database.class.php';
#INSTANCIAMOS LA BD
    $db = DataBase::getInstance();
#INCLUIMOS LIBRERIAS NECESARIAS
    include '../../lib/functions.php';
    #Datos del producto
    $id_marca = $_POST['id_marca'];
    #Marca
    $sqlMarca = "select m.id, m.descripcion, m.estado from marca m where m.id = $id_marca";
    $db->setQuery($sqlMarca);
    $marca = $db->loadObject();
}
?>

<div class="box-body">
    <form enctype="multipart/form-data" action="<?= getUrl(); ?>admin/ajax/formMarca.php" method="post" id="editarMarca">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Marca</label>
                    <input type="text" class="form-control" placeholder="Marca" value="<?= utf8_encode($marca->descripcion); ?>" name="marca[descripcion]" required>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-3">
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="marca[estado]" <?= ($marca->estado == 1) ? 'checked' : '' ?>>
                            Estado
                        </label>
                    </div>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
        </div><!-- /.row -->
        <hr>
        <input type="hidden" name="marca[id]" value="<?= $marca->id; ?>" />
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-block btn-primary btn-flat" name="guardarCambios" type="submit">Guardar Cambios</button>
            </div>
        </div>
    </form>
</div>
