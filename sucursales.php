<?php
include 'header.php';
$sqlLocales = "SELECT * FROM locales WHERE mostrar = 1";
$db->setQuery($sqlLocales);
$locales = $db->loadObjectList();
?>
<!-- .page-content start -->
<div class="page-content dark custom-img-background page-sucursales page-title mb-0">
    <div class="container">
        <!-- .row start -->
        <div class="row">
            <!-- .col-md-12 start -->
            <div class="col-md-12 triggerAnimation animated" data-animate='fadeInUp'>
                <!-- .simple-heading start -->
                <div class="simple-heading mb-30">
                    <h2>Nuestras Sucursales</h2>
                </div><!-- .simple-heading end -->
                <ul class="breadcrumb">
                    <li><a href="/">Inicio</a></li>
                    <li><span class="active">Sucursales</span></li>
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
            <div class="col-md-12 clearfix custom-col-padding left-col pt-80 pb-0 mb-0">
                <!-- .simple-heading start -->
                <div class="row mb-0 pt-40">
                    <div class="world-map-container">
                        <img src="img/pics/world-map.png" alt=""/>
                    </div>
                    <div class="col-md-12">
                        <div class="custom-heading">
                            <h4>Nuestras Sucursales</h4>
                        </div>
                        <?php foreach ($locales as $local): ?>
                            <div class="col-md-12">
                                <div class="col-md-5">
                                    <h5 style=" margin-bottom: 0px;"><?php echo utf8_encode($local->nombre); ?></h5>
                                    <hr style=" border: 1px solid #BBB6B6; margin-top: 5px;" />
                                    <ul class="contact-info-list">
                                        <li>
                                            <address><i class="fa fa-map-marker"></i>
                                                <?php echo utf8_encode($local->direccion); ?></address>
                                        </li>
                                        <li>
                                            <i class="fa fa-mobile"></i>
                                            <?php echo utf8_encode($local->tel1); ?>
                                            <br><?php echo utf8_encode(@$local->tel2); ?>
                                        </li>
                                        <?php if (!empty($local->email)): ?>
                                            <li>
                                                <i class="fa fa-paper-plane"></i>
                                                <a href="mailto:<?php echo utf8_encode(@$local->email); ?>"><span><?php echo utf8_encode(@$local->email); ?></span></a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                    <?php if (!empty($local->img_local)): ?>
                                    <!--<img src="<?php echo getUrl() . 'img/sucursales/' . $local->img_local; ?>" class="img-responsive" />-->
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-7" style="padding-top: 20px;">
                                    <?php echo @$local->google_maps; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
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
 