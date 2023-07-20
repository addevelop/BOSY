<?php
ob_start();
?>
<link rel="stylesheet" href="public/source/css/login.css" />
<section class="block flex flexCenter">
    <form action="" method="POST" class="profil">
        <?= isset($login) ? "<div class='w100 textCenter error'>L'email ou le mot de passe est incorrecte</div>" : ""; ?>
        <div class="flex rowColumn">
            <div class="w-l-10">
                <div class="blocklabel">
                    <label>adresse email</label>
                    <input name="email" type="email" />
                </div>

            </div>
            <div class="w-l-10">
                <div class="blocklabel">
                    <label>Mot de passe</label>
                    <input name="password" type="password" />
                </div>

            </div>
            <div class="w-l-10">
                <div class="labelsubmit">
                    <input name="login" type="submit" value="connexion" />

                </div>
            </div>
        </div>
    </form>
</section>
<?php
$content = ob_get_clean();
require_once("Views/template.php");
?>