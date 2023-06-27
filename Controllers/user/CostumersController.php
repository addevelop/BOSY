<?php
require_once("Controllers/commons/connectController.php");
require_once("Models/costumers.php");
class CostumersController
{
    private $id;

    public static function getAddressById()
    {
        $getaddressbyid = new Costumers();
        return $getaddressbyid->getAddressById();
    }

    public static function getInfosById()
    {
        $getInfos = new Costumers();
        return $getInfos->getInfoById();
    }
}
