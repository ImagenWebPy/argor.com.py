<?php
include 'header.php';
#El contenido de La Empresa
$sqlEmpresa = "SELECT * FROM la_empresa WHERE id = 1";
$db->setQuery($sqlEmpresa);
$business = $db->loadObject();
?>
<!-- .page-content start -->
<div class="page-content dark custom-img-background page-title-1 page-title mb-80">
    <div class="container">
        <!-- .row start -->
        <div class="row">
            <!-- .col-md-12 start -->
            <div class="col-md-12 triggerAnimation animated" data-animate='fadeInUp'>
                <!-- .simple-heading start -->
                <div class="simple-heading mb-30">
                    <h1>La Empresa</h1>
                </div><!-- .simple-heading end -->
                <ul class="breadcrumb">
                    <li><a href="/">Inicio</a></li>
                    <li><span class="active">La Empresa</span></li>
                </ul><!-- .breadcrumb end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->
<div class="page-content">
    <div class="container">
        <!-- .row start -->
        <div class="row">
            <!-- .col-md-12 start -->
            <div class="col-md-12">
                <section class="simple-heading">
                    <h2><?php echo utf8_encode($business->titulo1); ?></h2>
                </section>
                <h3><?php echo utf8_encode($business->contenido1); ?></h3>
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->
<div class="page-content padding-0 mb-80">
    <div class="container-fluid">
        <!-- .row start -->
        <div class="row row-equal-height mb-0">
            <div class="col-md-6 hidden-xs col-sm-4 custom-background custom-img-background bkg-img6 pt-0">
            </div><!-- .col-md-6 end -->

            <div class="col-md-6 col-xs-12 col-sm-8 right-col custom-col-padding pt-0 pb-0 clearfix">
                <!-- .simple-heading start -->
                <section class="simple-heading">
                    <h3><strong><?php echo utf8_encode($business->titulo2); ?></strong></h3>
                </section><!-- .simple-heading end -->
                <?php echo utf8_encode($business->contenido2); ?>
            </div><!-- .col-md-6 end -->
        </div><!-- .row end -->
    </div><!-- .container-fluid end -->
</div><!-- .page-content end -->
<div class="page-content">
    <div class="container">
        <!-- .row start -->
        <div class="row">
            <!-- .col-md-4 start -->
            <div class="col-md-4">
                <div class="service-box-3 triggerAnimation animated" data-animate='fadeInUp'>
                    <h3>Misión</h3>
                    <p>
                        <?php echo utf8_encode($business->mision); ?>
                    </p>
                </div><!-- .service-box-3 end -->
            </div><!-- .col-md-4 end -->
            <!-- .col-md-4 start -->
            <div class="col-md-4">
                <div class="service-box-3 triggerAnimation animated" data-animate='fadeInUp'>                     
                    <h3>Visión</h3>
                    <p>
                        <?php echo utf8_encode($business->vision); ?>
                    </p>
                </div><!-- .service-box-3 end -->
            </div><!-- .col-md-4 end -->
            <!-- .col-md-4 start -->
            <div class="col-md-4">
                <div class="service-box-3 triggerAnimation animated" data-animate='fadeInUp'>
                    <h3>Valores</h3>
                    <?php echo utf8_encode($business->valores); ?>
                </div><!-- .service-box-3 end -->
            </div><!-- .col-md-4 end -->
        </div><!-- .row end -->        
    </div><!-- .container end -->
</div><!-- .page-content end -->
<div class="page-content dark custom-background custom-img-background bkg-img7 centered mb-80">
    <div class="container">
        <!-- .row start -->
        <div class="row mb-140">
            <!-- .col-md-12 start -->
            <div class="col-md-12 triggerAnimation animated centered" data-animate='fadeInUp'>
                <!-- .simple-heading start -->
                <div class="simple-heading small">
                    <h2><?php echo utf8_encode($business->titulo_pas); ?></h2>
                </div><!-- .simple-heading end -->
                <div class="subtitle">
                    <h3><?php echo utf8_encode($business->pas); ?></h3>
                </div>
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

<div class="page-content custom-background bkg-green dark">
    <!-- .container start -->
    <div class="container">
        <!-- .row start -->
        <div class="row mb-40 mt-40">
            <!-- .col-md-12 start -->
            <div class="col-md-12">
                <!-- .call-to-action start -->
                <div class="call-to-action clearfix">
                    <div class="text triggerAnimation animated" data-animate='fadeInLeft'>
                        <h2>¿Necesitas una solución urgente a tus problemas?</h2>
                        <h5>
                            Nosotros te la brindamos. ABRIMOS LAS 24 HORAS
                        </h5>
                    </div>
                    <table border="0">
                        <tr>
                            <td>
                                <a href='#' class="btn btn-big black float-left uppercase triggerAnimation animated" data-animate='fadeInRight'>
                                    <span>Sucursal Asunción</span>
                                </a>
                                <div style="clear: both;"></div>
                                <p class="triggerAnimation animated" style=" margin: 5px 0px 0px 15px;">Avda. Eusebio Ayala c/ Calle 1811<br/>Teléfono: 203 040<br />Domingos y Feriados</p>
                            </td>
                        </tr>
                    </table>
                </div><!-- .call-to-action end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content.custom-background end -->
<?php include 'footer.php'; ?>