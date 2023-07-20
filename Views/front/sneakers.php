<?php
ob_start();
?>
<link rel="stylesheet" href="public/source/css/products.css" />

<form action="" method="POST" class="sneakers">
    <?php
    require_once("Views/common/filtre.php");
    ?>
    <div class="products">
        <?php
        foreach ($getSneakers as $key => $value) :
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
                        <!-- <div class="flexAuto">
                            <?php
                            if ($value["stock"] > 0) {
                            ?>
                                <a data-click="addProductDirect" data-product="<?= $value["ID_product"] ?>" class=" add">Ajouter au panier</a>
                            <?php
                            } else {
                            ?>
                                <a class="noStock">Stock épuisé</a>
                            <?php
                            }
                            ?>

                        </div> -->
                    <?php
                    }
                    ?>
                    <div class="flexAuto">
                        <a href="sneaker?sneaker=<?= $value["ID_product"] ?>" class=" view-product">Voir le produit</a>
                    </div>
                </div>

            </div>

        <?php endforeach; ?>
    </div>
    <?php
    require_once("Views/common/page.php");
    ?>
</form>
<?php
$content = ob_get_clean();
require_once("Views/template.php");
?>