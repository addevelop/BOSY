<?php

ob_start();

?>

<link rel="stylesheet" href="public/source/css/gestion.css" />
<section class="blockBody flex flexCenter">
    <div class="block rowColumn textCenter flex flexCenter">
        <div class="w-l-3 gestion">
            <a href="gestionClient" class="flex flexCenter" style="--bg: #1E90FF;">clients</a>
        </div>
        <div class="w-l-3 gestion">
            <a href="gestionCommande" class="flex flexCenter" style="--bg: #FBC447;">Commande</a>
        </div>
        <div class="w-l-3 gestion">
            <a href="gestionProduct" class="flex flexCenter" style="--bg: #F5F165;">Produit</a>
        </div>
    </div>
</section>
<?php

$content = ob_get_clean();

require_once("Views/template.php");
