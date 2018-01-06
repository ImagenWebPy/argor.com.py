<?php
include 'header.php';
#Nro Whatsapp
//$sqlSection5 = "SELECT * FROM section_5 where id = 1";
//$db->setQuery($sqlSection5);
//$section5 = $db->loadObject();
#datos producto
$id_producto = $_GET['id'];
$sqlProducto = "SELECT p.id,
			m.descripcion as marca,
			p.codigo,
			p.nombre,
			p.descripcion,
			p.contenido,
			p.imagen,
			mo.simbolo as moneda,
			p.precio,
			p.precio_oferta,
			p.stock,
			p.tags,
			p.nuevo,
			p.youtube_url,
			p.fecha_fin,
                        p.id_local,
                        p.estado
                FROM producto p 
                LEFT JOIN marca m on m.id = p.id_marca
                LEFT JOIN moneda mo on mo.id = p.id_moneda
                where p.id = $id_producto";
$db->setQuery($sqlProducto);
$producto = $db->loadObjectList();
$img = explode('|', $producto[0]->imagen);
$imgPrincipal = array_shift($img);
#Datos Local
$datosLocal = obtenerCorporativoLocal($producto[0]->id_local);
?>
<div class="page-content">
    <!-- .container start -->
    <div class="container">
        <?php include './menu-categorias.php'; ?>
        <div class="row" style="margin-top: 20px;">
            <div class="product-view">
                <div class="product-essential">
                    <div class="product-img-box col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        <?php if ($producto[0]->precio_oferta > 0): ?>
                            <div class="sale-label new-top-left" id="detail-new"> Oferta </div>
                        <?php elseif ($producto[0]->nuevo > 0): ?>
                            <div class="new-label new-top-left" id="detail-new"> Nuevo </div>
                        <?php endif; ?>

                        <div class="product-image">
                            <div class="large-image"> 
                                <a href="<?= getUrl() ?>/img/productos/<?= $imgPrincipal; ?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> 
                                    <img src="<?= getUrl() ?>/img/productos/<?= $imgPrincipal; ?>" alt=""> 
                                </a> 
                            </div>
                            <div class="flexslider flexslider-thumb">
                                <?php if (!empty($img)): ?>
                                    <ul class="previews-list slides">
                                        <?php foreach ($img as $item): ?>
                                            <li><a href='<?= getUrl() ?>/img/productos/<?= $item; ?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'products-images/product2.jpg' ">
                                                    <img src="<?= getUrl() ?>/img/productos/<?= $item; ?>" alt = "Thumbnail 1"/>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- end: more-images -->
                        <div class="clear"></div>
                    </div>
                    <div class="product-shop col-lg-7 col-sm-7 col-xs-12">
                        <div class="product-name">
                            <h1><?= utf8_encode($producto[0]->marca) . ' - ' . utf8_encode($producto[0]->nombre); ?></h1>
                        </div>

<!--<p class="availability in-stock"><span>In Stock</span></p>-->
                        <?php if (!empty($producto[0]->descripcion)): ?>
                            <div class="short-description">
                                <h2>Breve Reseña</h2>
                                <?= utf8_encode($producto[0]->descripcion) ?>
                            </div>
                        <?php endif; ?>
                        <div class="price-block">
                            <div class="price-box">
                                <?php if ($producto[0]->precio_oferta > 0): ?>
                                    <p class="old-price"> <span class="price-label">Precio Contado:</span> <span class="price"> Gs. <?= $producto[0]->precio; ?> </span> </p>
                                    <p class="special-price"> <span class="price-label">Precio de Oferta</span> <span class="price"> Gs. <?= number_format($producto[0]->precio_oferta, 0, ',', '.'); ?> </span> </p>
                                <?php else: ?>
                                    <p class="regular-price"> <span class="price-label">Precio Contado:</span> <span class="price">Gs. <?= number_format($producto[0]->precio, 0, ',', '.'); ?> </span> </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="ratings">
                            <div class="rating-box">
                                <div class="rating" style="width: 0px;"></div>
                            </div>
                            <p class="rating-links"> <a style=" font-weight: bold; color: #000; font-size: 16px;">Código</a> <span class="separator"><?= $producto[0]->codigo; ?></span></p>                                
                        </div>
                        <div class="add-to-box">
                            <div class="add-to-cart">
                                <?php if ($producto[0]->estado == 1): ?>
                                    <label for="qty">Consultar por este producto:</label>
                                    <?php foreach ($datosLocal as $item): ?>
                                        <div>
                                            <button class="button pull-left" type="button" style="background: #189D0E; color: #fff;"><span style="color: #fff;"><i class="fa fa-whatsapp" aria-hidden="true" style="font-size: 25px; color: #fff; position: relative; top: 3px"></i> <?php echo utf8_encode($item->corporativo); ?></span></button>
                                        </div>
                                    <?php endforeach; ?>
                                    <p>Disponible en la Sucursal: <a style="display: inline-block; font-weight: bold; cursor: pointer; color: inherit;"> <?= utf8_encode($datosLocal[0]->sucursal); ?></a></p>
                                <?php else: ?>
                                    <div class="alert alert-warning alert-dismissible fade in" role="alert">
                                        <strong>Lo sentimos.</strong> Este producto ya no se encuentra disponible. 
                                    </div>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
                <?php if (!empty($producto[0]->contenido)): ?>
                    <div class="product-collateral">
                        <div class="col-sm-12" style="visibility: visible;">
                            <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                                <li class="active"> <a href="#product_tabs_description" data-toggle="tab">Descripción</a></li>
                            </ul>
                            <div id="productTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="product_tabs_description">
                                    <div class="std">
                                        <?= $producto[0]->contenido; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>

