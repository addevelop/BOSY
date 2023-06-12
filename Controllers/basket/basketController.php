<?php
require_once("Models/Basket.php");
class basketController
{
    public function add($sneaker, $quantity)
    {
        $add = false;
        $basket = new Basket();

        if ($basket->addOnBasket($sneaker, $quantity)) {
            $add = true;
        }
        return $add;
    }

    public static function getBasket()
    {
        $basket = new Basket();
        return $basket->getBasket();
    }
}
