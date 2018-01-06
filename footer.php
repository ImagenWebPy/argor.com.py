<?php
#Coordenadas del mapa de contacto
$sqlMap = "SELECT map_latitude, map_longitude FROM contacto WHERE id = 1";
$db->setQuery($sqlMap);
$map = $db->loadObject();
#redes sociales
$sqlRedes = "SELECT * FROM redes_sociales WHERE mostrar = 1";
$db->setQuery($sqlRedes);
$redes = $db->loadObjectList();
#tags
$sqlTags = "SELECT * FROM tags WHERE mostrar = 1";
$db->setQuery($sqlTags);
$tags = $db->loadObjectList();
#La empresa
$sqlLaEmpresa = "SELECT contenido1 FROM la_empresa WHERE id = 1";
$db->setQuery($sqlLaEmpresa);
$laEmpresa = $db->loadObject();
#Contacto
$sqlContactoFooter = "SELECT * FROM contacto WHERE id = 1";
$db->setQuery($sqlContactoFooter);
$contactoFooter = $db->loadObject();
?>
<!-- #footer-wrapper start -->
<div id="footer-wrapper">
    <!-- #footer start -->
    <footer id="footer">
        <!-- .container start -->
        <div class="container">
            <!-- .row start -->
            <div class="row">
                <!-- .footer-widget-container start -->
                <ul class="col-md-3 col-sm-6 footer-widget-container">
                    <!-- .widget.widget_text -->
                    <li class="widget widget_text">
                        <div class="title">
                            <h3>La empresa</h3>
                        </div>

                        <p>
                            <?php echo utf8_encode(substr($laEmpresa->contenido1, 0, 240)); ?>
                        </p>
                        <a href="<?php echo getUrl() ?>empresa"><span>Leer más...</span></a>
                        <ul class="social-links">
                            <?php foreach ($redes as $red): ?>
                                <li><a href="<?php echo $red->url; ?>"><i class="<?php echo $red->img; ?>"></i></a></li>
                            <?php endforeach; ?>
                        </ul>

                    </li><!-- .widget end -->
                </ul><!-- .col-md-3.footer-widget-container end -->
                <!-- .footer-widget-container start -->
                <!-- .footer-widget-container start -->
                <ul class="col-md-6 col-sm-6 footer-widget-container">
                    <!-- .widget_tag_cloud start -->
                    <li class="widget widget_tag_cloud">
                        <div class="title">
                            <h3>Tags</h3>
                        </div>
                        <div class="tagcloud">
                            <?php foreach ($tags as $tag): ?>
                                <a href="#"><?php echo utf8_encode($tag->descripcion); ?></a>
                            <?php endforeach; ?>
                        </div>
                    </li><!-- .widget_tag_cloud end -->
                </ul><!-- .col-md-3.footer-widget-container end -->
                <!-- .footer-widget-container start -->
                <ul class="col-md-3 col-sm-6 footer-widget-container contact-info-widget-bkg">
                    <!-- .widget.contact-info start -->
                    <li class="widget contact-info">
                        <div class="title">
                            <h3>Información de Contacto</h3>
                        </div>

                        <ul class="contact-info-list">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <?php echo utf8_encode($contactoFooter->direccion_local); ?>
                            </li>

                            <li>
                                <i class="fa fa-mobile"></i>
                                Teléfono: <?php echo utf8_encode($contactoFooter->telefono_local); ?>
                            </li>

                            <li>
                                <i class="fa fa-paper-plane"></i>
                                <a href="mailto:<?php echo utf8_encode($contactoFooter->email_local); ?>"><span><?php echo utf8_encode($contactoFooter->email_local); ?></span></a>
                            </li>
                        </ul>
                    </li><!-- .widget.contact-info end -->
                </ul><!-- .footer-widget-container end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </footer><!-- #footer end -->
