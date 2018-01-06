<?php
include 'header.php';
#Trabaja con Nosotros
$sqlTrabaja = "SELECT * FROM trabaja_con_nosotros WHERE id = 1";
$db->setQuery($sqlTrabaja);
$work = $db->loadObject();
?>
<?php if ($_SESSION['DATA'] == true): ?>
    <div class="alert-box success"><span>Gracias. Se ha enviado su CV con éxito </span>Sus datos fueron guardados en nuestra base de datos para su posterior procesamiento. <!--s<a href="#" id="close_message" style="position: relative; float: right; top: 5px;"><img src="img/close-search.png" alt="cerrar" />--></a></div>
    <?php $_SESSION['DATA'] = false; ?>
<?php endif; ?>
<!-- .page-content start -->
<div class="page-content dark custom-img-background page-trabaja page-title mb-0">
    <div class="container">
        <!-- .row start -->
        <div class="row">
            <!-- .col-md-12 start -->
            <div class="col-md-12 triggerAnimation animated" data-animate='fadeInUp'>
                <!-- .simple-heading start -->
                <div class="simple-heading mb-30">
                    <h2>Trabajá con nosotros</h2>
                </div><!-- .simple-heading end -->
                <ul class="breadcrumb">
                    <li><a href="/">Inicio</a></li>
                    <li><span class="active">Trabajá con Nosotros</span></li>
                </ul><!-- .breadcrumb end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

<!-- .page-content start -->

<div class="page-content">
    <div class="container-fluid">
        <!-- .row start -->
        <div class="row mb-0">
            <div class="col-md-6 clearfix custom-col-padding left-col pt-80 pb-0 mb-0">
                <!--                 .simple-heading start 
                                <section class="simple-heading">
                                    <h2>Envíanos tus datos y adjuntá tu CV</h2>
                                </section> .simple-heading end -->
                <?php echo utf8_encode($work->contenido); ?>
            </div><!-- .col-md-6 end -->
            <div class="col-md-6 bkg-grey custom-col-padding right-col pt-80 pb-80 mb-0">
                <div class="simple-heading">
                    <h2><?php echo utf8_encode($work->encabezado); ?></h2>
                </div><!-- .simple-heading-left end -->
                <!-- form start -->
                <form class="wpcf7" method="post" id="frm-cv" enctype="multipart/form-data" action="ajax/submit-cv-ajax.php">
                    <fieldset>
                        <span class="wpcf7-form-control-wrap your-name">
                            <input type="text" class="wpcf7-text" name="cv-name" placeholder="Nombre Completo *" required>
                        </span>
                    </fieldset>

                    <fieldset>
                        <span class="wpcf7-form-control-wrap your-email">
                            <input type="email" name="cv-email" class="wpcf7-text" placeholder="Dirección de Email *" required>
                        </span>
                    </fieldset>
                    <fieldset>
                        <span class="wpcf7-form-control-wrap your-telephone">
                            <input type="text" class="wpcf7-text" name="cv-telephone" placeholder="Teléfono *" required>
                        </span>
                    </fieldset>
                    <fieldset>
                        <span class="wpcf7-form-control-wrap your-message">
                            <textarea rows="8" class="wpcf7-textarea" name="cv-message" placeholder="Mensaje"></textarea>
                        </span>
                    </fieldset>
                    <fieldset>
                        <span class="wpcf7-form-control-wrap your-message">
                            <label>Adjunte su C.V.</label>
                            <input type="file" name="cv-file" required />
                        </span>
                        <span style="font-size: 10px; color: #7B7676;">Tipos de Archivos Permitios <img src="<?php echo getUrl(); ?>img/pdf-icon.png" alt="PDF" style="display: inline-block; position: relative; top: 5px;" />/<img src="<?php echo getUrl(); ?>img/word-icon.png" alt="Word" style="display: inline-block; position: relative; top: 5px;" /></span>
                    </fieldset>
                    <input type="submit" class="wpcf7-submit btn btn-big float-left" id="btn-submit-cv" value="Enviar">
                </form><!-- .wpcf7 end -->
            </div><!-- .col-md-6 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->

    <!-- .container start -->
    <div class="container-fluid">
        <div class="row map mb-0">
            <div id="map"></div>
        </div>          
    </div><!-- .container-fluid end -->
</div><!-- .page-content end -->
<?php include 'footer.php'; ?>