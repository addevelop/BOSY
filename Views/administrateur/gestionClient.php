<?php

ob_start();

?>

<link rel="stylesheet" href="public/source/css/gestionClient.css" />
<form action="" method="POST" class="rowColumn blockGestionClient">
    <div class="w-l-2 filtre">
        <div class="filtreblock">
            <div class="filtretitle textCenter">
                Filtres
            </div>
            <div>
                <div class="filtretitle">
                    Nom, email
                </div>
                <div>
                    <input type="text" name="search" value="<?= isset($_POST["search"]) ? $_POST["search"] : "" ?>" />
                </div>
                <div class="filtretitle">
                    Grade
                </div>
                <div>
                    <label>membre</label>
                    <input type="radio" name="grade" <?= isset($_POST["grade"]) && $_POST["grade"] == "1" ? "checked" : "" ?> value="1" />
                </div>
                <div>
                    <label>administrateur</label>
                    <input type="radio" name="grade" <?= isset($_POST["grade"]) && $_POST["grade"] == "2" ? "checked" : "" ?> value="2" />
                </div>
            </div>
            <div>
                <input type="submit" name="filtre" value="résultat" />
            </div>
        </div>
    </div>
    <div class="w-l-8">
        <table class="filtertable">
            <tr class="rowtr">
                <td>ID</td>
                <td>name</td>
                <td>phone mobile</td>
                <td>email</td>
                <td class="flex">
                    <div class="flexAuto flex flexCenter">Modifier</div>
                    <div class="flexAuto flex flexCenter">Supprimer</div>
                </td>
            </tr>
            <?php
            foreach ($customer as $client) :
            ?>
                <tr class="rowtr">
                    <td><?= $client["ID_user"] ?></td>
                    <td><?= $client["firstname"] . " " . $client["lastname"] ?></td>
                    <td><?= $client["mobile_phone"] ?></td>
                    <td><?= $client["email"] ?></td>
                    <td class="flex">
                        <div class="flexAuto flex flexCenter"><a data-id="<?= $client["ID_user"] ?>" class="edit">Modifier</a></div>
                        <div class="flexAuto flex flexCenter"><a data-id=" <?= $client["ID_user"] ?>" class="delete">Supprimer</a></div>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
        <?php
        require_once("Views/common/page.php");
        ?>
    </div>
</form>
<?php

$content = ob_get_clean();

require_once("Views/template.php");

?>