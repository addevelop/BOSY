<?php
require_once("Models/db.php");
require_once("Controllers/Utils/params.php");
function getHome()
{
    require_once("Views/front/home.php");
}


function getAllSneakers()
{
    require_once("Models/SneakersClass.php");
    require_once("Controllers/basket/basketControllerHandle.php");
    $nb = 3;
    $nbPage = 3;
    $getProducts = new Sneakers();
    $getProducts = $getProducts->getAllSneakers();

    require_once("Views/front/sneakers.php");
}

function getAllSneakersCustom()
{
    require_once("Models/SneakersClass.php");
    require_once("Controllers/basket/basketControllerHandle.php");

    $getProducts = new Sneakers();
    $getProducts = $getProducts->getAllSneakersCustom();

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
    $getProduct = $getProduct->getSneaker($id["sneaker"]);
    require_once("Views/front/sneaker.php");
}

function logout()
{
    require_once("Controllers/user/usersController.php");
    if (usersController::logout()) {
        header("Location: home");
    }
}

function getOrders()
{
    require_once("Controllers/order/ordersController.php");
    $orders = OrdersController::getOrdersById();
    require_once("Views/back/orders.php");
}

function getBasket()
{
    require_once("Controllers/basket/basketController.php");
    $basket = basketController::getBasket();
    $total = basketController::getTotal();
    $nombrePrd = basketController::getBasketStock();
    require_once("Views/back/basket.php");
}

function getTest()
{
    require_once("Controllers/basket/basketControllerHandle.php");

    require_once("test.php");
}

function getConfirmOrder()
{
    require_once("Controllers/basket/basketController.php");
    require_once("Controllers/user/CostumersController.php");
    require_once("Controllers/delivred/delivredController.php");
    $basket = basketController::getBasket();
    $total = basketController::getTotal();
    $address = CostumersController::getAddressById();
    $infos = CostumersController::getInfosById();
    $delivred = delivredController::getWay();
    require_once("Views/back/confirmOrder.php");
}


function getCreateOrder()
{
    require_once("Controllers/order/ordersController.php");
    if (ordersController::createOrder($_POST["delivred"], $_POST["promo"])) {
        header("Location: newCommande");
    }
}

function getNewOrder()
{
    require_once("Controllers/order/ordersController.php");
    $getNumLastOrder = ordersController::getNumLastOrder();
    $commande = ordersController::getLastOrder();
    require_once("Views/back/createOrder.php");
}

function getOrder($numorder)
{
    require_once("Controllers/order/ordersController.php");
    $getOrderByNum = OrdersController::getOrderByNum($numorder);
    $getInfosByNum = OrdersController::getInfosByNum($numorder);
    require_once("Views/back/order.php");
}

function getContact()
{
    require_once("Views/front/contact.php");
}

function getCreateProduct()
{
    require_once("Controllers/products/categorieController.php");
    require_once("Controllers/products/brandsController.php");
    $categories = categorieController::getCategories();
    $brands = brandsController::getBrands();
    require_once("Views/back/createProduct.php");
}

function getMessage($message)
{
    require_once("Views/back/message.php");
}

function getGestion()
{
    require_once("Views/front/gestion.php");
}

function getGestionClient()
{
    require_once("Controllers/admin/clientGestionClass.php");
    $nb = 3;
    $classClient = new clientGestionClass();
    $customer = $classClient->client($nb);
    $nbPage = $classClient->page($nb);
    require_once("Views/administrateur/gestionClient.php");
}
