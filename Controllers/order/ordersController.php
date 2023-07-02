<?php
require_once("Models/createOrder.php");
require_once("Models/getOrder.php");
class OrdersController
{
    public static function createOrder($delivred, $promo)
    {
        $createOrder = new createOrder();
        return $createOrder->create($delivred, $promo);
    }
    public static function getLastOrder()
    {
        $getOrder = new getOrder;
        return $getOrder->getLastOrder();
    }

    public static function getNumLastOrder()
    {
        $getNumLastOrder = new getOrder();
        return $getNumLastOrder->getNumLastOrder();
    }

    public static function getOrdersById()
    {
        $getOrdersById = new getOrder();
        return $getOrdersById->getOrdersById();
    }


    public static function getOrderByNum($num)
    {
        $getOrderByNum = new getOrder();
        return $getOrderByNum->getOrderByNum($num);
    }

    public static function getInfosByNum($num)
    {
        $getInfosByNum = new getOrder();
        return $getInfosByNum->getInfosByNum($num);
    }
    
}
