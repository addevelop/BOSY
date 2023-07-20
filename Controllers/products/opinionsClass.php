<?php
require_once("Models/opinions.php");
class opinionsClass
{
    public static function getOpinionsByIdProduct($idproduct)
    {
        $getOpinionsByIdProduct = new opinions();
        return $getOpinionsByIdProduct->getOpinionsByIdProduct($idproduct);
    }

    public static function getAVGOpinionByIdProduct($idproduct)
    {
        $getAVGOpinionByIdProduct = new opinions();
        return $getAVGOpinionByIdProduct->getAVGOpinionByIdProduct($idproduct);
    }
}
