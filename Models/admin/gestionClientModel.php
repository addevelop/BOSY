<?php
require_once("Models/db.php");
class gestionClientModel
{
    public $grade;
    public $search;
    public $strgrade;
    public $db;

    public function __construct($grade, $search)
    {
        $this->grade = $grade != "" ? $grade : "%";
        $this->search = $search != "" ? $search : "%";
        $this->db = Database::connect();
    }

    public function page()
    {
        $page = false;
        $stmt = $this->db->prepare("SELECT * FROM users WHERE ID_administration LIKE :grade AND firstname LIKE :search OR lastname LIKE :search OR email LIKE :search");
        $stmt->bindParam(":grade", $this->grade, PDO::PARAM_STR);
        $stmt->bindParam(":search", $this->search, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $page = $stmt->rowCount();
        }
        return $page;
    }
    public function search($client, $page)
    {
        $search = false;
        $nbPage = $client * $page;
        $stmt = $this->db->prepare("SELECT * FROM users WHERE ID_administration LIKE :grade AND firstname LIKE :search OR lastname OR :search OR email OR :search LIMIT :client OFFSET :nbPage");
        $stmt->bindParam(":grade", $this->grade, PDO::PARAM_STR);
        $stmt->bindParam(":search", $this->search, PDO::PARAM_STR);
        $stmt->bindParam(":client", $client, PDO::PARAM_INT);
        $stmt->bindParam(":nbPage", $nbPage, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $search = $stmt->fetchAll();
        }
        return $search;
    }
}
