<link rel="stylesheet" href="public/source/css/filtre.css" />

<nav class="filtreblock">
    <div class="filtre flex rowColumn">
        <div class=" inputblock w-l-5 rowColumn">
            <label class="w-l-10 labelfiltre">Recherche par titre</label>
            <input class="w-l-2 w-m-7 w-s-10" type="text" name="title" placeholder="Recherche" value="<?= isset($_POST["title"]) ? $_POST["title"] : "" ?>" />
        </div>
        <div class="w-l-5 rowColumn">
            <label class="w-l-10 labelfiltre">Catégrorie</label>
            <select class="w-l-2 w-m-7 w-s-10" name="categoriefiltre">
                <option>Tous</option>
                <?php
                foreach ($categories as $categorie) :
                ?>
                    <option <?= isset($_POST["categoriefiltre"]) && $_POST["categoriefiltre"] == $categorie["categorie"] ? "selected" : "" ?>><?= $categorie["categorie"] ?></option>

                <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="w-l-2 h100 flex">
            <div><input class="submitsearch" type="submit" name="recherche" value="recherche" /></div>
        </div>
    </div>
</nav>