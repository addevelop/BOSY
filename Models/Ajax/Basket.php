<?php
if (!session_start()) {
    session_start();
}
require_once("../../Controllers/commons/connectController.php");
require_once("../Basket.php");

if (isset($_POST["getNumBasket"])) {
    $basket = new Basket();
    echo $basket->getNumberBasket(connect::getId());
}
