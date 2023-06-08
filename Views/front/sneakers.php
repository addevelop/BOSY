<?php
ob_start();
?>
<link rel="stylesheet" href="public/source/css/products.css" />
<div></div>
<section class="products">
    <?php
    foreach ($getProducts as $key => $value) :
    ?>
        <div class="product">
            <div class="imgProduct">
                <img src="public/data/sneakers/<?= $value["path"] ?>" class="w100" />
            </div>
            <div class="infosPorduct">
                <h2 class="title_Products"><?= $value["title"] ?></h2>
                <div class="price_Products"><?= $value["price"] ?>€</div>
            </div>
        </div>
    <?php endforeach; ?>

</section>
<?php
$content = ob_get_clean();
require_once("Views/template.php");
?>