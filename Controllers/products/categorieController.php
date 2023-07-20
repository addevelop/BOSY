<?php
require_once("Models/categorie.php");
class categorieController
{
    public static function getCategories()
    {
        $categorie = new categorie();
        return $categorie->getCategories();
    }

    public static function categorieExist($categorie)
    {
        $categorieExist = new categorie();
        $categorieExist->setCategorie($categorie);
        return $categorieExist->isCategorieExist();
    }
}
