<?php
ob_start();

?>

<link rel="stylesheet" href="public/source/css/orders.css" />
<section class="rowColumn">
    <div class="contains_orders">
    <?php
        foreach($orders as $order):
    ?>
<a href="order?numero=<?= $order['numero'] ?>" class="order rowColumn w-l-10">
    <div class="w-l-1">
        <div class="block_image">
            <img class="image_order" src="public/data/sneakers/<?= $order["path"] ?>" />
            <div class="quantity_products"><?= $order["quantity"] ?></div>
        </div>
        </div>
        
    <div class="numorder w-l-3">n°<?= $order["numero"] ?></div>
    <div class="priceorder w-l-3"><?= $order["total"] ?>€</div>
    <div class="levelorder w-l-3"><?= $order["status_orders"] ?></div>
        </a>
<?php
    endforeach;
?>
</div>
</section>


<?php

$content = ob_get_clean();
require_once("Views/template.php");
?>