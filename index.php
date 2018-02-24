<?php
include 'header.php';
#Banner1
$sqlBanner1 = "SELECT * FROM banner WHERE id = 1 and mostrar = 1";
$db->setQuery($sqlBanner1);
$banner1 = $db->loadObject();
#Banner2
$sqlBanner2 = "SELECT * FROM banner WHERE id = 2 and mostrar = 1";
$db->setQuery($sqlBanner2);
$banner2 = $db->loadObject();
?>
<div id="masterslider" class="master-slider ms-skin-default">
    <!-- slide  start -->
    <div class="ms-slide slide-1">
        <!-- slide background -->
        <img src="./masterslider/style/blank.gif" data-src="img/slider/<?php echo utf8_encode($banner1->img); ?>" alt="<?php echo utf8_encode($banner1->titulo); ?>"/> 
        <!-- slide text box layer -->
        <div class="ms-layer slide-text-box" 
             data-effect="skewleft(15,250)"
             data-duration="1300"
             data-ease="easeOutBack"
             data-delay="0" 
             >
        </div>
        <!-- slide heading layer -->
        <h2 class="ms-layer pi-caption01"  
            data-type="text"
            data-effect="top(40)"
            data-duration="2000"
            data-ease="easeOutExpo"
            data-delay="500"
            >
                <?php echo utf8_encode($banner1->titulo); ?>
        </h2>

        <!-- slide text layer -->
        <p class="ms-layer pi-text"
           data-type="text"
           data-effect="top(40)"
           data-duration="2000"
           data-ease="easeOutExpo"
           data-delay="1000"
           >
               <?php echo utf8_encode($banner1->descripcion); ?>
        </p>

        <!-- slide button layer -->
        <a href="<?php echo utf8_encode($banner1->enlace); ?>" class="ms-layer slide-small-btn"
           data-type="text"
           data-effect="top(40)"
           data-duration="1000"
           data-ease="easeOutExpo"
           data-delay="1300"
           >
            <i class="fa fa-angle-right fa-right"></i>
        </a>
    </div><!-- .ms-slide end -->
    <!-- slide start -->
    <div class="ms-slide slide-2">
        <!-- slide background -->
        <img src="./masterslider/style/blank.gif" data-src="img/slider/<?php echo utf8_encode($banner2->img); ?>" alt="<?php echo utf8_encode($banner2->titulo); ?>"/> 
        <!-- slide heading layer -->
        <h2 class="ms-layer pi-caption01"  
            data-type="text"
            data-effect="top(40)"
            data-duration="2000"
            data-ease="easeOutExpo"
            data-delay="0"
            >
                <?php echo utf8_encode($banner2->titulo); ?>
        </h2>
        <!-- slide heading layer -->
        <h4 class="ms-layer pi-caption03"
            data-type="text"
            data-effect="top(40)"
            data-duration="2000"
            data-ease="easeOutExpo"
            data-delay="400"
            >
                <?php echo utf8_encode($banner2->descripcion); ?>
        </h4>
        <!-- slide button layer -->
        <a class="ms-layer btn-right btn btn-medium green" href="<?php echo utf8_encode($banner2->enlace); ?>"
           data-type="text"
           data-effect="right(40)"
           data-duration="2000"
           data-ease="easeOutExpo"
           data-delay="900">
            <span><?php echo utf8_encode($banner2->texto_enlace); ?></span>
        </a>
    </div><!-- .ms-slide end -->
</div><!-- #masterslider end -->
<?php
#Section1
$sqlSection1 = "SELECT * FROM section_1";
$db->setQuery($sqlSection1);
$section1 = $db->loadObject();
?>
<?php if ($section1->mostrar == 1): ?>
    <!--SECTION1-->
    <div class="page-content pt-80">
        <div class="container">
            <!-- .row start -->
            <div class="row">
                <!-- .col-md-8 start -->
                <div class="col-md-8 triggerAnimation animated" data-animate='fadeInUp'>
                    <section class="simple-heading">
                        <h2><?php echo utf8_encode($section1->titulo); ?></h2>
                    </section>
                    <h1 style="font-size: 18px;line-height: 24px;"><?php echo utf8_encode($section1->encabezado_1); ?></h1>
                    <h3><?php echo utf8_encode($section1->encabezado_2); ?></h3>
                </div><!-- .col-md-8 end -->
            </div><!-- .row end -->
            <!-- .row start -->
            <div class="row">
                <?php
                #Section1 Listado
                $sqlSection1_listado = "SELECT * FROM section_1_lista";
                $db->setQuery($sqlSection1_listado);
                $section1_listado = $db->loadObjectList();
                ?>
                <?php foreach ($section1_listado as $item): ?>
                    <?php if ($item->mostrar == 1): ?>
                        <!-- .col-md-4 start -->
                        <div class="col-md-4">
                            <div class="service-box-1">
                                <div class="icon-container triggerAnimation animated" data-animate='zoomIn'>
                                    <?php if (empty($item->fa_icon)): ?>
                                        <img src="img/<?php echo utf8_encode($item->img); ?>" alt="" />
                                    <?php else: ?>
                                        <?= $item->fa_icon; ?>
                                    <?php endif; ?>
                                </div>
                                <a href="<?php echo utf8_encode($item->enlace); ?>"><h5><?php echo utf8_encode($item->titulo); ?></h5></a>
                                <?php echo utf8_encode($item->contenido); ?>
                            </div><!-- .service-box-1 end -->
                        </div><!-- .col-md-4 end -->
                    <?php endif; ?>
                <?php endforeach; ?>
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->
    <!-- END SECTION1 -->
