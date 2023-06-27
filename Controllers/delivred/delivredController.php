<?php

require_once("Models/Delivred.php");
class delivredController
{
    public static function getWay()
    {
        $getWay = new Delivred();
        return $getWay->getWay();
    }
}
