<?php
require_once("Models/Basket.php");
require_once("Controllers/commons/connectController.php");
require_once("Models/SneakersClass.php");

require_once("Models/db.php");
class CreateOrder
{
    public $iduser;
    public $db;
    public $product;
    public $numero;
    public $created_at;
    public $code;
    public $percentpromo;

    public function __construct()
    {
        $this->iduser = connect::getId();
        $this->db = Database::connect();
        $this->product = $this->getAllProductOnBasketUser();
        $this->code = NULL;
        $this->percentpromo = 0;
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
    public function create($delivery, $promo)
    {
        if (!empty($promo)) {
            $this->code = $this->checkPromoExist($promo);
        }
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
                if ($this->createOrder($delivery)) {
                    $error = "create order";
                    $create = true;
                } else {
                    $error = "create order no";
                }


                break;
        }

        return $create;
    }

    public function checkPromoExist($promo)
    {
        $code = NULL;
        $stmt = $this->db->prepare("SELECT * FROM promo WHERE code = :code");
        $stmt->bindParam(":code", $promo, PDO::PARAM_STR);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $code = $stmt->fetch();
            }
        }
        return $code;
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

    public function createOrder($delivery)
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
        if ($this->copyBasket()) {
            $createdOrder = true;
            $date = date("Y-m-d");
            $idstatusorder = 1;
            $basket = new Basket();
            $total = $basket->getTotalByNum($this->numero);
            $code = $this->code != NULL ? $this->code["code"] : $this->code;
            $promo = $this->code != NULL ? $this->code["promo"] : $this->code;
            $total = $this->code != NULL ? $total["total"] / 100 * (100 - $this->code["promo"]) : $total["total"];
            $stmt = $this->db->prepare("INSERT INTO orders(numero, created_at, ID_user, status, delivery, total, promo, percent) VALUES(:numero, :created_at, :iduser, :idstatusorder, :delivery, :total, :code, :percent)");
            $stmt->bindParam(":numero", $this->numero, PDO::PARAM_STR);
            $stmt->bindParam(":created_at", $date, PDO::PARAM_STR);
            $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
            $stmt->bindParam(":idstatusorder", $idstatusorder, PDO::PARAM_INT);
            $stmt->bindParam(":delivery", $delivery, PDO::PARAM_INT);
            $stmt->bindParam(":total", $total, PDO::PARAM_STR);
            $stmt->bindParam(":code", $code, PDO::PARAM_STR);
            $stmt->bindParam(":percent", $promo, PDO::PARAM_INT);
            if ($stmt->execute()) {
                $createdOrder = true;
            }
        }

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

    public function copyBasket()
    {
        $copy = true;
        $basket = new Basket();
        $allBasket = $basket->getBasket();

        foreach ($allBasket as $sneaker) {
            if ($this->addOnBasketOrder($sneaker) == false) {
                $copy = false;
            }
            if ($this->updateStock($sneaker) == false) {
                $copy = false;
            }
            if ($basket->cleanBasket() == false) {
                $copy = false;
            }
        }
        return $copy;
    }

    public function addOnBasketOrder($sneaker)
    {
        $addOnbasketOrder = false;
        $createdat = date("Y-m-d");
        $stmt = $this->db->prepare("INSERT INTO basket_order(numero, ID_product, title, price, quantity, ID_user, created_at) VALUES(:numero, :idproduct, :title, :price, :quantity, :iduser, :createdat)");
        $stmt->bindParam(":numero", $this->numero, PDO::PARAM_STR);
        $stmt->bindParam(":idproduct", $sneaker["ID_product"], PDO::PARAM_INT);
        $stmt->bindParam(":title", $sneaker["title"], PDO::PARAM_STR);
        $stmt->bindParam(":price", $sneaker["price"], PDO::PARAM_STR);
        $stmt->bindParam(":quantity", $sneaker["quantity"], PDO::PARAM_INT);
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        $stmt->bindParam(":createdat", $createdat, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $addOnBasketOrder = true;
        }
        return $addOnBasketOrder;
    }

    public function updateStock($sneaker)
    {
        $update = false;
        $sneakerClass = new Sneakers();
        $snekearById = $sneakerClass->getSneaker($sneaker["ID_product"]);
        $quantity = $snekearById["stock"] - $sneaker["quantity"];
        $stmt = $this->db->prepare("UPDATE products SET stock = :quantity WHERE ID_product = :idproduct");
        $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);
        $stmt->bindParam(":idproduct", $sneaker["ID_product"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            $update = true;
        }

        return $update;
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
