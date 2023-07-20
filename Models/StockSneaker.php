<?php
require_once("Models/db.php");
class StockClass
{
    public $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function getStockBySneakerId($id)
    {
        $getStock = false;
        $stmt = $this->db->prepare("SELECT * FROM stock WHERE ID_product = :idsneaker ORDER BY size");
        $stmt->bindParam(":idsneaker", $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $getStock = $stmt->fetchAll();
        }
        return $getStock;
    }

    public function createStock($id, $size, $stock)
    {
        $createStock = false;
        $stmt = $this->db->prepare("INSERT INTO stock(size, ID_product, stock) VALUES(:size, :idsneaker, :stock)");
        $stmt->bindParam(":size", $size, PDO::PARAM_INT);
        $stmt->bindParam(":idsneaker", $id, PDO::PARAM_INT);
        $stmt->bindParam(":stock", $stock, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $createStock = true;
        }
        return $createStock;
    }
}
