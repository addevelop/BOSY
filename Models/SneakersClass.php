<?php
require_once("db.php");

class Sneakers
{
    public $title;
    private $db;
    public function __construct()
    {

        $this->db = Database::connect();
    }
    public function getAllSneakers($title, $categorie, $limit, $page)
    {
        $nbProducts = $limit * $page;
        $stmt = $this->db->prepare("SELECT *, SUM(stock.stock) as 'stock' FROM products INNER JOIN images on images.ID_product = products.ID_product INNER JOIN stock ON products.ID_product = stock.ID_product INNER JOIN categories ON products.ID_categorie = categories.ID_categorie WHERE UPPER(products.title) LIKE UPPER(:title) AND UPPER(categories.categorie) LIKE UPPER(:categorie) GROUP BY products.ID_product limit :limit OFFSET :page");
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindParam(":page", $nbProducts, PDO::PARAM_INT);
        $stmt->bindParam(":categorie", $categorie, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getSneakerByIdStock($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM stock WHERE stock.ID_stock = :stock");
        $stmt->bindParam(":stock", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function getSneaker($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM products INNER JOIN images on images.ID_product = products.ID_product INNER JOIN stock ON products.ID_product = stock.ID_product WHERE products.ID_product = :id GROUP BY stock.size ORDER BY stock.size");
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getImagesByIdSneaker($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM images WHERE ID_product = :id");
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllSneakersCustom()
    {
        $stmt = $this->db->query("SELECT *, SUM(stock.stock) as 'stock' FROM products INNER JOIN images on images.ID_product = products.ID_product INNER JOIN stock ON products.ID_product = stock.ID_product WHERE products.ID_categorie = 1");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getNombreSneakers($title, $categorie)
    {
        $stmt = $this->db->prepare("SELECT *, SUM(stock.stock) as 'stock' FROM products INNER JOIN images on images.ID_product = products.ID_product INNER JOIN stock ON products.ID_product = stock.ID_product INNER JOIN categories ON products.ID_categorie = categories.ID_categorie WHERE products.title LIKE :title AND categories.categorie LIKE :categorie GROUP BY products.ID_product");
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":categorie", $categorie, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
