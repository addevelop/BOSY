<nav id="blockMenu" class="container-Menu">
    <div id="menu" class="menuforScroll">
        <ul id="menuafterScroll" class="Menu flex">
            <li id="home">

                <a href="home">Home</a>

            </li>
            <li id="sneakers">
                <a href="sneakers"> sneakers </a>
            </li>
            <li>
                sneakers custom
            </li>

            <li>
                nous contacter
            </li>
            <?php
            if (isConnect()) {
            ?>
                <li id="inscription">
                    <a><?= getNames() ?></a>
                </li>

            <?php
            } else {
            ?>
                <li id="inscription">
                    <a href="inscription">connexion/inscription</a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>
<script src="public/source/script/menu.js"></script>