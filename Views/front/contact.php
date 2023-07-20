<?php

ob_start();

?>


<link rel="stylesheet" href="public/source/css/login.css" />
<section class="block flex flexCenter">
    <form class="profil">
        <div class="flex rowColumn">
            <div class="w-l-5">
                <div class="blocklabel">
                    <label>Email</label>
                    <input type="text" name="email" />
                </div>

            </div>
            <div class="w-l-5">
                <div class="blocklabel">
                    <label>Numéro de téléphone</label>
                    <input type="number" name="tel" />
                </div>

            </div>
            <div class="w-l-10">
                <div class="blockselect">
                    <label>Type de demande</label>
                    <select>
                        <option>Devis</option>
                        <option>Demande</option>
                    </select>
                </div>

            </div>
            <div class="w-l-10">
                <div class="blocktextarea">
                    <label>Objet</label>
                    <input type="text" name="object" />
                </div>

            </div>
            <div class="w-l-10">
                <div class="blocktextarea">
                    <label>texte</label>
                    <textarea></textarea>
                </div>

            </div>
            <div class="w-l-10">
                <div class="labelsubmit">
                    <input type="submit" name="contact" value="envoyer" />
                </div>

            </div>

        </div>
    </form>
</section>

<?php


$content = ob_get_clean();
require_once("Views/template.php");

?>