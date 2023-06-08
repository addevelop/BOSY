<?php
require_once("Controllers/Utils/params.php");
function getHome()
{
    require_once("Views/front/home.php");
}


function getAllSneakers()
{
    require_once("Models/SneakersClass.php");
    $getProducts = new Sneakers();
    $getProducts = $getProducts->getAllSneakers();
    require_once("Views/front/sneakers.php");
}

function getInscription()
{
    require_once("Controllers/user/usersController.php");
    $message = null;
    if (isset($_POST["inscription"])) {
        $userSave = new usersController();
        $inscription = $userSave->save();
        echo $inscription;
        $message = $inscription == 1 ? "<div class='w100 textCenter'>Compte créé</div>" : "<div class='w100 textCenter error'>" . $inscription . "</div>";
    }


    require_once("Views/back/inscription.php");
}

function getLogin()
{
    require_once("Controllers/user/usersController.php");

    if (isset($_POST["login"])) {
        $userConnect = new usersController();
        $login = $userConnect->login();
        if ($login) {
            header("Location: home");
        }
    }

    require_once("Views/back/login.php");
}


function getSneaker($id)
{
    require_once("Models/SneakersClass.php");

    // $id = params::getParams($params, "sneaker");
    $getProduct = new Sneakers();
    $getProduct = $getProduct->getSneaker($id);
    require_once("Views/front/sneaker.php");
}
