<?php
require_once("Controllers/PageController.php");
require_once("Controllers/commons/Utils.php");
if (isset($_GET["page"])) {
    switch ($_GET["page"]) {
        case "home":
            getHome();
            break;
        case "sneakers":
            getAllSneakers();
            break;
        case  "inscription":
            getInscription();
            break;
        case "login":
            getLogin();
            break;
    }
}
