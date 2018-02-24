<?php
include 'header.php';
if ($_GET['id']) {
    $id = (int) $_GET['id'];
    #Categorias
    $sqlDetalle = "SELECT * FROM categorias WHERE mostrar = 1 and id = $id";
    $db->setQuery($sqlDetalle);
    $detalle = $db->loadObject();
    #Productos de la Categoria
    $sqlProductosPage = "SELECT * FROM productos WHERE id_categoria = $id";
    $db->setQuery($sqlProductosPage);
    $productosPage = $db->loadObjectList();
}
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
                    <h1><?php echo utf8_encode($detalle->descripcion); ?></h1>
                </div><!-- .simple-heading end -->
                <ul class="breadcrumb">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="<?php echo getUrl(); ?>ofertas">Ofertas</a></li>
                    <li><span class="active">Producto</span></li>
                </ul><!-- .breadcrumb end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->
<!-- .page-content start -->
<div class="page-content">
    <!-- .container start -->
    <div class="container">
        <?php if (!empty($productosPage)): ?>
            <ul id="portfolioitems" class="isotope">
                <?php foreach ($productosPage as $item): ?>
                    <li class="col-md-4 col-sm-6 isotope-item photography">
                        <figure class="portfolio-item-container">
                            <div class="portfolio-img">
                                <img src="<?php echo getUrl(); ?>img/ofertas/productos/<?php echo utf8_encode($item->img); ?>" alt="<?php echo utf8_encode($item->nombre); ?>"/>
                            </div><!-- .portfolio-img end -->

                            <figcaption>
                                <a class="title" href="#"><?php echo utf8_encode($item->nombre); ?></a>
                                <p><?php echo utf8_encode($item->contenido); ?></p>
                                <?php if (!empty($item->precio)): ?>
                                    <p>Gs. <?php echo number_format($item->precio, 0, ',', '.'); ?></p>
                                <?php endif; ?>
                            </figcaption>
                        </figure><!-- .portfolio-item-container end -->
                    </li><!-- .isotope-item end -->
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>&nbsp;</p>
            <h4>Lo sentimos, no hay productos para mostrar en esta categoria</h4>
            <p>&nbsp;</p>
        <?php endif; ?>
    </div><!-- .container end -->
</div><!-- .page-content end -->
<?php include 'footer.php'; ?>
