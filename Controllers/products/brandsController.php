<?php
require_once("Models/brands.php");
class brandsController
{
    public static function getBrands()
    {
        $getBrands = new brands();
        return $getBrands->getBrands();
    }
}
