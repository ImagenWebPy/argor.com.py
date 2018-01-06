<?php
include 'header.php';
$destacados = obtenerDestacados(1);
$electrodomesticos = obtenerDestacados(2);
$destacado2 = obtenerDestacados(3);
$varios = obtenerDestacados(4);
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
        <?php include './menu-categorias.php'; ?>
        <!--END MENU-->
        <!--        <div class="row portfolio-filters mb-0">
                    <div class="col-md-12 mb-20">
                        <ul id="filters">
                            <li class="active"><a href="#" data-filter="*">Todas</a></li>
        <?php // foreach ($categorias as $item): ?>
                                                                                                                                                                    <li><a href="#" data-filter=".<?php echo utf8_encode($item->filtro); ?>"><?php echo utf8_encode($item->descripcion); ?></a></li>
        <?php // endforeach; ?>
                        </ul>
                    </div> .col-md-12 end                     
                </div> .row.portfolio-filters end -->
        <!--        <div class="row mb-0">
                    <ul id="portfolioitems" class="isotope">
        <?php //foreach ($categorias as $item):  ?>
                            <li class="col-md-4 col-sm-6 isotope-item <?php //echo utf8_encode($item->filtro);                                            ?>">
                                <figure class="portfolio-item-container">
                                    <div class="portfolio-img">
                                        <img src="<?php //echo getUrl() . 'img/ofertas/' . $item->img;                                            ?>" alt="<?php //echo utf8_encode($item->descripcion);                                            ?>"/>
                                        <div class="mask">
                                            <ul class="portfolio-item-buttons">
                                                <li><a href="<?php //echo getUrl() . 'productos/' . $item->url_amigable . '-' . $item->id                                            ?>"><i class="fa fa-link"></i></a></li>
                                                <li><a href="<?php //echo getUrl() . 'img/ofertas/' . $item->img;                                            ?>" class="triggerZoom"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div> .portfolio-img end 
                                </figure> .portfolio-item-container end 
                            </li> .isotope-item end 
        <?php //endforeach;  ?>
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
                                    <?php foreach ($destacados as $item): ?>
                                        <?php
                                        $imagen = $item->imagen;
                                        $imagen = explode('|', $imagen);
                                        ?>
                                        <!-- Item -->
                                        <div class="item">
                                            <div class="col-item"><div class="product-image-area"> <a class="product-image" title="<?= utf8_encode($item->nombre); ?>" href="<?= getUrl() . $item->id; ?>/ofertas/producto/<?= caracteres($item->nombre) ?>"> <img src="<?= getUrl(); ?>img/productos/<?= $imagen[0]; ?>" class="img-responsive" alt="<?= utf8_encode($item->nombre); ?>"> </a></div><div class="info">
                                                    <div class="info-inner">
                                                        <div class="item-title"> <a title="<?= utf8_encode($item->nombre); ?>" href="<?= getUrl() . $item->id; ?>/ofertas/producto/<?= caracteres($item->nombre) ?>"> <?= utf8_encode($item->marca); ?> - <?= utf8_encode($item->nombre); ?></a> </div>
                                                        <!--item-title-->
                                                        <div class="item-content">
                                                            <div class="price-block">
                                                                <div class="price-box">
                                                                    <?php if ($item->precio_oferta > 0): ?>
                                                                        <p class="old-price"> <span class="price-label">Precio Contado:</span> <span class="price"> Gs. <?= number_format($item->precio, 0, ',', '.'); ?> </span> </p>
                                                                        <p class="special-price"> <span class="price-label">Precio de Oferta</span> <span class="price"> Gs. <?= number_format($item->precio_oferta, 0, ',', '.'); ?> </span> </p>
                                                                    <?php else: ?>
                                                                        <p class="regular-price"> <span class="price-label">Precio Contado:</span> <span class="price">Gs. <?= number_format($item->precio, 0, ',', '.'); ?> </span> </p>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--item-content--> 
                                                    </div>
                                                    <!--info-inner-->
                                                    <div class="actions">
                                                        <a href="<?= getUrl() . $item->id; ?>/ofertas/producto/<?= caracteres($item->nombre) ?>" type="button" title="Ver Información del Producto" class="button btn-cart"><span>Ver Información</span></a>
                                                    </div>
                                                    <!--actions-->
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item -->
                                    <?php endforeach; ?>
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
                                <?php foreach ($electrodomesticos as $item): ?>
                                    <?php
                                    $imagen = $item->imagen;
                                    $imagen = explode('|', $imagen);
                                    ?>
                                    <div class="item">
                                        <div class="item-area">
                                            <div class="product-image-area"> 
                                                <a href="<?= getUrl() . $item->id; ?>/ofertas/producto/<?= caracteres($item->nombre) ?>" class="product-image"> 
                                                    <img src="<?= getUrl(); ?>img/productos/<?= $imagen[0]; ?>" alt="<?= utf8_encode($item->nombre); ?>"> 
                                                </a> 
                                            </div>
                                            <div class="details-area">
                                                <h2 class="product-name">
                                                    <a href="<?= getUrl() . $item->id; ?>/ofertas/producto/<?= caracteres($item->nombre) ?>"><?= utf8_encode($item->marca) . ' - ' . utf8_encode($item->nombre); ?></a>
                                                </h2>
                                                <div class="price-block">
                                                    <div class="price-box">
                                                        <?php if ($item->precio_oferta > 0): ?>
                                                            <p class="old-price"> <span class="price-label">Precio Contado:</span> <span class="price"> Gs. <?= number_format($item->precio, 0, ',', '.'); ?> </span> </p>
                                                            <p class="special-price"> <span class="price-label">Precio de Oferta</span> <span class="price"> Gs. <?= number_format($item->precio_oferta, 0, ',', '.'); ?> </span> </p>
                                                        <?php else: ?>
                                                            <p class="regular-price"> <span class="price-label">Precio Contado:</span> <span class="price">Gs. <?= number_format($item->precio, 0, ',', '.'); ?> </span> </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4" style="visibility: visible;">
                    <div class="inner-div">
                        <h2 class="category-pro-title"><span>Camaras</span></h2>
                        <div class="category-products">
                            <div class="products small-list">
                                <?php foreach ($destacado2 as $item): ?>
                                    <?php
                                    $imagen = $item->imagen;
                                    $imagen = explode('|', $imagen);
                                    ?>
                                    <div class="item">
                                        <div class="item-area">
                                            <div class="product-image-area"> 
                                                <a href="<?= getUrl() . $item->id; ?>/ofertas/producto/<?= caracteres($item->nombre) ?>" class="product-image"> 
                                                    <img src="<?= getUrl(); ?>img/productos/<?= $imagen[0]; ?>" alt="<?= utf8_encode($item->nombre); ?>"> 
                                                </a> 
                                            </div>
                                            <div class="details-area">
                                                <h2 class="product-name">
                                                    <a href="<?= getUrl() . $item->id; ?>/ofertas/producto/<?= caracteres($item->nombre) ?>"><?= utf8_encode($item->marca) . ' - ' . utf8_encode($item->nombre); ?></a>
                                                </h2>
                                                <div class="price-block">
                                                    <div class="price-box">
                                                        <?php if ($item->precio_oferta > 0): ?>
                                                            <p class="old-price"> <span class="price-label">Precio Contado:</span> <span class="price"> Gs. <?= number_format($item->precio, 0, ',', '.'); ?> </span> </p>
                                                            <p class="special-price"> <span class="price-label">Precio de Oferta</span> <span class="price"> Gs. <?= number_format($item->precio_oferta, 0, ',', '.'); ?> </span> </p>
                                                        <?php else: ?>
                                                            <p class="regular-price"> <span class="price-label">Precio Contado:</span> <span class="price">Gs. <?= number_format($item->precio, 0, ',', '.'); ?> </span> </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4" style="visibility: visible;">
                    <div class="inner-div1">
                        <h2 class="category-pro-title"><span>Varios</span></h2>
                        <div class="category-products">
                            <div class="products small-list">
                                <?php foreach ($varios as $item): ?>
                                    <?php
                                    $imagen = $item->imagen;
                                    $imagen = explode('|', $imagen);
                                    ?>
                                    <div class="item">
                                        <div class="item-area">
                                            <div class="product-image-area"> 
                                                <a href="<?= getUrl() . $item->id; ?>/ofertas/producto/<?= caracteres($item->nombre) ?>" class="product-image"> 
                                                    <img src="<?= getUrl(); ?>img/productos/<?= $imagen[0]; ?>" alt="<?= utf8_encode($item->nombre); ?>"> 
                                                </a> 
                                            </div>
                                            <div class="details-area">
                                                <h2 class="product-name">
                                                    <a href="<?= getUrl() . $item->id; ?>/ofertas/producto/<?= caracteres($item->nombre) ?>"><?= utf8_encode($item->marca) . ' - ' . utf8_encode($item->nombre); ?></a>
                                                </h2>
                                                <div class="price-block">
                                                    <div class="price-box">
                                                        <?php if ($item->precio_oferta > 0): ?>
                                                            <p class="old-price"> <span class="price-label">Precio Contado:</span> <span class="price"> Gs. <?= number_format($item->precio, 0, ',', '.'); ?> </span> </p>
                                                            <p class="special-price"> <span class="price-label">Precio de Oferta</span> <span class="price"> Gs. <?= number_format($item->precio_oferta, 0, ',', '.'); ?> </span> </p>
                                                        <?php else: ?>
                                                            <p class="regular-price"> <span class="price-label">Precio Contado:</span> <span class="price">Gs. <?= number_format($item->precio, 0, ',', '.'); ?> </span> </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div><!-- .container end -->
</div><!-- .page-content end -->
<?php include 'footer.php'; ?>
