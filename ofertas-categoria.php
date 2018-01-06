<?php
include 'header.php';
$id_categoria = $_GET['id'];
$sqlDatosCategoria = "SELECT id,descripcion, padre_id FROM categoria where id = $id_categoria";
$db->setQuery($sqlDatosCategoria);
$datosCategoria = $db->loadObjectList();
$idDatosCategoria = $datosCategoria[0]->id;
$padreId = $datosCategoria[0]->padre_id;
#Listado de Productos
if ($padreId == 0) {
$sqlListadoCategorias = "SELECT
                                    c.id,
                                    c.descripcion,
                                    c.url_rewrite,
                                    (select GROUP_CONCAT(id) from categoria where padre_id = $idDatosCategoria and estado = 1) as categorias
                            FROM
                                    categoria c
                            LEFT OUTER JOIN (
                                    SELECT
                                            padre_id
                                    FROM
                                            categoria
                                    GROUP BY
                                            padre_id
                            ) Deriv1 ON c.id = Deriv1.padre_id
                            WHERE
                                    c.padre_id = $idDatosCategoria
                                        and c.estado = 1
                            ORDER BY
                                    c.orden ASC";
} else {
$sqlListadoCategorias = "SELECT
                                    cat.id,
                                    cat.descripcion,
                                    cat.url_rewrite,
                                    $id_categoria as categorias
                            FROM
                                    categoria c
                            LEFT JOIN categoria cat ON cat.padre_id = $padreId
                            WHERE
                                    c.id = $padreId
                                    and c.estado = 1";
}
$db->setQuery($sqlListadoCategorias);
$listadoCategorias = $db->loadObjectList();
$categoriasIN = $listadoCategorias[0]->categorias;
$sqlListadoProductos = "SELECT
                                p.*, m.descripcion AS marca
                        FROM
                                producto p
                        LEFT JOIN marca m ON m.id = p.id_marca
                        WHERE
                                p.id_categoria IN ($categoriasIN)
                        AND p.estado = 1 order by p.id desc";

$db->setQuery($sqlListadoProductos);
$listadoProductos = $db->loadObjectList();
?>
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
<div class="page-content">
    <!-- .container start -->
    <div class="container">
        <!--MENU-->
        <?php include './menu-categorias.php'; ?>
        <!--END MENU-->
        <div class="main container">
            <div class="row">
                <div class="col-main col-sm-9 col-sm-push-3" style="visibility: visible;">
                    <div class="category-title">
                        <h1><?= utf8_encode($datosCategoria[0]->descripcion); ?></h1>
                    </div>

                    <div class="category-products">
                        <div class="toolbar">
                            <div class="pager">
                                <div class="pages">
                                    <ul class="pagination"><li><a href="http://localhost/saleosale.com.py/producto/categoria/electredomesticos-3/1">|&lt;</a></li> <li class=""><a href="http://localhost/saleosale.com.py/producto/categoria/electredomesticos-3/1">1</a></li> <li><a href="http://localhost/saleosale.com.py/producto/categoria/electredomesticos-3/1">&gt;|</a> </li></ul>                            </div>
                            </div>
                        </div>
                        <?php if(empty($listadoProductos)): ?>
                        <div class="alert alert-info" role="alert"><h4>Actualmente no hay productos disponibles en esta categoría</h4></div>
                        <?php else: ?>
                        <ul class="products-grid" id="listaProductos">
                            <?php foreach ($listadoProductos as $item): ?>
                            <?php
                            $imagen = $item->imagen;
                            $imagen = explode('|', $imagen);
                            ?>
                            <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-12">
                                <div class="col-item"><div class="product-image-area"> 
                                        <a class="product-image" title="<?= utf8_encode($item->nombre); ?>" href="<?= getUrl() . $item->id; ?>/ofertas/producto/<?= caracteres($item->nombre) ?>"> 
                                            <img src="<?= getUrl(); ?>img/productos/<?= $imagen[0]; ?>" class="img-responsive" alt="<?= utf8_encode($item->nombre); ?>"> 
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="info-inner">
                                            <div class="item-title"> 
                                                <a title="<?= utf8_encode($item->nombre); ?>" href="<?= getUrl() . $item->id; ?>/ofertas/producto/<?= caracteres($item->nombre) ?>"> <?= utf8_encode($item->marca) . ' - ' . utf8_encode($item->nombre); ?> </a> 
                                            </div>
                                            <!--item-title-->
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
                                            <!--item-content--> 
                                        </div>
                                        <!--info-inner-->
                                        <div class="actions">
                                            <a href="<?= getUrl() . $item->id; ?>/ofertas/producto/<?= caracteres($item->nombre) ?>" type="button" title="Agregar al Carrito" class="button btn-cart"><span>Ver Información</span></a>
                                        </div>
                                        <!--actions-->

                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9" style="visibility: visible;">
                    <div class="side-nav-categories">
                        <div class="block-title"> Categorías </div>
                        <div class="box-content box-category">
                            <ul id="magicat">
                                <?php foreach ($listadoCategorias as $item): ?>
                                <li class="level0- level0 last"> <span class="magicat-cat">
                                        <a href="<?= getUrl() . $item->id; ?>/ofertas/<?= utf8_encode($item->url_rewrite); ?>"><span><?= utf8_encode($item->descripcion); ?></span></a></span>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>  
<?php include 'footer.php'; ?>