<?php

ob_start();

?>


<link rel="stylesheet" href="public/source/css/contact.css" />
<section class="block_body flex flexCenter">
    <div class="formulary">
        <div class="textCenter title">formulaire de contact</div>
        <div class="block_contact">
            <form class="rowColumn">
                <div class="w-l-4 textCenter">
                <label class="labelinput">Email</label>
                <input type="text" name="email" />
                </div>
                <div class="w-l-2 textCenter">OU</div>
                <div class="w-l-4 textCenter">
                <label class="labelinput">Numéro de téléphone</label>
                <input type="number" name="tel" />
                </div>
                <div class="w-l-10">
                    <label>Objet</label>
                    <input class="w100" type="text" name="object"/>
                </div>
                <div class="w-l-10">
                    <label>texte</label>
                    <textarea class="w100"></textarea>
                </div>
                <div>
                    <input class="envoyercontact" type="submit" name="contact" value="envoyer"/>
                </div>
                
            </form>
        </div>
    </div>
</section>

<?php


$content = ob_get_clean();
require_once("Views/template.php");

?>