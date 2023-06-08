<?php
ob_start();

?>

<link rel="stylesheet" href="public/source/css/home.css" />

<section class="flex flexColumn firstHome">
    <img class="logoHome" src="public/images/BYSO.png" />
    <div class="flexAuto flexCenter flex">
        <h2 class="title-Home">By your <br />
            self
        </h2>
    </div>
    <div>
        <p class="Bottom-Home textCenter">
            find the sneakers of your dreams
        </p>
    </div>
</section>
<section class="secondHome flex flexColumn gridAuto">
    <div class="padding1"><img class="w50 floatLeft imgCustomBasket" src=" public/images/custom basket.png" />
    </div>
    <div class="padding1">
        <div class="w50 sneakersCustom floatRight h100 overflow color1 font2">
            <h2>Sneakers custom</h2>
            des passionnés dévoués qui consacrent leur temps et leur talent à la création de sneakers personnalisées. Ces artisans de la chaussure sont des artistes en herbe, mêlant leur amour pour la mode, le design et la culture des baskets pour donner naissance à des œuvres uniques.
        </div>
    </div>
</section>


<?php

$content = ob_get_clean();
require_once("Views/template.php");
?>