<?php
require_once("Controllers/commons/connectController.php");
require_once("Models/db.php");
class CreateOrder
{
    public $iduser;
    public $db;
    public $product;
    public $numero;
    public $created_at;

    public function __construct()
    {
        $this->iduser = connect::getId();
        $this->db = Database::connect();
        $this->product = $this->getAllProductOnBasketUser();
    }

    public function getAllProductOnBasketUser()
    {
        $stmt = $this->db->prepare("SELECT * FROM basket WHERE ID_user = :iduser");
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function numberStockProduct($sneaker)
    {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE ID_product = :sneaker");
        $stmt->bindParam(":sneaker", $sneaker, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function create($delivery)
    {
        $create = false;
        $error = "";
        switch (false) {
            case $this->stockProduct():
                $error = "problème de stock";
                break;
            case $this->addressDelivery():
                $error = "problème de adresse";
                break;
            case $this->delivery($delivery):
                $error = "problème de type";
                break;
            default:
                if ($this->createOrder()) {
                    $error = "create order";
                    $create = true;
                } else {
                    $error = "create order no";
                }


                break;
        }


        return $error;
    }

    public function stockProduct()
    {
        $stock = true;
        foreach ($this->product as $product) {
            if ($this->numberStockProduct($product["ID_product"]) < $product["quantity"]) {
                $stock = false;
            }
        }
        return $stock;
    }

    public function addressDelivery()
    {
        $address = false;
        $stmt = $this->db->prepare("SELECT * FROM address WHERE ID_user = :iduser");
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $address = $stmt->rowCount() > 0 ? true : false;
        }
        return $address;
    }

    public function delivery($delivery)
    {
        $delivred = false;
        $stmt = $this->db->prepare("SELECT * FROM delivred");
        $stmt->execute();
        $fetch = $stmt->fetchAll();
        foreach ($fetch as $delivredElement) {
            if ($delivredElement["delivred"] == $delivery) {
                $delivred = true;
            }
        }
        return $delivred;
    }

    public function createOrder()
    {
        $count = 0;
        $createdOrder = false;
        while ($this->checkNumero() > 0) {
            if ($count > 10) {
                return $createdOrder;
                exit;
            }
            $count = $count + 1;
        }
        $createdOrder = true;
        $date = date("Y-m-d");
        $idstatusorder = 1;
        $stmt = $this->db->prepare("INSERT INTO orders(numero, created_at, ID_user, ID_status_order) VALUES(:numero, :created_at, :iduser, :idstatusorder");
        $stmt->bindParam(":numero", $this->numero, PDO::PARAM_STR);
        $stmt->bindParam(":created_at", $date, PDO::PARAM_STR);
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        $stmt->bindParam(":idstatusorder", $idstatusorder, PDO::PARAM_INT);
        $stmt->execute();

        return $createdOrder;
    }

    public function checkNumero()
    {
        $this->numero = $this->getRandom();
        $stmt  = $this->db->prepare("SELECT * FROM orders WHERE numero = :numero");
        $stmt->bindParam(":numero", $this->numero, PDO::PARAM_STR);
        $stmt->execute();
        $number = $stmt->rowCount();
        return $number;
    }

    public function getRandom()
    {
        $num = "";
        for ($i = 0; $i < 10; $i++) {
            $num .= random_int(0, 9);
        }
        return $num;
    }
}
