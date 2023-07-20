<?php
ob_start();
?>
<link rel="stylesheet" href="public/source/css/product.css" />
<section class="contains-product flex flexCenter flexColumn">

    <div class="product rowColumn">
        <div class="w-l-5 blockimage">
            <div class="w100"><img id="imageId" class="w100" src="public/data/sneakers/<?= $getProduct['path'] ?>" /></div>
            <div class="flex flexCenter w100">
                <?php
                foreach ($getImages as $index => $productInfos) :
                ?>
                    <div class="imagesblock ">
                        <img onclick="changeImage(this)" class="w100 imagesneaker <?= $getProduct["path"] == $productInfos["path"] ? "imageselected" : "" ?>" src="public/data/sneakers/<?= $productInfos["path"] ?>" />
                    </div>
                <?php
                endforeach;
                ?>
            </div>
            <div></div>

        </div>
        <div class="w-l-5 flexAuto flex flexColumn textCenter">
            <div class="opinionsblock flex">
                <div class="flexAuto"><img class="w100" src="public/images/opinions/<?= isset($getAVGOpinion["avg"]) ? ceil($getAVGOpinion["avg"]) : "0" ?>.png" /></div>
                <a href="#" class="opinion flexAuto"><?= isset($getAVGOpinion["count"]) ? $getAVGOpinion["count"] : "0" ?> avis</a>
            </div>
            <h2><?= $getProduct["title"] ?></h2>
            <p class="description flexAuto">Description : <br /><?= $getProduct["description"] ?></p>
            <div class="flex flexAuto flexCenter blockSize">
                <?php
                foreach ($getInfos as $infos) :
                ?>
                    <div class="parentSize">
                        <?php
                        if ($infos["stock"] > 0) {
                        ?>
                            <input id="size<?= $infos["size"] ?>" class="displayNone" type="radio" name="size" value="<?= $infos["ID_stock"] ?>" />

                        <?php
                        }
                        ?>
                        <label for="size<?= $infos["size"] ?>" class=" size <?= $infos["stock"] <= 0 ? "stockepuisee" : "" ?>"><?= $infos["size"] ?></label>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
            <p class="price"><?= $getProduct["price"] ?>€</p>
            <div>
                <a data-click="addProductDirect" data-product="<?= $getProduct["ID_product"] ?>" class="addBasket">ajouter au panier</a>
            </div>
        </div>
    </div>
    <div class="blockavis flex flexcolumn">
        <div class="blockcommenter">
            <?php
            foreach ($getOpinions as $commenter) :
            ?>
                <div class="commenter">
                    <div><?= $commenter["created_atopinion"] ?></div>
                    <div class="imgopinion"><img src="public/images/opinions/<?= $commenter["number"] ?>.png"></div>
                    <div>
                        <b><?= $commenter["title"] ?></b> - <?= $commenter["anonymous"] == 1 ? "anonyme" : $commenter["firstname"] ?>
                    </div>
                    <div>
                        <?= $commenter["commenter"] ?>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
        <div class="rowColumn opinionformulary">
            <div class="w-l-10">
                <div class="labelopinion">
                    <fieldset>

                        <input style="--title: 'titre'" type="text" name="title" />
                        <legend>titre</legend>

                    </fieldset>

                </div>

            </div>
        </div>
    </div>

</section>
<script src="public/source/script/opinions.js"></script>
<script src="public/source/script/sneaker.js"></script>
<?php
$content = ob_get_clean();
require_once("Views/template.php");
?>