<?php
ob_start();
?>
<link rel="stylesheet" href="public/source/css/login.css" />
<section class="contains-inscription flex flexCenter">
    <form action="" method="POST" class="inscription rowColumn">
        <?= $message ?>
        <div class="w-xs-1 w-l-5">
            <label class="w100">Prénom</label>
            <br />
            <input name="firstname" class="w100" type=" text" value="" />
        </div>
        <div class=" w-l-5">
            <label>Nom</label>
            <br />
            <input name="lastname" class="w100" type="text" value="" />
        </div>
        <div class=" w-l-10">
            <label>adresse email</label>
            <br />
            <input name="email" class="w100" type="email" value="" />
        </div>
        <div class=" w-l-10">
            <label>Numéro de téléphone</label>
            <br />
            <input name="mobile_phone" class="w100" type="text" value="" />
        </div>
        <div class="w-l-10">
            <label>Mot de passe</label>
            <br />
            <input name="password" class="w100" type="password" />
        </div>
        <div class="w-l-10">
            <label>comfirmer le mot de passe</label>
            <br />
            <input name="password1" class="w100" type="password" />
        </div>
        <div class="w-l-10">

            <input class="w100 submit" type="submit" name="inscription" value="Inscription" />
        </div>
        <a href="login">déja inscrit ?</a>
    </form>
</section>
<?php
$content = ob_get_clean();
require_once("Views/template.php");
?>