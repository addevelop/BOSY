<?php

session_start();

require_once("param/param.php");
require_once("Controllers/PageController.php");
require_once("Controllers/commons/Utils.php");
require_once("Controllers/commons/connectController.php");
require_once("Controllers/backController.php");

if (isset($_GET["page"])) {
    $page = $_GET["page"];

    $params = "";

    $uri = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $components = parse_url($uri);
    if (!empty($components["query"])) {
        parse_str($components['query'], $params);
    }


    switch ($page) {
        case "home":
            getHome();
            break;
        case "sneakers":
            getAllSneakers();
            break;
        case "custom":
            getAllSneakersCustom();
            break;
        case  "inscription":
            getInscription();
            break;
        case "login":
            getLogin();
            break;
        case "sneaker":
            getSneaker($params);
            break;
        case "logout":
            logout();
            break;
        case "orders":
            getOrders();
            break;
        case "basket":
            getBasket();
            break;
        case "confirmOrder":
            getConfirmOrder();
            break;
        case "createOrder":
            getCreateOrder();
            break;
        case "newCommande":
            getNewOrder();
            break;
        case "order":
            getOrder($params["numero"]);
            break;
        case "contact":
            getContact();
            break;
        case "createProduct":
            getCreateProduct();
            break;
        case "backCreateProduct":
            backCreateProduct();
            break;
        case "gestion":
            getGestion();
            break;
        case "gestionClient":
            getGestionClient();
        case "profil":
            getprofil($params);
            break;
        case "test":
            getTest();
            break;
    }
}
