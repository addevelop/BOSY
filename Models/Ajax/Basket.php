<?php
if (!session_start()) {
    session_start();
}
require_once("../../Controllers/commons/connectController.php");
require_once("../Basket.php");

if (isset($_POST["getNumBasket"])) {
    $basket = new Basket();
    echo $basket->getNumberBasket();
}

if (isset($_POST["updateProductOnBasket"])) {
    $update = false;
    $update = new Basket();
    $update = $update->addOnBasket($_POST["sneaker"], $_POST["quantity"], "change");
    return true;
}
