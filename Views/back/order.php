<?php

ob_start();

?>
<link rel="stylesheet" href="public/source/css/order.css" />
<section>
    
    <div class="numorder">n°<?= $getInfosByNum["numero"] ?></div>
    <div class="levelorder"><?= $getInfosByNum["title"] ?></div>
    <div class="order textCenter rowColumn">
        <div class="w100 barelem rowColumn">
        <div class="w-l-2">produit</div>
        <div class="w-l-2">titre</div>
        <div class="w-l-2">quantitée</div>
        <div class="w-l-2">prix</div>
        <div class="w-l-2">total</div>
        </div>
        
        
        
        <?php foreach($getOrderByNum as $order):
        ?>
        <div class="w-l-10 column rowColumn">
        <div class="block_image w-l-2">
            <img class="image_order" src="public/data/sneakers/<?= $order["path"] ?>" />
        </div>
        <div class="w-l-2"><?= $order["title"] ?></div>
        <div class="quantity_products w-l-2"><?= $order["quantity"] ?></div>
        <div class="w-l-2"><?= $order["price"] ?>€</div>
        <div class="w-l-2"><?= $order["price"] * $order["quantity"] ?>€</div>
        </div>
            

        
        <?php 
        endforeach;
        ?>
        
        
    </div>
</section>

<?php

$content = ob_get_clean();


require_once("Views/template.php");