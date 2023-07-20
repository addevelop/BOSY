<?php
ob_start();
?>
<link rel="stylesheet" href="public/source/css/login.css" />
<section class="block flex flexCenter">
    <form action="" method="POST" class="profil">
        <?= $message ?>
        <div class="rowColumn flex">
            <div class="w-l-5">
                <div class="blocklabel">
                    <label>Prénom</label>

                    <input name="firstname" type=" text" value="" />
                </div>

            </div>
            <div class=" w-l-5">
                <div class="blocklabel">
                    <label>Nom</label>
                    <input name="lastname" type="text" value="" />
                </div>

            </div>
            <div class=" w-l-10">
                <div class="blocklabel">
                    <label>adresse email</label>
                    <input name="email" type="email" value="" />
                </div>

            </div>
            <div class=" w-l-10">
                <div class="blocklabel">
                    <label>Numéro de téléphone</label>
                    <input name="mobile_phone" type="text" value="" />
                </div>

            </div>
            <div class="w-l-5">
                <div class="blocklabel">
                    <label>Mot de passe</label>
                    <input name="password" type="password" />
                </div>

            </div>
            <div class="w-l-5">
                <div class="blocklabel">
                    <label>comfirmer le mot de passe</label>
                    <input name="password1" type="password" />
                </div>

            </div>
            <div class="w-l-10">
                <div class="labelsubmit">
                    <input type="submit" name="inscription" value="Inscription" />

                </div>
            </div>
            <a href="login" class="alogin">déja inscrit ?</a>
        </div>
    </form>
</section>
<?php
$content = ob_get_clean();
require_once("Views/template.php");
?>