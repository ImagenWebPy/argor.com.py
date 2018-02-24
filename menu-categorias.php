<?php
#Categorias
$sqlCategoriasPadres = "SELECT c.id, c.descripcion, c.url_rewrite, Deriv1.Count
                FROM categoria c
                LEFT OUTER JOIN (SELECT padre_id, COUNT(*) AS Count FROM categoria GROUP BY padre_id) Deriv1 ON c.id = Deriv1.padre_id
                WHERE c.padre_id = 0
                and c.estado = 1
                ORDER BY c.orden ASC
                LIMIT 6";
$db->setQuery($sqlCategoriasPadres);
$categoriasPadres = $db->loadObjectList();
?>
<!--<div class="wrap">
    <span class="decor"></span>
    <nav id="nav">
        <ul class="primary">
<?php foreach ($categoriasPadres as $item): ?>
                    <li>
                        <a href="<?= getUrl() . $item->id; ?>/ofertas/<?= utf8_encode($item->url_rewrite); ?>"><?= utf8_encode($item->descripcion); ?></a>
    <?php if ($item->Count > 0): ?>
        <?php
        $sqlSubMenu = "SELECT
                                                        c.id,
                                                        c.descripcion,
                                                        c.url_rewrite,
                                                        Deriv1.Count
                                                FROM categoria c
                                                LEFT OUTER JOIN (SELECT padre_id, COUNT(*) AS Count FROM categoria GROUP BY padre_id) Deriv1 ON c.id = Deriv1.padre_id
                                                WHERE c.padre_id = " . $item->id;
        $db->setQuery($sqlSubMenu);
        $subMenu = $db->loadObjectList();
        ?>
                                <ul class="sub">
        <?php foreach ($subMenu as $value): ?>
                                            <li><a href="<?= getUrl() . $value->id; ?>/ofertas/<?= utf8_encode($value->url_rewrite); ?>"><?= utf8_encode($value->descripcion); ?></a></li>
        <?php endforeach; ?>
                                </ul>
    <?php endif; ?>
                    </li>
<?php endforeach; ?>
            <li>
                <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
<?php
$sqlMenuPlus = "SELECT
                                                c.id,
                                                c.descripcion,
                                                c.url_rewrite,
                                                Deriv1.Count
                                        FROM categoria c
                                        LEFT OUTER JOIN (SELECT padre_id, COUNT(*) AS Count FROM categoria GROUP BY padre_id) Deriv1 ON c.id = Deriv1.padre_id
                                        WHERE c.padre_id = 0
                                        AND c.orden > 6
                                        ORDER BY c.orden ASC";
$db->setQuery($sqlMenuPlus);
$menuPlus = $db->loadObjectList();
?>
                <ul class="sub">
<?php foreach ($menuPlus as $item): ?>
                            <li><a href="<?= getUrl() . $item->id; ?>/ofertas/<?= utf8_encode($item->url_rewrite); ?>"><?= utf8_encode($item->descripcion); ?></a></li>
<?php endforeach; ?>
                </ul>
            </li>
        </ul>
    </nav>
</div>-->
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
        <?php echo mostrarMenu(0, 1); ?>
    </div><!-- /.nav-collapse -->
</nav>