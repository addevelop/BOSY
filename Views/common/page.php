<?php
$pageCurrent = isset($_POST["page"]) ? $_POST["page"] : (isset($_POST["pageCurrent"]) ? $_POST["pageCurrent"] : 0);
$pageAffiche = 2;
$page = isset($_POST["page"]) ? $_POST["page"] : (isset($_POST["pageCurrent"]) ? $_POST["pageCurrent"] : "0");
if ($nbPage > 0) {
?>
    <link rel="stylesheet" href="public/source/css/page.css" />
    <div class="flex flexCenter">
        <div class="flex pagination textCenter">
            <input type="hidden" name="pageCurrent" value="<?= isset($_POST["page"]) ? $_POST["page"] : "0" ?>" />
            <?php

            //Pécendent
            if ($pageCurrent > 0) {
                $pagePre = $page - 1;
            ?>
                <label class="page flexAuto" for="page<?= $pagePre ?>">précédente</label>
                <input class="displayNone" id="page<?= $pagePre ?>" type="submit" name="page" value="<?= $pagePre ?>" />
            <?php
            }
            ?>
            <?php
            if ($pageCurrent - $pageAffiche > 0) {
            ?>
                <label class="page flexAuto" for="pageind0">0</label>
                <input class="displayNone" id="pageind0" type="submit" name="page" value="0" />
                <div class="page flexAuto">...</div>

            <?php
            }
            ?>
            <?php
            //pages display
            $endnum = 0;
            for ($i = 0; $i < $nbPage; $i++) :
                if ($i <= $pageCurrent + $pageAffiche && $i > $pageCurrent || $i >= $pageCurrent - $pageAffiche && $i < $pageCurrent || $i == $pageCurrent) {
            ?>
                    <label class="page flexAuto <?= $i == $pageCurrent ? "pagenow" : "" ?>" for="page<?= $i ?>"><?= $i ?></label>
                    <input class="displayNone" id="page<?= $i ?>" type="submit" name="page" value="<?= $i ?>" />


            <?php
                }
                $endnum = $i;
            endfor;
            ?>
            <?php
            if ($pageCurrent + $pageAffiche < $endnum) {
            ?>
                <div class="page flexAuto">...</div>
                <label class="page flexAuto" for="pageind<?= $endnum ?>"><?= $endnum ?></label>
                <input class="displayNone" id="pageind<?= $endnum ?>" type="submit" name="page" value="<?= $endnum ?>" />
            <?php
            }
            ?>
            <?php
            if ($pageCurrent < $endnum) {
                $pageNext = $pageCurrent + 1;
            ?>
                <label class="page flexAuto" for="page<?= $pageNext ?>">Suivante</label>
                <input class="displayNone" id="page<?= $pageNext ?>" type="submit" name="page" value="<?= $pageNext ?>" />
            <?php
            }
            ?>
        </div>
    </div>
<?php
}
?>