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
    $update = $update->addOnBasket($_POST["sneaker"], $_POST["quantity"], $_POST["size"], "change");
    return true;
}
if (isset($_POST["addProductDirect"])) {
    $add = "false";
    $basket = new Basket();

    if ($basket->addOnBasket($_POST["sneaker"], $_POST["quantity"], $_POST["size"], "add")) {
        $add = "true";
    }
    echo $_POST["quantity"];
    exit;
}
