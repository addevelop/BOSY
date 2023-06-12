<?php
ob_start();

?>
<link rel="stylesheet" href="public/source/css/basket.css" />
<section>
    <div>
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
                    <div>quantité : </div>
                    <input


                </div>
                <div class=" w-l-1">total : <?= $value["total"] ?>€
                </div>
            </div>

        <?php
        endforeach
        ?>
    </div>
</section>

<?php
$content = ob_get_clean();
require_once("Views/template.php");
?>