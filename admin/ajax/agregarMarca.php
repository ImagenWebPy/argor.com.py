<?php
#CONECCIONES A LA BD
include '../../db-config/database.class.php';
#INSTANCIAMOS LA BD
$db = DataBase::getInstance();
#INCLUIMOS LIBRERIAS NECESARIAS
include '../../lib/functions.php';

?>

<div class="box-body">
    <form enctype="multipart/form-data" action="<?= getUrl(); ?>admin/ajax/formMarcaAdd.php" method="post" id="editarMarca">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Marca</label>
                    <input type="text" class="form-control" placeholder="Marca" value="" name="marca[descripcion]" required>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-3">
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="marca[estado]">
                            Estado
                        </label>
                    </div>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-block btn-primary btn-flat" name="guardarCambios" type="submit">Guardar Cambios</button>
            </div>
        </div>
    </form>
</div>
