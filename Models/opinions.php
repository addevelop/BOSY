<?php
require_once("db.php");
class opinions
{
    public $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getOpinionsByIdProduct($idproduct)
    {
        $getOpinionsByIdProduct = false;
        $stmt = $this->db->prepare("SELECT *, opinions.created_at as 'created_atopinion' FROM opinions INNER JOIN users ON users.ID_user = opinions.ID_user WHERE ID_product = :idproduct ORDER BY ID_opinion DESC");
        $stmt->bindParam(":idproduct", $idproduct, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $getOpinionsByIdProduct = $stmt->fetchAll();
        }
        return $getOpinionsByIdProduct;
    }
    public function getAVGOpinionByIdProduct($idproduct)
    {
        $getAVGOpinionByIdProduct = false;
        $stmt = $this->db->prepare("SELECT AVG(number) as 'avg', COUNT(number) as 'count' FROM opinions WHERE ID_product = :idproduct GROUP BY ID_product");
        $stmt->bindParam(":idproduct", $idproduct, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $getAVGOpinionByIdProduct = $stmt->fetch();
        }
        return $getAVGOpinionByIdProduct;
    }
}
