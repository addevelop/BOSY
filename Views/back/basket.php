<?php
ob_start();

?>
<link rel="stylesheet" href="public/source/css/basket.css" />
<section class="rowColumn">
    <div class="rowColumn w-l-8">
        <?php
        foreach ($basket as $value) :
        ?>
            <div name="product" class="product rowColumn">
                <div class="imgBasket w-l-1">
                    <img class="w100" src="public/data/sneakers/<?= $value["path"] ?>" />
                </div>
                <div class="w-l-7">
                    <a><?= $value["title"] ?></a>
                </div>
                <div class="w-l-1">
                    <div>quantité : </div>
                    <input type="hidden" name="productPrice" value="<?= $value["price"] ?>" />
                    <select data-select="updateOnBasket" name="quantity" data-id="<?= $value["ID_product"] ?>">
                        <?php
                        for ($i = 0; $i <= $value["stock"]; $i++) :
                        ?>
                            <option value="<?= $i ?>" <?= $value["quantity"] == $i ? "selected" : "" ?>>
                                <?= $i ?>
                            </option>
                        <?php
                        endfor;
                        ?>
                    </select>


                </div>
                <div class=" w-l-1">total : <span name="price"><?= $value["total"] ?></span>€
                </div>
            </div>

        <?php
        endforeach
        ?>

    </div>
    <div class="w-l-2">
        <div class="font18 prices">
            <fieldset class="ticket">
                <legend>Total</legend>
                <div class="flex"><b>prix</b> : <div class="textEnd w100"><?= $total["total"] ?>€</div>
                </div>
                <div class="flex"><b>frais de livraison</b> : <div class="textEnd w100">offert</div>
                </div>
                <div class=" bar"></div>
                <div>Total : <span name="allPrice"><?= $total["total"] ?></span>€</div>
                <div>
                    <a href="confirmOrder" class="send">Commander</a>
                </div>
            </fieldset>

        </div>
    </div>
</section>
<script src="public/source/script/basket.js"></script>

<?php
$content = ob_get_clean();
require_once("Views/template.php");
?>