<?php
require_once("Models/SneakersClass.php");
require_once("Controllers/products/categorieController.php");
class GetSneakersClass
{
    public $title;
    public $pricemin;
    public $pricemax;
    public $size;
    public $page;
    public $categorie;

    public function __construct()
    {
        $this->setTitle();
        $this->setPage();
        $this->setCategorie();
    }

    public function setTitle()
    {
        $this->title = isset($_POST["title"]) && $_POST["title"] != "" ? "%" . $_POST["title"] . "%" : "%";
    }

    public function setPage()
    {
        $this->page = isset($_POST["page"]) ? $_POST["page"] : (isset($_POST["pageCurrent"]) ? $_POST["pageCurrent"] : "0");
    }
    public function setCategorie()
    {
        $this->categorie = isset($_POST["categoriefiltre"]) && categorieController::categorieExist($_POST["categoriefiltre"]) ? $_POST["categoriefiltre"] : "%";
    }
    public function getSneakers($limit)
    {
        $sneaker = new Sneakers();
        return $sneaker->getAllSneakers($this->title, $this->categorie, $limit, $this->page);
    }

    public function pageSneaker($nb)
    {
        $sneaker = new Sneakers();
        return ceil($sneaker->getNombreSneakers($this->title, $this->categorie) / $nb);
    }
}
