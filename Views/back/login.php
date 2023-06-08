<?php
ob_start();
?>
<link rel="stylesheet" href="public/source/css/login.css" />
<section class="contains-inscription flex flexCenter">
    <form action="" method="POST" class="inscription rowColumn">
        <?= isset($login) ? "<div class='w100 textCenter error'>L'email ou le mot de passe est incorrecte</div>" : ""; ?>
        <div class="w-l-10">
            <label>adresse email</label>
            <br />
            <input name="email" class="w100" type="email" />
        </div>
        <div class="w-l-10">
            <label>Mot de passe</label>
            <br />
            <input name="password" class="w100" type="password" />
        </div>
        <div class="w-l-10">

            <input class="w100 submit" name="login" type="submit" value="connexion" />
        </div>
    </form>
</section>
<?php
$content = ob_get_clean();
require_once("Views/template.php");
?>