<?php endif; ?>
<?php
#Section2
$sqlSection2 = "SELECT * FROM section_2 where id = 1";
$db->setQuery($sqlSection2);
$section2 = $db->loadObject();
?>
<?php if ($section2->mostrar == 1): ?>
    <!-- SECTION2 -->
    <div class="page-content mb-80 padding-0">
        <div class="container-fluid">
            <div class="row row-equal-height mb-0">
                <!-- .col-md-5 start -->
                <div class="col-md-5 hidden-xs hidden-sm custom-img-background bkg-img1">
                </div><!-- .col-md-5 end -->
                <div class="col-md-5 col-xs-12 col-sm-8 custom-background custom-col-padding bkg-darkgrey clearfix dark">
                    <!-- .simple-heading start -->
                    <section class="simple-heading">
                        <h2><?php echo utf8_encode($section2->titulo); ?></h2>
                    </section><!-- .simple-heading end -->

                    <h2><?php echo utf8_encode($section2->encabezado); ?></h2>
                    <?php echo utf8_encode($section2->contenido); ?>
                    <a class="btn btn-medium green float-left" href="<?php echo utf8_encode($section2->enlace); ?>">
                        <span>Leer más <i class="fa fa-angle-right fa-right"></i></span>
                    </a>
                </div><!-- .col-md-5 end -->
                <!-- .col-md-2 start -->
                <div class="col-md-2 hidden-xs col-sm-4 custom-img-background bkg-img2">
                </div><!-- .col-md-2 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->
    <!-- END SECTION2 -->
<?php endif; ?>
<?php
#Section3
$sqlSection3 = "SELECT * FROM section_3 where id = 1";
$db->setQuery($sqlSection3);
$section3 = $db->loadObject();
#Section3 Lista
$sqlSection3_Lista = "SELECT * FROM section_3_lista";
$db->setQuery($sqlSection3_Lista);
$section3_lista = $db->loadObjectList();
?>
<?php if ($section3->mostrar == 1): ?>
    <!--SECTION3-->
    <div class='page-content bkg-img-right bkg-img-contain bkg-img3'>
        <div class="container">
            <!-- .row start -->
            <div class="row mb-0">
                <!-- .col-md-6 start -->
                <div class="col-md-6 col-xs-12 triggerAnimation animated" data-animate='fadeInLeft'>
                    <div class="simple-heading">
                        <h2><?php echo utf8_encode($section3->titulo); ?></h2>
                    </div><!-- .simple-heading-left end -->
                    <ul>
                        <?php foreach ($section3_lista as $item): ?>
                            <li><?php echo utf8_encode($item->descripcion); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a class="btn btn-medium black float-left" href='<?php echo utf8_encode($section3->enlace); ?>'>
                        <span>Leer más<i class="fa fa-angle-right fa-right"></i></span>
                    </a>
                </div><!-- .col-md-6 end -->
                <!-- .col-md-6 start -->
                <div class="col-md-6 hidden-xs">
                </div>
                <!-- .col-md-6 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->
<?php endif; ?>
<!--END SECTION3-->
<?php
#Section4
$sqlSection4 = "SELECT * FROM section_4 where id = 1";
$db->setQuery($sqlSection4);
$section4 = $db->loadObject();
?>
<?php if ($section4->mostrar == 1): ?>
    <!--SECTION 4-->
    <div class="page-content pt-80">
        <div class="container">
            <!-- .row start -->
            <div class="row">
                <!-- .col-md-12 start -->
                <div class="col-md-12">
                    <!-- .simple-heading start -->
                    <section class="simple-heading center triggerAnimation animated" data-animate='fadeInUp'>
                        <h2><?php echo utf8_encode($section4->titulo); ?></h2>
                        <h3 style=" text-align: center;">
                            <?php echo utf8_encode($section4->encabezado); ?>
                        </h3>
                    </section><!-- .simple-heading end -->
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->
    <!--END SECTION 4-->
