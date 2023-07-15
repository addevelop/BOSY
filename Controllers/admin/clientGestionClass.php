<?php
require_once("Models/admin/gestionClientModel.php");
class clientGestionClass
{
    public $grade;
    public $search;
    public $page;


    public function __construct()
    {
        $this->setGrade();
        $this->setSearch();
        $this->setPage();
    }

    public function setGrade()
    {

        $this->grade = isset($_POST["grade"]) ? $_POST["grade"] : "";
    }

    public function setSearch()
    {
        $this->search = isset($_POST["search"]) ? $_POST["search"] : "";
    }

    public function setPage()
    {
        $this->page = isset($_POST["page"]) ? $_POST["page"] : (isset($_POST["pageCurrent"]) ? $_POST["pageCurrent"] : "0");
    }
    public function page($nb)
    {
        $gestionClient = new gestionClientModel($this->grade, $this->search);
        return round($gestionClient->page() / $nb);
    }

    public function client($client)
    {
        $gestionClient = new gestionClientModel($this->grade, $this->search);
        return $gestionClient->search($client, $this->page);
    }
}
