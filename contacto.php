<?php
include 'header.php';
#El contenido de Contacto
$sqlContacto = "SELECT * FROM contacto WHERE id = 1";
$db->setQuery($sqlContacto);
$contact = $db->loadObject();
$formData = '';
?>
<!-- .page-content start -->
<div class="page-content dark custom-img-background page-contacto page-title mb-0">
    <div class="container">
        <!-- .row start -->
        <div class="row">

            <!-- .col-md-12 start -->
            <div class="col-md-12 triggerAnimation animated" data-animate='fadeInUp'>
                <!-- .simple-heading start -->
                <div class="simple-heading mb-30">
                    <h2>Ponte en contacto con nosotros</h2>
                </div><!-- .simple-heading end -->
                <ul class="breadcrumb">
                    <li><a href="/">Inicio</a></li>
                    <li><span class="active">Contacto</span></li>
                </ul><!-- .breadcrumb end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->
<!-- .page-content start -->
<div class="page-content">
    <?php if (!empty($_SESSION['message'])): ?>
        <?php
        if ($_SESSION['message']['type'] == 'success') {
            $bgClass = 'bgSuccess';
            unset($_SESSION['formData']);
        } else {
            $bgClass = 'bgError';
            $formData = $_SESSION['formData'];
        }
        $message = $_SESSION['message']['mensaje'];
        ?>
        <div class="page-content custom-background <?= $bgClass; ?> dark">
            <!-- .container start -->
            <div class="container">
                <!-- .row start -->
                <div class="row mb-40 mt-40">
                    <!-- .col-md-12 start -->
                    <div class="col-md-12">
                        <!-- .call-to-action start -->
                        <div class="call-to-action clearfix">
                            <div class="text triggerAnimation animated fadeInLeft" data-animate="fadeInLeft" style="opacity: 1;">
                                <h5 style="color: #fff;">
                                    <?= $message; ?>
                                </h5>
                            </div>
                        </div><!-- .call-to-action end -->
                    </div><!-- .col-md-12 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
    <div class="container-fluid">
        <!-- .row start -->
        <div class="row mb-0">
            <div class="col-md-6 clearfix custom-col-padding left-col pt-80 pb-0 mb-0">
                <!-- .simple-heading start -->
                <section class="simple-heading">
                    <h2 style="font-size: 23px;"><?php echo utf8_encode($contact->titulo_left); ?></h2>
                </section><!-- .simple-heading end -->
                <div class="row mb-0 pt-40">
                    <div class="world-map-container">
                        <img src="img/pics/world-map.png" alt=""/>
                    </div>
                    <div class="col-md-6">
                        <div class="custom-heading">
                            <h4><?php echo utf8_encode($contact->titulo_local); ?></h4>
                        </div>
                        <ul class="contact-info-list">
                            <li>
                                <address><i class="fa fa-map-marker"></i>
                                    <?php echo utf8_encode($contact->direccion_local); ?></address>
                            </li>
                            <li>
                                <i class="fa fa-mobile"></i>
                                <?php echo utf8_encode($contact->telefono_local); ?>
                            </li>
                            <li>
                                <i class="fa fa-paper"></i>
                                <a href="mailto:<?php echo utf8_encode($contact->email_local); ?>" style=" font-size: 12px;"><span><?php echo utf8_encode($contact->email_local); ?></span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="custom-heading">
                            <h4><?php echo utf8_encode($contact->titulo_horario); ?></h4>
                        </div>
                        <ul class="contact-info-list">
                            <li>
                                <i class="fa fa-clock-o"></i>
                                <?php echo utf8_encode($contact->horario_dia); ?>
                            </li>
                            <li>
                                <i class="fa fa-clock-o"></i>
                                <?php echo utf8_encode($contact->horario_sabados); ?>
                            </li>
                            <li>
                                <i class="fa fa-info"></i>
                                <?php echo utf8_encode($contact->horario_info); ?>
                            </li>
                        </ul>
                    </div>
                </div>

            </div><!-- .col-md-6 end -->
            <div class="col-md-6 bkg-grey custom-col-padding right-col pt-80 pb-80 mb-0">
                <div class="simple-heading">
                    <h2><?php echo utf8_encode($contact->titulo_right); ?></h2>
                </div><!-- .simple-heading-left end -->
                <!-- form start -->
                <form class="wpcf7" action="ajax/contacto-ajax.php" method="post" id="contacto">
                    <fieldset>
                        <span class="wpcf7-form-control-wrap your-name">
                            <input type="text" class="wpcf7-text" name="contact-name" id="contact-name" placeholder="Tu Nombre *" required value="<?= (!empty($formData['nombre'])) ? $formData['nombre'] : ''; ?>">
                        </span>
                    </fieldset>
                    <fieldset>
                        <span class="wpcf7-form-control-wrap your-email">
                            <input type="email" name="contact-email" class="wpcf7-text" id="contact-email" placeholder="Direccion de Email *" required value="<?= (!empty($formData['email'])) ? $formData['email'] : ''; ?>">
                        </span>
                    </fieldset>
                    <fieldset>
                        <span class="wpcf7-form-control-wrap subject">
                            <input type="text" class="wpcf7-text" id="contact-subject" name="contact-subject" placeholder="Motivo" value="<?= (!empty($formData['asunto'])) ? $formData['asunto'] : ''; ?>">
                        </span>
                    </fieldset>
                    <fieldset>
                        <span class="wpcf7-form-control-wrap your-message">
                            <textarea rows="8" class="wpcf7-textarea" id="contact-message" name="contact-message" placeholder="Mensaje" required><?= (!empty($formData['mensaje'])) ? $formData['mensaje'] : ''; ?></textarea>
                        </span>
                    </fieldset>
                    <fieldset>
                        <div style="width: 100%; position: relative;">
                            <div style="width: 40%; float: left;">
                                <p><img src="captcha.php" width="120" height="30" border="1" alt="CAPTCHA" style="width: 100%;"></p>
                            </div>
                            <div style=" float: left; width: 60%;">
                                <span class="wpcf7-form-control-wrap subject">
                                    <input type="text" class="wpcf7-text" id="contact-captcha" name="contact-captcha" placeholder="Ingrese el código" value="<?= (!empty($formData['codigo'])) ? $formData['codigo'] : ''; ?>">
                                </span>
                            </div>
                        </div>
                    </fieldset>
                    <input type="submit" class="wpcf7-submit btn btn-big float-left" value="Enviar">
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
<?php
include 'footer.php';
unset($_SESSION['formData']);
?>
 