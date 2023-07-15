<?php
require_once("db.php");

class Sneakers
{
    private $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function getAllSneakers()
    {
        $stmt = $this->db->query("SELECT * FROM products INNER JOIN images on images.ID_product = products.ID_product");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getSneaker($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM products INNER JOIN images on images.ID_product = products.ID_product WHERE products.ID_product = :id");
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getAllSneakersCustom()
    {
        $stmt = $this->db->query("SELECT * FROM products INNER JOIN images on images.ID_product = products.ID_product WHERE products.ID_categorie = 1");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