<?php endif; ?>
<?php
#Section5
$sqlSection5 = "SELECT * FROM section_5 where id = 1";
$db->setQuery($sqlSection5);
$section5 = $db->loadObject();
?>
<?php if ($section5->mostrar == 1): ?>
    <!--SECTION5-->
    <div class="page-content mb-80">
        <div class="container-fluid">

            <!-- .row start -->
            <div class="row row-equal-height mb-0">
                <div class="col-md-6 col-xs-12 col-sm-12 custom-background bkg-darkgrey custom-col-padding clearfix dark centered">
                    <!-- .simple-heading start -->
                    <section class="simple-heading">
                        <h2><?php echo utf8_encode($section5->titulo); ?></h2>
                    </section><!-- .simple-heading end -->
                    <?php echo utf8_encode($section5->contenido); ?>
                    <a class="btn btn-medium green btn-centered" href="#openModal">
                        <span><?php echo utf8_encode($section5->texto_enlace); ?><i class="fa fa-angle-right fa-right"></i></span>
                    </a>
                </div><!-- .col-md-6 end -->
                <div class="col-md-6 hidden-xs hidden-sm custom-background custom-img-background bkg-img4">
                </div><!-- .col-md-6 end -->
            </div><!-- .row end -->
            <div id="openModal" class="modalDialog">
                <div style="background-image: url('img/pics/tasar.jpg');">	
                    <a href="#close" title="Close" class="close">X</a>
                    <h2 style="color: #fff;"><img src="<?php echo getUrl() ?>img/whatsapp-logo.png" alt="Whatsapp Logo" style=" display: inline-block; position: relative; top: 15px; left: -5px;"/><?php echo utf8_encode($section5->texto_enlace); ?></h2>
                    <p style=" color: #C1C1C1;"><?php echo utf8_encode($section5->texto_whatsapp); ?></p>
                    <p style=" color: #fff; font-weight: bold; font-size: 30px; text-align: center;"><?php echo utf8_encode($section5->nro_whatsapp); ?></p>
                </div>
            </div>
        </div><!-- .container end -->
    </div><!-- .page-content end -->
    <!--END SECTION5-->
<?php endif; ?>
<?php
#Section6
$sqlSection6 = "SELECT * FROM section_6 where id = 1";
$db->setQuery($sqlSection6);
$section6 = $db->loadObject();
?>
<?php if ($section6->mostrar == 1): ?>
    <!--SECTION6-->
    <div class="page-content">
        <div class="container">
            <!-- .row start -->
            <div class="row">
                <!-- .col-md-8 end -->
                <div class="col-md-8 triggerAnimation animated" data-animate='fadeInUp'>
                    <!-- .simple-heading start -->
                    <div class="simple-heading">
                        <h2><?php echo utf8_encode($section6->titulo); ?></h2>
                    </div><!-- .simple-heading end -->
                    <h3><?php echo utf8_encode($section6->contenido); ?></h3>
                </div><!-- .col-md-8 end -->
            </div><!-- .row end -->
            <!-- .row start -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->
<?php endif; ?>
<!--END SECTION6-->
<?php
#Remates
$sqlRemate = "SELECT * FROM remate order by id desc limit 1";
$db->setQuery($sqlRemate);
$remate = $db->loadObject();
?>
<?php if ($remate->mostrar == 1): ?>
    <!--REMATES->
    <!-- .page-content start -->
    <div class="page-content dark custom-img-background parallax parallax-1" data-stellar-background-ratio="1.4">
        <div class="container">
            <!-- .row start -->
            <div class="row mb-140">
                <!-- .col-md-12 start -->
                <div class="col-md-12 triggerAnimation animated centered" data-animate='fadeInUp'>
                    <!-- .simple-heading start -->
                    <div class="simple-heading">
                        <h2><?php echo utf8_encode($remate->titulo); ?></h2>
                        <?php setlocale(LC_TIME, "es_ES"); ?>
                        <h3><?php
                            echo strftime('%d-%B-%Y', strtotime($remate->fecha_remate));
                            ?></h3>
                        <?php
                        if (!empty($remate->contenido))
                            echo utf8_encode($remate->contenido);
                        ?>
                    </div><!-- .simple-heading end -->
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->
    <!--END REMATES-->
<?php endif; ?>
<?php
#Section7
$sqlSection7 = "SELECT * FROM section_7 where id = 1";
$db->setQuery($sqlSection7);
$section7 = $db->loadObject();
?>
<?php if ($section7->mostrar == 1): ?>
    <!--SECTION7-->
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
                            <h2><?php echo utf8_encode($section7->titulo); ?></h2>
                            <h5>
                                <?php echo utf8_encode($section7->contenido); ?>
                            </h5>
                        </div>
                        <table border="0">
                            <tr>
                                <td>
                                    <a href='#' class="btn btn-big black float-left uppercase triggerAnimation animated" data-animate='fadeInRight'>
                                        <span><?php echo utf8_encode($section7->nombre_sucursal); ?></span>
                                    </a>
                                    <div style="clear: both;"></div>
                                    <p class="triggerAnimation animated" style=" margin: 5px 0px 0px 15px;"><?php echo utf8_encode($section7->datos_sucursal); ?><br /><?php echo utf8_encode($section7->texto_sucursal); ?></p>
                                </td>
                            </tr>
                        </table>
                    </div><!-- .call-to-action end -->
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content.custom-background end -->
    <!--END SECTION7-->
<?php endif; ?>
<?php include 'footer.php'; ?>