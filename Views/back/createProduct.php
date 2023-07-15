<?php
ob_start();
?>

<link rel="stylesheet" href="public/source/css/createProduct.css" />
<section class="blockBody w100 flex flexCenter">
    <form action="backCreateProduct" method="POST" enctype="multipart/form-data" class="blockProduct">
        <div class="textCenter">
            Création du produit
        </div>
        <div>
            <label>titre</label>
            <input type="text" name="title" />

        </div>
        <div>
            <label>description</label>
            <textarea name="description"></textarea>
        </div>
        <div>
            <label>prix</label>
            <div class="price"><input class="w100" type="text" name="price" /></div>

        </div>
        <div>
            <select data-click="otherCategorie" onchange="appear($(this))" name="categorie" class="textCenter">
                <option>--Categorie--</option>
                <?php foreach ($categories as $categorie) :
                ?>
                    <option value="<?= $categorie["ID_categorie"] ?>"><?= $categorie["categorie"] ?></option>
                <?php
                endforeach;
                ?>
                <option value="other">autre</option>
            </select>
            <div class="otherCategorie">
                <label>Autre Catégorie</label>
                <input class="w100" type="text" name="otherCategorie" />
            </div>
        </div>

        <div>
            <select data-click="otherBrand" onchange="appear($(this))" name="brand" class="textCenter">
                <option value="0">--marque--</option>
                <?php foreach ($brands as $brand) :
                ?>
                    <option value="<?= $brand["ID_brands"] ?>"><?= $brand["brands"] ?></option>
                <?php
                endforeach;
                ?>
                <option value="otherBrand">Autre</option>
            </select>
            <div class="otherBrand">
                <label>Autre marque</label>
                <input class="w100" type="text" name="otherBrand" />

            </div>

        </div>
        <div>
            <label>Stock</label>
            <input type="text" name="stock" />
        </div>
        <div class="rowColumn blockSend">
            <div class="w-l-5 inputFile">
                <div>
                    <label for="image1"><img class="image" src="public/images/file.svg" /></label>
                    <input class="labelinput" id="image1" type="file" name="image[]" />
                </div>
            </div>
            <div class="w-l-5 inputFile">
                <div>
                    <label for="image2"><img class="image" src="public/images/file.svg" /></label>
                    <input class="labelinput" id="image2" type="file" name="image[]" />
                </div>
            </div>
            <div class="w-l-5 inputFile">
                <div>
                    <label for="image3"><img class="image" src="public/images/file.svg" /></label>
                    <input class="labelinput" id="image3" type="file" name="image[]" />
                </div>
            </div>
            <div class="w-l-5 inputFile">
                <div>
                    <label for="image4"><img class="image" src="public/images/file.svg" /></label>
                    <input class="labelinput" id="image4" type="file" name="image[]" />
                </div>
            </div>
        </div>
        <div>
            <input class="poster" type="submit" value="poster" />
        </div>
    </form>
</section>
<script src="public/source/script/previewImage.js"></script>
<script src="public/source/script/createProduct.js"></script>
<?php
$content = ob_get_clean();
require_once("Views/template.php");
?>