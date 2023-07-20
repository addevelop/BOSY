<?php
ob_start();
?>
<link rel="stylesheet" href="public/source/css/profil.css" />

<section class="block flex flexCenter">
    <div class="profil">
        <div class="blockimg">
            <img class="w100" src="public/images/modifier.png" />
        </div>
        <div class="flex rowColumn">
            <div class="w-l-5">
                <div class="blocklabel">
                    <label>Prénom</label>
                    <input type="text" name="firstname" />
                </div>
            </div>
            <div class="w-l-5">
                <div class="blocklabel">
                    <label>Nom</label>
                    <input type="text" name="lastname" />
                </div>

            </div>
            <div class="w-l-10">
                <div class="blocklabel">
                    <label>email</label>
                    <input type=" text" name="email" disabled value="<?= $getUserById["email"] ?>" />
                </div>

            </div>
            <div class="w-l-10">
                <div class="changepassword">
                    <input type="checkbox" name="changepassword" />
                    <label>changer le mot de passe</label>
                </div>
            </div>
            <div class="w-l-5" class="passwords">
                <div class="blocklabel">
                    <label>Nouveau mot de passe</label>
                    <input type="password" name="password" />
                </div>
            </div>
            <div class="w-l-5" class="passwords">
                <div class="blocklabel">
                    <label>Confirmation mot de passe</label>
                    <input type="password" name="password2" />
                </div>
            </div>
            <div class="w-l-10">
                <div class="labelsubmit">
                    <input type="submit" name="edit" value="modifier" />
                </div>
            </div>

        </div>
    </div>
</section>
<?php

$content = ob_get_clean();

require_once("Views/template.php");

?>