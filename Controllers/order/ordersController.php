<?php
require_once("Models/createOrder.php");
class OrdersController
{
    public static function createOrder($delivred)
    {
        $createOrder = new createOrder();
        return $createOrder->create($delivred);
    }
}
