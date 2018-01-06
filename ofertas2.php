<?php
include 'header.php';
#Categorias
$sqlCategorias = "SELECT * FROM categorias WHERE mostrar = 1";
$db->setQuery($sqlCategorias);
$categorias = $db->loadObjectList();
?>
<!-- .page-content start -->
<div class="page-content dark custom-img-background page-title-3 page-title mb-20">
    <div class="container">
        <!-- .row start -->
        <div class="row">
            <!-- .col-md-12 start -->
            <div class="col-md-12 triggerAnimation animated" data-animate='fadeInUp'>
                <!-- .simple-heading start -->
                <div class="simple-heading mb-30">
                    <h1>Ofertas</h1>
                </div><!-- .simple-heading end -->
                <ul class="breadcrumb">
                    <li><a href="/">Inicio</a></li>
                    <li><span class="active">Ofertas</span></li>
                </ul><!-- .breadcrumb end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->
<!-- .page-content start -->
<div class="page-content">
    <!-- .container start -->
    <div class="container">
        <!-- .row start -->
        <!--MENU-->
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse js-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">Inicio</a></li>
                    <li class="dropdown mega-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Electrodomésticos <span class="caret"></span></a>				
                        <ul class="dropdown-menu mega-dropdown-menu">
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Men Collection</li>                            
                                    <div id="menCollection" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <a href="#"><img src="http://placehold.it/254x150/ff3546/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                                                <h4><small>Summer dress floral prints</small></h4>                                        
                                                <button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>       
                                            </div><!-- End Item -->
                                            <div class="item">
                                                <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                                                <h4><small>Gold sandals with shiny touch</small></h4>                                        
                                                <button class="btn btn-primary" type="button">9,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>        
                                            </div><!-- End Item -->
                                            <div class="item">
                                                <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                                                <h4><small>Denin jacket stamped</small></h4>                                        
                                                <button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>      
                                            </div><!-- End Item -->                                
                                        </div><!-- End Carousel Inner -->
                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#menCollection" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#menCollection" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div><!-- /.carousel -->
                                    <li class="divider"></li>
                                    <li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Features</li>
                                    <li><a href="#">Auto Carousel</a></li>
                                    <li><a href="#">Carousel Control</a></li>
                                    <li><a href="#">Left & Right Navigation</a></li>
                                    <li><a href="#">Four Columns Grid</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Fonts</li>
                                    <li><a href="#">Glyphicon</a></li>
                                    <li><a href="#">Google Fonts</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Plus</li>
                                    <li><a href="#">Navbar Inverse</a></li>
                                    <li><a href="#">Pull Right Elements</a></li>
                                    <li><a href="#">Coloured Headers</a></li>                            
                                    <li><a href="#">Primary Buttons & Default</a></li>							
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Much more</li>
                                    <li><a href="#">Easy to Customize</a></li>
                                    <li><a href="#">Calls to action</a></li>
                                    <li><a href="#">Custom Fonts</a></li>
                                    <li><a href="#">Slide down on Hover</a></li>                         
                                </ul>
                            </li>
                        </ul>				
                    </li>
                    <li class="dropdown mega-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Electrónica <span class="caret"></span></a>				
                        <ul class="dropdown-menu mega-dropdown-menu">
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Features</li>
                                    <li><a href="#">Auto Carousel</a></li>
                                    <li><a href="#">Carousel Control</a></li>
                                    <li><a href="#">Left & Right Navigation</a></li>
                                    <li><a href="#">Four Columns Grid</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Fonts</li>
                                    <li><a href="#">Glyphicon</a></li>
                                    <li><a href="#">Google Fonts</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Plus</li>
                                    <li><a href="#">Navbar Inverse</a></li>
                                    <li><a href="#">Pull Right Elements</a></li>
                                    <li><a href="#">Coloured Headers</a></li>                            
                                    <li><a href="#">Primary Buttons & Default</a></li>							
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Much more</li>
                                    <li><a href="#">Easy to Customize</a></li>
                                    <li><a href="#">Calls to action</a></li>
                                    <li><a href="#">Custom Fonts</a></li>
                                    <li><a href="#">Slide down on Hover</a></li>                         
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Women Collection</li>                            
                                    <div id="womenCollection" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                                                <h4><small>Summer dress floral prints</small></h4>                                        
                                            </div><!-- End Item -->
                                            <div class="item">
                                                <a href="#"><img src="http://placehold.it/254x150/ff3546/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                                                <h4><small>Gold sandals with shiny touch</small></h4>                                        
                                            </div><!-- End Item -->
                                            <div class="item">
                                                <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                                                <h4><small>Denin jacket stamped</small></h4>                                        
                                            </div><!-- End Item -->                                
                                        </div><!-- End Carousel Inner -->
                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#womenCollection" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#womenCollection" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div><!-- /.carousel -->
                                    <li class="divider"></li>
                                    <li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                                </ul>
                            </li>
                        </ul>				
                    </li>
                    <li><a href="#">Telefonía</a></li>
                    <li><a href="#">Seguridad</a></li>
                    <li><a href="#">Herramientas</a></li>
                </ul>
            </div><!-- /.nav-collapse -->
        </nav>
        <!--END MENU-->
        <!--        <div class="row portfolio-filters mb-0">
                    <div class="col-md-12 mb-20">
                        <ul id="filters">
                            <li class="active"><a href="#" data-filter="*">Todas</a></li>
        <?php foreach ($categorias as $item): ?>
                                    <li><a href="#" data-filter=".<?php echo utf8_encode($item->filtro); ?>"><?php echo utf8_encode($item->descripcion); ?></a></li>
        <?php endforeach; ?>
                        </ul>
                    </div> .col-md-12 end                     
                </div> .row.portfolio-filters end -->
        <!--        <div class="row mb-0">
                    <ul id="portfolioitems" class="isotope">
        <?php //foreach ($categorias as $item): ?>
                            <li class="col-md-4 col-sm-6 isotope-item <?php //echo utf8_encode($item->filtro);            ?>">
                                <figure class="portfolio-item-container">
                                    <div class="portfolio-img">
                                        <img src="<?php //echo getUrl() . 'img/ofertas/' . $item->img;            ?>" alt="<?php //echo utf8_encode($item->descripcion);            ?>"/>
                                        <div class="mask">
                                            <ul class="portfolio-item-buttons">
                                                <li><a href="<?php //echo getUrl() . 'productos/' . $item->url_amigable . '-' . $item->id            ?>"><i class="fa fa-link"></i></a></li>
                                                <li><a href="<?php //echo getUrl() . 'img/ofertas/' . $item->img;            ?>" class="triggerZoom"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div> .portfolio-img end 
                                </figure> .portfolio-item-container end 
                            </li> .isotope-item end 
        <?php //endforeach; ?>
                    </ul> #portfolioitems.isotope end 
                </div> .row end -->
        <section class="main-container col1-layout home-content-container">
            <div class="container">
                <div class="std">
                    <div class="best-seller-pro">
                        <div class="slider-items-products">
                            <div class="new_title center">
                                <h2>Más Vistos</h2>
                            </div>
                            <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col4"> 
                                    <!-- Item -->
                                    <div class="item">
                                        <div class="col-item"><div class="product-image-area"> <a class="product-image" title="ASPECT 910" href="http://saleosale.com.py/producto/item/scott-aspect_910-215"> <img src="http://saleosale.com.py/public/products-images/ASPECT-910.jpg" class="img-responsive" alt="ASPECT 910"> </a></div><div class="info">
                                                <div class="info-inner">
                                                    <div class="item-title"> <a title=" " href="http://saleosale.com.py/producto/item/scott-aspect_910-215"> Scott - ASPECT 910</a> </div>
                                                    <!--item-title-->
                                                    <div class="item-content">
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div class="rating" id="rating215 "></div>
                                                            </div><script type="text/javascript">
                                                                $(document).ready(function () {
                                                                    $("#rating215").css("width", "0");
                                                                });
                                                            </script>
                                                        </div>
                                                        <div class="price-box"><div class="price-box"> <span class="regular-price"> <span class="price">Gs. 7.250.985</span> </span> </div></div>
                                                    </div>
                                                    <!--item-content--> 
                                                </div>
                                                <!--info-inner-->
                                                <div class="actions">
                                                    <a href="#" type="button" title="Ver Información del Producto" class="button btn-cart"><span>Ver Información</span></a>
                                                </div>
                                                <!--actions-->
                                                <div class="clearfix"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Item --> 
                                    <!-- Item -->
                                    <div class="item">
                                        <div class="col-item"><div class="product-image-area"> <a class="product-image" title="ASPECT 910" href="http://saleosale.com.py/producto/item/scott-aspect_910-215"> <img src="http://saleosale.com.py/public/products-images/ASPECT-910.jpg" class="img-responsive" alt="ASPECT 910"> </a></div><div class="info">
                                                <div class="info-inner">
                                                    <div class="item-title"> <a title=" " href="http://saleosale.com.py/producto/item/scott-aspect_910-215"> Scott - ASPECT 910</a> </div>
                                                    <!--item-title-->
                                                    <div class="item-content">
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div class="rating" id="rating215 "></div>
                                                            </div><script type="text/javascript">
                                                                $(document).ready(function () {
                                                                    $("#rating215").css("width", "0");
                                                                });
                                                            </script>
                                                        </div>
                                                        <div class="price-box"><div class="price-box"> <span class="regular-price"> <span class="price">Gs. 7.250.985</span> </span> </div></div>
                                                    </div>
                                                    <!--item-content--> 
                                                </div>
                                                <!--info-inner-->
                                                <div class="actions">
                                                    <a href="#" type="button" title="Ver Información del Producto" class="button btn-cart"><span>Ver Información</span></a>
                                                </div>
                                                <!--actions-->
                                                <div class="clearfix"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Item --> 
                                    <!-- Item -->
                                    <div class="item">
                                        <div class="col-item"><div class="product-image-area"> <a class="product-image" title="ASPECT 910" href="http://saleosale.com.py/producto/item/scott-aspect_910-215"> <img src="http://saleosale.com.py/public/products-images/ASPECT-910.jpg" class="img-responsive" alt="ASPECT 910"> </a></div><div class="info">
                                                <div class="info-inner">
                                                    <div class="item-title"> <a title=" " href="http://saleosale.com.py/producto/item/scott-aspect_910-215"> Scott - ASPECT 910</a> </div>
                                                    <!--item-title-->
                                                    <div class="item-content">
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div class="rating" id="rating215 "></div>
                                                            </div><script type="text/javascript">
                                                                $(document).ready(function () {
                                                                    $("#rating215").css("width", "0");
                                                                });
                                                            </script>
                                                        </div>
                                                        <div class="price-box"><div class="price-box"> <span class="regular-price"> <span class="price">Gs. 7.250.985</span> </span> </div></div>
                                                    </div>
                                                    <!--item-content--> 
                                                </div>
                                                <!--info-inner-->
                                                <div class="actions">
                                                    <a href="#" type="button" title="Ver Información del Producto" class="button btn-cart"><span>Ver Información</span></a>
                                                </div>
                                                <!--actions-->
                                                <div class="clearfix"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Item --> 
                                    <!-- Item -->
                                    <div class="item">
                                        <div class="col-item"><div class="product-image-area"> <a class="product-image" title="ASPECT 910" href="http://saleosale.com.py/producto/item/scott-aspect_910-215"> <img src="http://saleosale.com.py/public/products-images/ASPECT-910.jpg" class="img-responsive" alt="ASPECT 910"> </a></div><div class="info">
                                                <div class="info-inner">
                                                    <div class="item-title"> <a title=" " href="http://saleosale.com.py/producto/item/scott-aspect_910-215"> Scott - ASPECT 910</a> </div>
                                                    <!--item-title-->
                                                    <div class="item-content">
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div class="rating" id="rating215 "></div>
                                                            </div><script type="text/javascript">
                                                                $(document).ready(function () {
                                                                    $("#rating215").css("width", "0");
                                                                });
                                                            </script>
                                                        </div>
                                                        <div class="price-box"><div class="price-box"> <span class="regular-price"> <span class="price">Gs. 7.250.985</span> </span> </div></div>
                                                    </div>
                                                    <!--item-content--> 
                                                </div>
                                                <!--info-inner-->
                                                <div class="actions">
                                                    <a href="#" type="button" title="Ver Información del Producto" class="button btn-cart"><span>Ver Información</span></a>
                                                </div>
                                                <!--actions-->
                                                <div class="clearfix"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Item --> 
                                    <!-- Item -->
                                    <div class="item">
                                        <div class="col-item"><div class="product-image-area"> <a class="product-image" title="ASPECT 910" href="http://saleosale.com.py/producto/item/scott-aspect_910-215"> <img src="http://saleosale.com.py/public/products-images/ASPECT-910.jpg" class="img-responsive" alt="ASPECT 910"> </a></div><div class="info">
                                                <div class="info-inner">
                                                    <div class="item-title"> <a title=" " href="http://saleosale.com.py/producto/item/scott-aspect_910-215"> Scott - ASPECT 910</a> </div>
                                                    <!--item-title-->
                                                    <div class="item-content">
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div class="rating" id="rating215 "></div>
                                                            </div><script type="text/javascript">
                                                                $(document).ready(function () {
                                                                    $("#rating215").css("width", "0");
                                                                });
                                                            </script>
                                                        </div>
                                                        <div class="price-box"><div class="price-box"> <span class="regular-price"> <span class="price">Gs. 7.250.985</span> </span> </div></div>
                                                    </div>
                                                    <!--item-content--> 
                                                </div>
                                                <!--info-inner-->
                                                <div class="actions">
                                                    <a href="#" type="button" title="Ver Información del Producto" class="button btn-cart"><span>Ver Información</span></a>
                                                </div>
                                                <!--actions-->
                                                <div class="clearfix"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Item --> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="middle-slider container">
            <div class="row">
                <div class="col-sm-4" style="visibility: visible;">
                    <div class="inner-div">
                        <h2 class="category-pro-title"><span>Electrodomesticos</span></h2>
                        <div class="category-products">
                            <div class="products small-list">
                                <div class="item">
                                    <div class="item-area">
                                        <div class="product-image-area"> <a href="http://saleosale.com.py/producto/item/consul-heladera_2_puertas_crm_43hb_no_frost-58" class="product-image"> <img src="http://saleosale.com.py/public/products-images/CRM-43HB.jpg" alt=""> </a> </div>
                                        <div class="details-area">
                                            <h2 class="product-name"><a href="http://saleosale.com.py/producto/item/consul-heladera_2_puertas_crm_43hb_no_frost-58">Consul - Heladera 2 puertas CRM 43HB no frost</a></h2>
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating-box">
                                                        <div class="rating" id="rating58 "></div>
                                                    </div><script type="text/javascript">
                                                        $(document).ready(function () {
                                                            $("#rating58").css("width", "0");
                                                        });
                                                    </script>
                                                </div>
                                            </div><div class="price-box"> <span class="regular-price"> <span class="price">Gs. 3.860.550</span> </span> </div></div>
                                    </div>
                                </div><div class="item">
                                    <div class="item-area">
                                        <div class="product-image-area"> <a href="http://saleosale.com.py/producto/item/frigidaire-4_hornallas_full_inox_-55" class="product-image"> <img src="http://saleosale.com.py/public/products-images/FKGD20D5NMS.jpg" alt=""> </a> </div>
                                        <div class="details-area">
                                            <h2 class="product-name"><a href="http://saleosale.com.py/producto/item/frigidaire-4_hornallas_full_inox_-55">Frigidaire - 4 HORNALLAS FULL INOX.</a></h2>
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating-box">
                                                        <div class="rating" id="rating55 "></div>
                                                    </div><script type="text/javascript">
                                                        $(document).ready(function () {
                                                            $("#rating55").css("width", "0");
                                                        });
                                                    </script>
                                                </div>
                                            </div><div class="price-box"> <span class="regular-price"> <span class="price">Gs. 2.191.900</span> </span> </div></div>
                                    </div>
                                </div><div class="item">
                                    <div class="item-area">
                                        <div class="product-image-area"> <a href="http://saleosale.com.py/producto/item/consul-heladera_2_puerta_crd_49k1_inox-190" class="product-image"> <img src="http://saleosale.com.py/public/products-images/CRD-49K1.jpg" alt=""> </a> </div>
                                        <div class="details-area">
                                            <h2 class="product-name"><a href="http://saleosale.com.py/producto/item/consul-heladera_2_puerta_crd_49k1_inox-190">Consul - Heladera 2 puerta CRD 49K1 INOX</a></h2>
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating-box">
                                                        <div class="rating" id="rating190 "></div>
                                                    </div><script type="text/javascript">
                                                        $(document).ready(function () {
                                                            $("#rating190").css("width", "0");
                                                        });
                                                    </script>
                                                </div>
                                            </div><div class="price-box"> <span class="regular-price"> <span class="price">Gs. 4.542.500</span> </span> </div></div>
                                    </div>
                                </div>                    </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4" style="visibility: visible;">
                    <div class="inner-div">
                        <h2 class="category-pro-title"><span>Climatización</span></h2>
                        <div class="category-products">
                            <div class="products small-list">
                                <div class="item">
                                    <div class="item-area">
                                        <div class="product-image-area"> <a href="http://saleosale.com.py/producto/item/consul-a_a__split_consul_9000_btu_f_c-33" class="product-image"> <img src="http://saleosale.com.py/public/products-images/consul-9000btu.jpg" alt=""> </a> </div>
                                        <div class="details-area">
                                            <h2 class="product-name"><a href="http://saleosale.com.py/producto/item/consul-a_a__split_consul_9000_btu_f_c-33">Consul - A.A. SPLIT CONSUL 9000 BTU F/C</a></h2>
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating-box">
                                                        <div class="rating" id="rating33 "></div>
                                                    </div><script type="text/javascript">
                                                        $(document).ready(function () {
                                                            $("#rating33").css("width", "0");
                                                        });
                                                    </script>
                                                </div>
                                            </div><div class="price-box"> <span class="regular-price"> <span class="price">Gs. 1.868.750</span> </span> </div></div>
                                    </div>
                                </div><div class="item">
                                    <div class="item-area">
                                        <div class="product-image-area"> <a href="http://saleosale.com.py/producto/item/consul-split_18000_btu_f_c-32" class="product-image"> <img src="http://saleosale.com.py/public/products-images/consul-18000btu.jpg" alt=""> </a> </div>
                                        <div class="details-area">
                                            <h2 class="product-name"><a href="http://saleosale.com.py/producto/item/consul-split_18000_btu_f_c-32">Consul - Split 18000 BTU F/C</a></h2>
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating-box">
                                                        <div class="rating" id="rating32 "></div>
                                                    </div><script type="text/javascript">
                                                        $(document).ready(function () {
                                                            $("#rating32").css("width", "0");
                                                        });
                                                    </script>
                                                </div>
                                            </div><div class="price-box"> <span class="regular-price"> <span class="price">Gs. 2.941.700</span> </span> </div></div>
                                    </div>
                                </div><div class="item">
                                    <div class="item-area">
                                        <div class="product-image-area"> <a href="http://saleosale.com.py/producto/item/tokyo-portatil_de_12000btu_f_c_c_control_gas_eco-31" class="product-image"> <img src="http://saleosale.com.py/public/products-images/AATOKPORT12CHR1.jpg" alt=""> </a> </div>
                                        <div class="details-area">
                                            <h2 class="product-name"><a href="http://saleosale.com.py/producto/item/tokyo-portatil_de_12000btu_f_c_c_control_gas_eco-31">Tokyo - Portatil de 12000BTU F/C c/control Gas Eco</a></h2>
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating-box">
                                                        <div class="rating" id="rating31 "></div>
                                                    </div><script type="text/javascript">
                                                        $(document).ready(function () {
                                                            $("#rating31").css("width", "0");
                                                        });
                                                    </script>
                                                </div>
                                            </div><div class="price-box"> <span class="regular-price"> <span class="price">Gs. 2.645.045</span> </span> </div></div>
                                    </div>
                                </div>                    </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4" style="visibility: visible;">
                    <div class="inner-div1">
                        <h2 class="category-pro-title"><span>Varios</span></h2>
                        <div class="category-products">
                            <div class="products small-list">
                                <div class="item">
                                    <div class="item-area">
                                        <div class="product-image-area"> <a href="http://saleosale.com.py/producto/item/tokyo-estufa_tok628_2000w-47" class="product-image"> <img src="http://saleosale.com.py/public/products-images/EDTETH628-N.jpg" alt=""> </a> </div>
                                        <div class="details-area">
                                            <h2 class="product-name"><a href="http://saleosale.com.py/producto/item/tokyo-estufa_tok628_2000w-47">Tokyo - ESTUFA TOK628 2000W</a></h2>
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating-box">
                                                        <div class="rating" id="rating47 "></div>
                                                    </div><script type="text/javascript">
                                                        $(document).ready(function () {
                                                            $("#rating47").css("width", "0");
                                                        });
                                                    </script>
                                                </div>
                                            </div><div class="price-box"> <span class="regular-price"> <span class="price">Gs. 0</span> </span> </div></div>
                                    </div>
                                </div><div class="item">
                                    <div class="item-area">
                                        <div class="product-image-area"> <a href="http://saleosale.com.py/producto/item/arno-licuadora_clic_lav_top_ln72_c_filtro-120" class="product-image"> <img src="http://saleosale.com.py/public/products-images/EDALLN72.jpg" alt=""> </a> </div>
                                        <div class="details-area">
                                            <h2 class="product-name"><a href="http://saleosale.com.py/producto/item/arno-licuadora_clic_lav_top_ln72_c_filtro-120">Arno - LICUADORA CLIC LAV TOP LN72 C/FILTRO</a></h2>
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating-box">
                                                        <div class="rating" id="rating120 "></div>
                                                    </div><script type="text/javascript">
                                                        $(document).ready(function () {
                                                            $("#rating120").css("width", "0");
                                                        });
                                                    </script>
                                                </div>
                                            </div><div class="price-box"> <span class="regular-price"> <span class="price">Gs. 447.156</span> </span> </div></div>
                                    </div>
                                </div><div class="item">
                                    <div class="item-area">
                                        <div class="product-image-area"> <a href="http://saleosale.com.py/producto/item/matsui-plancha_seca_mt-pv0307-74" class="product-image"> <img src="http://saleosale.com.py/public/products-images/MT-PV0307.jpg" alt=""> </a> </div>
                                        <div class="details-area">
                                            <h2 class="product-name"><a href="http://saleosale.com.py/producto/item/matsui-plancha_seca_mt-pv0307-74">Matsui - PLANCHA SECA MT-PV0307</a></h2>
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating-box">
                                                        <div class="rating" id="rating74 "></div>
                                                    </div><script type="text/javascript">
                                                        $(document).ready(function () {
                                                            $("#rating74").css("width", "0");
                                                        });
                                                    </script>
                                                </div>
                                            </div><div class="price-box"> <span class="regular-price"> <span class="price">Gs. 57.500</span> </span> </div></div>
                                    </div>
                                </div>                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div><!-- .container end -->
</div><!-- .page-content end -->
<?php include 'footer.php'; ?>