</div><!-- #footer-wrapper end -->
<!-- #copyright-container start -->
<div id="copyright-container">
    <!-- .container start -->
    <div class="container">
        <!-- .row start -->
        <div class="row">
            <!-- .col-md-6 start -->
            <div class="col-md-6">
                <p><img src="<?php echo getUrl(); ?>img/logo.png" alt="Argor" style=" width: 16%;"/> © 2015 <span>Argor Empeños</span></p>
            </div><!-- .col-md-6 end -->

            <!-- .col-md-6 start -->
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <?php if ($inicio[0]['mostrar'] == 1): ?>
                        <li><a href="<?php echo $inicio[0]['url']; ?>"><?php echo $inicio[0]['titulo']; ?></a></li>
                    <?php endif; ?>
                    <?php if ($empresa[0]['mostrar'] == 1): ?>
                        <li><a href="<?php echo getUrl() . $empresa[0]['url']; ?>"><?php echo $empresa[0]['titulo']; ?></a></li><!-- MENU ITEM .dropdown end -->
                    <?php endif; ?>
                    <?php if ($ofertas[0]['mostrar'] == 1): ?>
                        <li><a href="<?php echo getUrl() . $ofertas[0]['url']; ?>"><?php echo $ofertas[0]['titulo']; ?></a></li>
                    <?php endif; ?>
                    <?php if ($sucursales[0]['mostrar'] == 1): ?>
                        <li><a href="<?php echo getUrl() . $sucursales[0]['url']; ?>"><?php echo $sucursales[0]['titulo']; ?></a></li>
                    <?php endif; ?>
                    <?php if ($trabaja[0]['mostrar'] == 1): ?>
                        <li><a href="<?php echo getUrl() . $trabaja[0]['url']; ?>"><?php echo $trabaja[0]['titulo']; ?></a></li>
                    <?php endif; ?>
                    <?php if ($contacto[0]['mostrar'] == 1): ?>
                        <li><a href="<?php echo getUrl() . $contacto[0]['url']; ?>"><?php echo $contacto[0]['titulo']; ?></a></li>
                    <?php endif; ?>
                </ul>
            </div><!-- .col-md-6 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->

    <a href="#" class="scroll-up">UP</a>

</div><!-- .copyright-container end -->


<script src="<?php echo getUrl(); ?>js/bootstrap.min.js"></script><!-- .bootstrap script -->
<script src="<?php echo getUrl(); ?>js/jquery.scripts.min.js"></script><!-- modernizr, retina, stellar for parallax -->  
<script src="<?php echo getUrl(); ?>masterslider/masterslider.min.js"></script><!-- Master slider main js -->
<script src="<?php echo getUrl(); ?>masterslider/jquery.easing.min.js"></script><!-- Master slider easing js -->
<script src='<?php echo getUrl(); ?>owl-carousel/owl.carousel.min.js'></script><!-- Carousels script -->
<script src="<?php echo getUrl(); ?>js/jquery.dlmenu.min.js"></script><!-- for responsive menu -->
<script src="<?php echo getUrl(); ?>js/include.js"></script><!-- custom js functions -->
<?php if ($pageName == 'trabaja-con-nosotros'): ?>
    <!--JS FOR FILEUPLOAD-->
    <script src="<?php echo getUrl(); ?>js/html5fileupload.min.js"></script><!-- custom js functions -->
<?php endif; ?>
<?php if (($pageName == 'ofertas') || ($pageName == 'ofertas-producto.php')): ?>
    <script src="<?php echo getUrl(); ?>js/jquery.isotope.min.js"></script><!-- jQuery isotope plugin -->
    <script src="<?php echo getUrl(); ?>js/jquery.magnific-popup.min.js"></script><!-- used for image lightbox -->
    <script src="<?php echo getUrl(); ?>js/portfolio.js"></script><!-- for portfolio -->
    <script src="<?php echo getUrl(); ?>js/cloud-zoom.js"></script><!-- for portfolio -->
    <script src="<?php echo getUrl(); ?>js/jquery.flexslider.js"></script><!-- for portfolio -->
