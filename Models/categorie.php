<?php
require_once("db.php");
class categorie
{
    public $categorie;
    public $db;


    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function getCategories()
    {
        $getCategories = false;
        $stmt = $this->db->prepare("SELECT * FROM categories");
        if ($stmt->execute()) {
            $getCategories = $stmt->fetchAll();
        }
        return $getCategories;
    }

    public function isCategorieExist()
    {
        $categorieexist = false;
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE ID_categorie = :categorie OR categorie = :categorie");
        $stmt->bindParam(":categorie", $this->categorie, PDO::PARAM_STR);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $categorieexist = true;
            }
        }
        return $stmt->fetchAll();
    }

    public function createCategorie()
    {
        $createCategorie = false;
        $stmt = $this->db->prepare("INSERT INTO categories(categorie) VALUES(:categorie)");
        $stmt->bindParam(":categorie", $this->categorie, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $createCategorie = true;
        }
        return $createCategorie;
    }

    public function getCategoriebyCategorie()
    {
        $getbyCategorie = false;
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE categorie = :categorie");
        $stmt->bindParam(":categorie", $this->categorie, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $getbyCategorie = $stmt->fetch();
        }
        return $getbyCategorie;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }
}
