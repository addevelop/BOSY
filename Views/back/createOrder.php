<?php

ob_start();


?>
<link rel="stylesheet" href="public/source/css/newCommande.css" />
<section class="w100 block_body flex flexCenter">
    <fieldset class="block_newCommande">
        <legend class="legend">Commande N° <span><?= $getNumLastOrder["numero"] ?></span></legend>
        <div class="rowColumn">
            <div class="w-l-3">title</div>
            <div class="w-l-3">prix</div>
            <div class="w-l-4">quantitée</div>
            <div class="bar"></div>
            <?php
            foreach ($commande as $product) :
            ?>
                <div class="w-l-3"><?= $product["title"] ?></div>
                <div class="w-l-3"><?= $product["price"] ?>€</div>
                <div class="w-l-4"><?= $product["quantity"] ?></div>
            <?php
            endforeach;
            ?>
            <div class="bar"></div>
            <?php
            if ($getNumLastOrder["promo"] != NULL) {
            ?>
                <div class="w-l-3">code promotion</div>
                <div class="w-l-7"><?= $getNumLastOrder["promo"] ?></div>
                <div class="w-l-3">promotion</div>
                <div class="w-l-7">-<?= $getNumLastOrder["percent"] ?>%</div>
                <div class="bar"></div>
            <?php
            }
            ?>
            <div class="w-l-3">
                total
            </div>
            <div><?= $getNumLastOrder["total"] ?>€</div>
        </div>
    </fieldset>
</section>

<?php

$content = ob_get_clean();
require_once("Views/template.php");
?>