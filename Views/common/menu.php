<?php

?>
<nav id="blockMenu" class="container-Menu">
    <div id="menu" class="menuforScroll">
        <ul id="menuafterScroll" class="Menu flex">
            <li id="home">

                <a href="home">Accueil</a>

            </li>
            <li id="sneakers">
                <a href="sneakers"> sneakers </a>
            </li>
            <li id="custom">
                <a href="custom">sneaker custom</a>
            </li>

            <li id="contact">
                <a href="contact">nous contacter</a>
            </li>
            <?php
            if (connect::isConnect()) {
            ?>
                <li>
                    <a><?= connect::getNames() ?></a>
                    <ul class="subMenu">
                        <li>
                            <a href="orders">Mes commandes</a>
                        </li>
                        <?php
                        if (connect::isAdmin()) {
                        ?>
                            <li>
                                <a href="createProduct">Créer un produit</a>
                            </li>
                            <li>
                                <a href="gestion">gestion</a>
                            </li>
                        <?php
                        }
                        ?>

                        <li>
                            <a href="logout" class="error">Deconnexion</a>
                        </li>
                    </ul>
                </li>
                <li class="h100 basketImage">
                    <a id="getNumBasket" href="basket" class="textBasket"><?= isset($numbasket) ? $numbasket : 0 ?></a>
                </li>

            <?php
            } else {
            ?>
                <li id=" inscription">
                    <a href="inscription">connexion/inscription</a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>
<script src="public/source/script/menu.js"></script>