<?php
ob_start();

?>
<link rel="stylesheet" href="public/source/css/confirmOrder.css" />
<div class="w100 rowColumn flexCenter">
    <div data-etape="1" onclick="etape(1)" class="w-l-2 etape"><img class="w100" src="public/images/etape/1.png" /></div>
    <div data-etape="2" onclick="etape(2)" class="w-l-2 etape"><img class="w100" src="public/images/etape/2.png" /></div>
    <div data-etape="3" class="w-l-2 etape"><img class="w100" src="public/images/etape/3.png" /></div>
    <div data-etape="4" class="w-l-2 etape"><img class="w100" src="public/images/etape/4.png" /></div>

</div>
<section data-sectionetape="1" class="datasectionetape">
    <fieldset class=" block-ticket marginAuto">
        <legend class="font18 textCenter">Confirmation Order</legend>
        <p onclick="etape(2)">suivant</p>
        <?php
        foreach ($basket as $value) :
        ?>
            <div class="product rowColumn">
                <div class="imgBasket w-l-1">
                    <img class="w100" src="public/data/sneakers/<?= $value["path"] ?>" />
                </div>
                <div class="w-l-7">
                    <a><?= $value["title"] ?></a>
                </div>
                <div class="w-l-1">
                    <div>quantité : <?= $value["quantity"] ?></div>


                </div>
                <div class=" w-l-1"><span name="price"><?= $value["price"] ?>€/unitée</span>
                </div>
            </div>

        <?php
        endforeach
        ?>

    </fieldset>

</section>
<section data-sectionetape="2" id="etape2" class="datasectionetape">
    <fieldset class="block-ticket margin-auto">
        <legend class="font18 textCenter">adresse de livraison</legend>
        <p onclick="etape(3)" data-click="2" class="dataclick2">suivant</p>
        <form>
            <div>
                <label class="label_input">
                    numéro de téléphone
                </label>
                <input type="text" name="phone_number" value="<?= isset($infos['mobile_phone']) ? $infos['mobile_phone'] : ''  ?>" />
            </div>
            <div class=" rowColumn">
                <div class="w-l-10">
                    <label class="label_input">
                        titre de l'addresse
                    </label>
                    <input type=" text" name="title" value="<?= isset($address['title']) ? $address['title'] : '' ?>" />
                </div>
                <div class="w-l-3">
                    <label class="label_input">
                        addresse
                    </label>
                    <input class="input" type=" text" name="address" value="<?= isset($address['address']) ? $address['address'] : '' ?>" />
                </div>
                <div class=" w-l-3">
                    <label class="label_input">code postal</label>
                    <input class="input" type=" number" name="zip_code" value="<?= isset($address['zip_code']) ? $address['zip_code'] : '' ?>" />
                </div>
                <div class="w-l-3">
                    <label class="label_input">
                        ville
                    </label>
                    <input class="input" type=" text" name="city" value="<?= isset($address['city']) ? $address['city'] : '' ?>" />
                </div>

            </div>
            <div>
                <label>
                    description
                </label>
                <textarea name="description" class="w100"><?= isset($address['description']) ? $address['description'] : '' ?></textarea>
            </div>
        </form>
    </fieldset>
</section>
<form method="POST" action="createOrder">
    <section data-sectionetape="3" id="etape3" class="datasectionetape">
        <fieldset class="block-ticket margin-auto">
            <legend class="font18 textCenter">Moyen de livraison</legend>
            <p onclick="etape(4)" data-click="3" class="dataclick2">suivant</p>

            <?php foreach ($delivred as $delivredOne) : ?>
                <div>
                    <label>
                        <?= $delivredOne["title"] ?>
                    </label>
                    <input type="radio" name="delivred" value="<?= $delivredOne["delivred"] ?>" />
                    <span><?= $delivredOne["price"] ?>€</span>
                </div>
            <?php endforeach; ?>

        </fieldset>
    </section>
    <section data-sectionetape="4" id="etape4" class="datasectionetape">
        <fieldset class="block-ticket margin-auto">
            <legend class="font18 textCenter">Moyen de livraison</legend>
            <div>
                <label class="labelpromo">code promo</label>
                <input class="inputpromo" type="text" name="promo" />
                <input type="submit" class="payer" value="payer" />
            </div>
        </fieldset>
    </section>
</form>
<script src=" public/source/script/etape.js"></script>
<script src="Controllers/user/addressAjax.js"></script>

<?php
$content = ob_get_clean();
require_once("Views/template.php");
?>