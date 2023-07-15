<?php
ob_start();
?>
<link rel="stylesheet" href="public/source/css/product.css" />
<section class="contains-product flex flexCenter">

    <div class="product rowColumn">
        <div class="w-l-5 blockimage">
            <img class="w100" src="public/data/sneakers/<?= $getProduct['path'] ?>" />
        </div>
        <div class="w-l-5 flexAuto flex flexColumn textCenter">
            <h2><?= $getProduct["title"] ?></h2>
            <p class="description flexAuto">Description : <br /><?= $getProduct["description"] ?></p>
            <p class="price"><?= $getProduct["price"] ?>€</p>
        </div>
    </div>

</section>
<?php
$content = ob_get_clean();
require_once("Views/template.php");
?>