<?php endif; ?>
<?php if ($pageName == 'contacto'): ?>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script> <!-- google maps -->
    <script src="js/jquery.ui.map.full.min.js"></script><!-- google maps -->
    <script>
        /* <![CDATA[ */
        jQuery(document).ready(function ($) {
            'use strict';

            // GOOGLE MAPS START
            window.marker = null;

            function initialize() {
                var map;
                var myLatLng = {lat: <?php echo $map->map_latitude; ?>, lng: <?php echo $map->map_longitude; ?>};
                var style = [
                    {"featureType": "road",
                        "elementType":
                                "labels.icon",
                        "stylers": [
                            {"saturation": 1},
                            {"gamma": 0},
                            {"visibility": "on"},
                            {"hue": "#e6ff00"}

                        ]
                    },
                    {"elementType": "geometry", "stylers": [
                            {"saturation": -100},
                            {"lightness": 25}
                        ]
                    }
                ];

                var mapOptions = {
                    // SET THE CENTER
                    center: myLatLng,
                    // SET THE MAP STYLE & ZOOM LEVEL
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    zoom: 18,
                    // SET THE BACKGROUND COLOUR
                    backgroundColor: "#ccc",
                    // REMOVE ALL THE CONTROLS EXCEPT ZOOM
                    panControl: true,
                    zoomControl: true,
                    mapTypeControl: true,
                    scaleControl: true,
                    streetViewControl: true,
                    overviewMapControl: true,
                    scrollwheel: false,
                    zoomControlOptions: {
                        style: google.maps.ZoomControlStyle.SMALL
                    }

                };
                map = new google.maps.Map(document.getElementById('map'), mapOptions);

                // SET THE MAP TYPE
                var mapType = new google.maps.StyledMapType(style, {name: "Grayscale"});
                map.mapTypes.set('grey', mapType);
                map.setMapTypeId('grey');

                //CREATE A CUSTOM PIN ICON
                var marker_image = 'img/pin.png';
                var pinIcon = new google.maps.MarkerImage(marker_image, null, null, null, new google.maps.Size(78, 111));


                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    icon: pinIcon,
                    title: 'Casa Central!'
                });

                var center;
                function calculateCenter() {
                    center = map.getCenter();
                }
                google.maps.event.addDomListener(map, 'idle', function () {
                    calculateCenter();
                });
                google.maps.event.addDomListener(window, 'resize', function () {
                    map.setCenter(center);
                });
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        });
        /* ]]> */
    </script>
<?php endif; ?>
<script>
    /* <![CDATA[ */
    jQuery(document).ready(function ($) {
        'use strict';
        // MASTER SLIDER START
        var slider = new MasterSlider();
        slider.control('bullets');
        slider.setup('masterslider', {
            width: 1140, // slider standard width
            height: 854, // slider standard height
            space: 0,
            speed: 50,
            layout: "fullwidth",
            centerControls: false,
            loop: true,
            autoplay: false
                    // more slider options goes here...
                    // check slider options section in documentation for more options.
        });
        // adds Arrows navigation control to the slider.
        slider.control('arrows');
        // TESTIMONIAL MASTER SLIDER START
        var slider = new MasterSlider();
        slider.setup('testimonials-slider', {
            loop: true,
            width: 70,
            height: 70,
            speed: 30,
            view: 'fadeBasic',
            preload: 0,
            space: 65,
            autoplay: true
        });
        slider.control('arrows');
        slider.control('slideinfo', {insertTo: '#staff-info'});
        // CLIENTS CAROUSEL START
        $('#client-carousel').owlCarousel({
            items: 5,
            navigation: true,
            pagination: false,
            navigationText: ["", ""],
            itemsCustom: [
                [0, 2],
                [600, 3],
                [1000, 5],
                [1200, 5]
            ]
        });
        $("#best-seller-slider .slider-items").owlCarousel({
            items: 4,
            itemsDesktop: [1024, 4],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [600, 2],
            itemsMobile: [320, 1],
            navigation: !0,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1
        });
    });
    /* ]]> */
</script>
</body>
</html>
