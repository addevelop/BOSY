<?php
require_once("db.php");
// require_once("Controllers/commons/connectController.php");
class Basket
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }
    //add new product on basket
    public function addOnBasket($sneaker, $quantity)
    {

        $iduser = connect::getId();
        $addOnBasket = false;
        if ($this->ifProductIsOnBasket($iduser, $sneaker)) {
            $addOnBasket = $this->updateBasketProduct($iduser, $sneaker, $quantity);
        } else {
            $stmt = $this->db->prepare("INSERT INTO basket(ID_product, ID_user, quantity) VALUES(:idproduct, :iduser, :quantity)");
            $stmt->bindParam(":idproduct", $sneaker, PDO::PARAM_INT);
            $stmt->bindParam(":iduser", $iduser, PDO::PARAM_INT);
            $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $addOnBasket = true;
            }
        }
        return $addOnBasket;
    }
    //if product exist on the basket user
    public function ifProductIsOnBasket($iduser, $sneaker)
    {
        $addOnBasket = false;
        $stmt = $this->db->prepare("SELECT * FROM basket WHERE ID_user = :iduser AND ID_product = :idproduct");
        $stmt->bindParam(":iduser", $iduser, PDO::PARAM_INT);
        $stmt->bindParam(":idproduct", $sneaker, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {

            $addOnBasket = true;
        }

        return $addOnBasket;
    }
    //if product exist in the basket user update
    public function updateBasketProduct($iduser, $sneaker, $quantity)
    {
        $update = false;
        $quantityCurrent = $this->getNumberOfProductOnBasket($iduser, $sneaker);
        $quantity = $quantity + $quantityCurrent;
        $stmt = $this->db->prepare("UPDATE basket SET quantity = :quantity WHERE ID_user = :iduser AND ID_product = :idproduct");
        $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);
        $stmt->bindParam(":iduser", $iduser, PDO::PARAM_INT);
        $stmt->bindParam(":idproduct", $sneaker, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $update = true;
        }
        return $update;
    }

    //get all product on basket
    public function getNumberBasket($id)
    {

        $quantity = 0;
        $iduser = $id;
        $stmt = $this->db->prepare("SELECT SUM(quantity) as 'quantity' FROM basket WHERE ID_user = :iduser GROUP BY ID_user");
        $stmt->bindParam(":iduser", $iduser, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $fetch = $stmt->fetch();
            $quantity = $fetch["quantity"];
        }
        return $quantity;
    }


    //get number at product on basket
    public function getNumberOfProductOnBasket($iduser, $sneaker)
    {
        $quantity = 0;
        $stmt = $this->db->prepare("SELECT * FROM basket WHERE ID_product = :idproduct AND ID_user = :iduser");
        $stmt->bindParam(":idproduct", $sneaker, PDO::PARAM_INT);
        $stmt->bindParam(":iduser", $iduser, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $fetch = $stmt->fetch();
            $quantity = $fetch["quantity"];
        }
        return $quantity;
    }

    //get products on the basket
    public function getBasket()
    {
        $iduser = connect::getId();
        $basket = false;
        $stmt = $this->db->prepare("SELECT *, (basket.quantity * products.price) as 'total' FROM basket INNER JOIN products ON basket.ID_product = products.ID_product INNER JOIN images ON products.ID_product = images.ID_product WHERE ID_user = :iduser");
        $stmt->bindParam(":iduser", $iduser, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $basket = $stmt->fetchAll();
        }

        return $basket;
    }

    public function checkStockProducts()
    {
        $basket = false;
        $stmt = $this->db->prepare("SELECT * FROM products WHERE ID_product = :idproduct");
        $stmt->bindParam(":idproduct", $sneaker, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $basket = $stmt->fetch();
        }

        return $basket;
    }
}
