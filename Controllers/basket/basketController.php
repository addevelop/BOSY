<?php
if (file_exists("Models/Basket.php")) {
    require_once("Models/Basket.php");
} else {
    require_once("../../Models/Basket.php");
}
class basketController
{
    public static function add($sneaker, $quantity)
    {
        $add = false;
        $basket = new Basket();

        if ($basket->addOnBasket($sneaker, $quantity, "add")) {
            $add = true;
        }
        return $add;
    }

    public static function getBasket()
    {
        $basket = new Basket();
        return $basket->getBasket();
    }

    public static function checkStockProducts($sneaker)
    {
        $checkNumberProduct = new Basket();
        $checkNumberProduct->checkStockProducts($sneaker);
    }

    public static function getTotal()
    {
        $total = new Basket();
        return $total->getTotal() ? $total->getTotal() : false;
    }
}
