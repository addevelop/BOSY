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
}
