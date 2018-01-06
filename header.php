<?php
session_start();

include 'db-config/database.class.php';
#INSTANCIAMOS LA BD
$db = DataBase::getInstance();
include 'lib/functions.php';
#Logo del sitio
$sqlLogo = "SELECT logo, alt FROM logo WHERE id = 1";
$db->setQuery($sqlLogo);
$logo = $db->loadObject();
#Secciones (Menu)
$sqlSecciones = "SELECT * FROM secciones";
$db->setQuery($sqlSecciones);
$secciones = $db->loadObjectList();
#Recorremos el menu para armar un array de cada uno
$inicio = array();
$empresa = array();
$ofertas = array();
$sucursales = array();
$trabaja = array();
$contacto = array();
foreach ($secciones as $seccion) {
    switch ($seccion->secciones) {
        case 'inicio':
            array_push($inicio, array('titulo' => utf8_encode($seccion->secciones), 'url' => $seccion->url_amigable, 'mostrar' => $seccion->mostrar, 'title' => utf8_encode($seccion->titulo_pagina), 'descripcion' => utf8_encode($seccion->descripcion_pagina), 'keywords' => utf8_encode($seccion->keywords_pagina)));
            break;
        case 'la empresa':
            array_push($empresa, array('titulo' => utf8_encode($seccion->secciones), 'url' => $seccion->url_amigable, 'mostrar' => $seccion->mostrar, 'title' => utf8_encode($seccion->titulo_pagina), 'descripcion' => utf8_encode($seccion->descripcion_pagina), 'keywords' => utf8_encode($seccion->keywords_pagina)));
            break;
        case 'ofertas':
            array_push($ofertas, array('titulo' => utf8_encode($seccion->secciones), 'url' => $seccion->url_amigable, 'mostrar' => $seccion->mostrar, 'title' => utf8_encode($seccion->titulo_pagina), 'descripcion' => utf8_encode($seccion->descripcion_pagina), 'keywords' => utf8_encode($seccion->keywords_pagina)));
            break;
        case 'sucursales':
            array_push($sucursales, array('titulo' => utf8_encode($seccion->secciones), 'url' => $seccion->url_amigable, 'mostrar' => $seccion->mostrar, 'title' => utf8_encode($seccion->titulo_pagina), 'descripcion' => utf8_encode($seccion->descripcion_pagina), 'keywords' => utf8_encode($seccion->keywords_pagina)));
            break;
        case 'trabaja con nosotros':
            array_push($trabaja, array('titulo' => utf8_encode($seccion->secciones), 'url' => $seccion->url_amigable, 'mostrar' => $seccion->mostrar, 'title' => utf8_encode($seccion->titulo_pagina), 'descripcion' => utf8_encode($seccion->descripcion_pagina), 'keywords' => utf8_encode($seccion->keywords_pagina)));
            break;
        case 'contacto':
            array_push($contacto, array('titulo' => utf8_encode($seccion->secciones), 'url' => $seccion->url_amigable, 'mostrar' => $seccion->mostrar, 'title' => utf8_encode($seccion->titulo_pagina), 'descripcion' => utf8_encode($seccion->descripcion_pagina), 'keywords' => utf8_encode($seccion->keywords_pagina)));
            break;
    }
}
#verificamos la pagina actual y seteamos las configuraciones
$actualPage = getPage();
$pageName = getPageName();
$currentIndex = '';
$currentOfertas = '';
$currentEmpresa = '';
$currentSucursales = '';
$currentTrabaja = '';
$currentContato = '';
$actualPage = str_replace('argor.com.py', '', $actualPage);
switch ($actualPage) {
    case 'empresa':
        $currentEmpresa = 'current-menu-item';
        $title = $empresa[0]['title'];
        $description = $empresa[0]['descripcion'];
        $keywords = $empresa[0]['keywords'];
        break;
    case 'ofertas':
        $currentOfertas = 'current-menu-item';
        $title = $ofertas[0]['title'];
        $description = $ofertas[0]['descripcion'];
        $keywords = $ofertas[0]['keywords'];
        break;
    case 'sucursales':
        $currentSucursales = 'current-menu-item';
        $title = $sucursales[0]['title'];
        $description = $sucursales[0]['descripcion'];
        $keywords = $sucursales[0]['keywords'];
        break;
    case 'trabaja-con-nosotros':
        $currentTrabaja = 'current-menu-item';
        $title = $trabaja[0]['title'];
        $description = $trabaja[0]['descripcion'];
        $keywords = $trabaja[0]['keywords'];
        break;
    case 'contacto':
        $currentContato = 'current-menu-item';
        $title = $contacto[0]['title'];
        $description = $contacto[0]['descripcion'];
        $keywords = $contacto[0]['keywords'];
        break;
    default:
        $currentIndex = 'current-menu-item';
        $title = $inicio[0]['title'];
        $description = $inicio[0]['descripcion'];
        $keywords = $inicio[0]['keywords'];
        break;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $description; ?>">
        <meta name="author" content="Imagen Web">
        <meta name="keywords" content="<?php echo $keywords; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?php echo getUrl(); ?>css/bootstrap.css"/><!-- bootstrap grid -->
        <link rel="stylesheet" href="<?php echo getUrl(); ?>css/style.css"/><!-- template styles -->
        <link rel="stylesheet" href="<?php echo getUrl(); ?>css/color-default.css"/><!-- default template color styles -->
        <link rel="stylesheet" href="<?php echo getUrl(); ?>css/retina.css"/><!-- retina ready styles -->
        <link rel="stylesheet" href="<?php echo getUrl(); ?>css/responsive.css"/><!-- responsive styles -->
        <link rel="stylesheet" href="<?php echo getUrl(); ?>css/animate.css"/><!-- animation for content -->
        <link rel='stylesheet' href='<?php echo getUrl(); ?>owl-carousel/owl.carousel.css'/><!-- .carousels -->
        <link rel='stylesheet' href='<?php echo getUrl(); ?>owl-carousel/owl.theme.css'/><!-- .carousels -->
        <?php if ($actualPage == 'trabaja-con-nosotros'): ?>
            <!--CSS FOR FILEUPLOAD-->
            <link rel='stylesheet' href='<?php echo getUrl(); ?>css/html5fileupload.css'/><!-- .carousels -->
        <?php endif; ?>
        <?php if (($actualPage == 'ofertas') || ($pageName == 'argor.com.pyofertas')): ?>
            <link rel='stylesheet' href='<?php echo getUrl(); ?>css/magnific-popup.css'/><!-- .carousels -->
        <?php endif; ?>
        <?php if (($actualPage == 'ofertas') || ($pageName == 'ofertas-categoria') || ($pageName == 'argor.com.pyofertas') || ($pageName == 'ofertas-categoria.php') || ($pageName == 'ofertas-producto.php')): ?>
            <link rel='stylesheet' href='<?php echo getUrl(); ?>css/magnific-popup.css'/><!-- .carousels -->
            <link rel='stylesheet' href='<?php echo getUrl(); ?>css/productos.css'/>
            <link rel='stylesheet' href='<?php echo getUrl(); ?>css/flexslider.css'/><!-- .carousels -->
        <?php endif; ?>
        <!-- Master slider slider -->
        <link rel="stylesheet" href="<?php echo getUrl(); ?>masterslider/style/masterslider.css" /><!-- Master slider css -->
        <link rel="stylesheet" href="<?php echo getUrl(); ?>masterslider/skins/default/style.css" /><!-- Master slider default skin -->
        <!-- MasterSlider Testimonial Style -->
        <link href='<?php echo getUrl(); ?>masterslider/style/ms-staff-style.css' rel='stylesheet' type='text/css'>
        <!-- Google Web fonts -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,100,200,500,600,800,700,900' rel='stylesheet' type='text/css'><!-- Raleway font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900&amp;subset=cyrillic,cyrillic-ext,latin,greek-ext,greek,latin-ext,vietnamese' rel='stylesheet' type='text/css'><link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900&amp;subset=cyrillic,cyrillic-ext,latin,greek-ext,greek,latin-ext,vietnamese' rel='stylesheet' type='text/css'><!-- Roboto -->
        <!-- Font icons -->
        <script src="https://use.fontawesome.com/58850d4a2e.js"></script>
        <!--<link rel="stylesheet" href="<?php echo getUrl(); ?>font-awesome/css/font-awesome.min.css"/> Font awesome icons -->
        <!--GOOGLE ANALITYCS-->
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-86473255-1', 'auto');
            ga('send', 'pageview');

        </script>
        <script src="<?php echo getUrl(); ?>js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
    </head>
    <body>
        <!-- .header-wrapper start -->
        <div id="header-wrapper">
            <!-- #header.dark start -->
            <header id="header" class="dark">
                <!-- Main navigation and logo container -->
                <div class="header-inner">
                    <!-- .container start -->
                    <div class="container">
                        <!-- .main-nav start -->
                        <div class="main-nav">
                            <!-- .row start -->
                            <div class="row">
                                <div class="col-md-12 triggerAnimation animated" data-animate='fadeInDown'>
                                    <!-- .navbar.pi-mega start -->
                                    <nav class="navbar navbar-default nav-left pi-mega">									
                                        <!-- .navbar-header start -->
                                        <div class="navbar-header">
                                            <!-- .logo start -->
                                            <div class="logo">
                                                <a href="/">
                                                    <img src="<?php echo getUrl() . 'img/' . utf8_encode($logo->logo); ?>" alt="<?php echo utf8_encode($logo->alt); ?>">
                                                </a>
                                            </div><!-- logo end -->
                                        </div><!-- .navbar-header end -->
                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                        <div class="collapse navbar-collapse">
                                            <ul class="nav navbar-nav pi-nav">
                                                <?php if ($inicio[0]['mostrar'] == 1): ?>
                                                    <li class="dropdown <?php echo $currentIndex; ?>"><a href="<?php echo $inicio[0]['url']; ?>"><?php echo $inicio[0]['titulo']; ?></a></li>
                                                <?php endif; ?>
                                                <?php if ($empresa[0]['mostrar'] == 1): ?>
                                                    <li class="dropdown <?php echo $currentEmpresa; ?>"><a href="<?php echo getUrl() . $empresa[0]['url']; ?>"><?php echo $empresa[0]['titulo']; ?></a></li><!-- MENU ITEM .dropdown end -->
                                                <?php endif; ?>
                                                <?php if ($ofertas[0]['mostrar'] == 1): ?>
                                                    <li class="dropdown <?php echo $currentOfertas; ?>"><a href="<?php echo getUrl() . $ofertas[0]['url']; ?>"><?php echo $ofertas[0]['titulo']; ?></a></li>
                                                <?php endif; ?>
                                                <?php if ($sucursales[0]['mostrar'] == 1): ?>
                                                    <li class="dropdown <?php echo $currentSucursales; ?>"><a href="<?php echo getUrl() . $sucursales[0]['url']; ?>"><?php echo $sucursales[0]['titulo']; ?></a></li>
                                                <?php endif; ?>
                                                <?php if ($trabaja[0]['mostrar'] == 1): ?>
                                                    <li class="dropdown <?php echo $currentTrabaja; ?>"><a href="<?php echo getUrl() . $trabaja[0]['url']; ?>"><?php echo $trabaja[0]['titulo']; ?></a></li>
                                                <?php endif; ?>
                                                <?php if ($contacto[0]['mostrar'] == 1): ?>
                                                    <li class="dropdown <?php echo $currentContato; ?>"><a href="<?php echo getUrl() . $contacto[0]['url']; ?>"><?php echo $contacto[0]['titulo']; ?></a></li>
                                                <?php endif; ?>
                                            </ul><!-- .nav.navbar-nav.pi-nav end -->
                                            <!-- Responsive menu start -->
                                            <div id="dl-menu" class="dl-menuwrapper">
                                                <button class="dl-trigger">Abrir Menu</button>
                                                <ul class="dl-menu">
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
                                                </ul><!-- .dl-menu end -->
                                            </div><!-- (Responsive menu) #dl-menu end -->
                                        </div><!-- .navbar.navbar-collapse end --> 
                                    </nav><!-- .navbar.pi-mega end -->
                                </div><!-- .col-md-12 end -->
                            </div><!-- .row end -->            
                        </div><!-- .main-nav end -->
                    </div><!-- .container end -->
                </div><!-- .header-inner end -->
            </header><!-- #header.dark end -->
        </div><!-- #header-wrapper end -->