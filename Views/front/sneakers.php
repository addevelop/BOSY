<?php
ob_start();
?>
<link rel="stylesheet" href="public/source/css/products.css" />
<div></div>
<section class="products">
    <?php
    foreach ($getProducts as $key => $value) :
    ?>
        <div class="product flex flexColumn">
            <div class="imgProduct flexAuto">
                <img src="public/data/sneakers/<?= $value["path"] ?>" class="w100" />
            </div>
            <div class="infosPorduct flexAuto">
                <h2 class="title_Products"><?= $value["title"] ?></h2>
                <div class="price_Products"><?= $value["price"] ?>€</div>
            </div>
            <div class="flex textCenter">
                <?php
                if (connect::isConnect()) {
                ?>
                    <div class="flexAuto">
                        <a data-click="addProductDirect" data-product="<?= $value["ID_product"] ?>" class=" add">Ajouter au panier</a>
                    </div>
                <?php
                }
                ?>
                <div class="flexAuto">
                    <a href="sneaker?sneaker=<?= $value["ID_product"] ?>" class=" view-product">Voir le produit</a>
                </div>
            </div>

        </div>

    <?php endforeach; ?>
</section>
<script src="Controllers/basket/basketAjax.js"></script>
<?php
$content = ob_get_clean();
require_once("Views/template.php");
?>