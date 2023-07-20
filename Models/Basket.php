<?php
require_once("db.php");
if (file_exists("Controllers/commons/connectController.php")) {
    require_once("Controllers/commons/connectController.php");
} else {
    require_once("../../Controllers/commons/connectController.php");
}
class Basket
{
    private $db;
    public $sneaker;
    public $iduser;
    public $size;
    public $quantity;
    public $type;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->iduser = Connect::getId();
    }
    //add new product on basket
    public function addOnBasket($sneaker, $quantity, $size, $type)
    {
        $this->type = $type;
        $this->sneaker = $sneaker;
        $this->quantity = $quantity;
        $this->size = $size;
        $addOnBasket = false;
        if ($this->ifProductIsOnBasket()) {
            if ($this->quantity <= 0) {
                $addOnBasket = $this->deleteBasketProduct();
            } else {
                $addOnBasket = $this->updateBasketProduct();
            }
        } else {
            $addOnBasket = $this->addOnBasketFirst();
        }
        return $addOnBasket;
    }

    //if product exist on the basket user
    public function ifProductIsOnBasket()
    {
        $addOnBasket = false;
        $stmt = $this->db->prepare("SELECT * FROM basket WHERE ID_user = :iduser AND ID_product = :idproduct AND ID_stock = :stock");
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        $stmt->bindParam(":idproduct", $this->sneaker, PDO::PARAM_INT);
        $stmt->bindParam(":stock", $this->size, PDO::PARAM_INT);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {

                $addOnBasket = true;
            }
        }



        return $addOnBasket;
    }
    public function addOnBasketFirst()
    {
        $addOnBasketFirst = false;
        if ($this->checkStockProducts() > $this->quantity) {
            $stmt = $this->db->prepare("INSERT INTO basket(ID_product, ID_user, quantity, ID_stock) VALUES(:idproduct, :iduser, :quantity, :size)");
            $stmt->bindParam(":idproduct", $this->sneaker, PDO::PARAM_INT);
            $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
            $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_INT);
            $stmt->bindParam(":size", $this->size, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $addOnBasketFirst = true;
            }
        }


        return $addOnBasketFirst;
    }
    //if product exist in the basket user update
    public function updateBasketProduct()
    {
        $update = false;
        $quantityCurrent = 0;
        if ($this->type == "add") {
            $quantityCurrent = $this->getNumberOfProductOnBasket();

            if ($quantityCurrent) {
                $this->quantity = $this->quantity + $quantityCurrent;
                if ($this->quantity <= $this->checkStockProducts()) {
                    $stmt = $this->db->prepare("UPDATE basket SET quantity = :quantity WHERE ID_user = :iduser AND ID_product = :idproduct AND ID_stock = :stock");
                    $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_INT);
                    $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
                    $stmt->bindParam(":idproduct", $this->sneaker, PDO::PARAM_INT);
                    $stmt->bindParam(":stock", $this->size, PDO::PARAM_INT);

                    if ($stmt->execute()) {
                        $update = true;
                    }
                }
            }
        } else if ($this->type == "change") {
            if ($this->changeQuantityProduct()) {
                $update = true;
            }
        }


        return $update;
    }

    public function changeQuantityProduct()
    {
        $changeQuantityProduct = false;
        $stmt = $this->db->prepare("UPDATE basket SET quantity = :quantity WHERE ID_user = :iduser AND ID_product = :sneaker AND ID_stock = :stock");
        $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_INT);
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        $stmt->bindParam(":sneaker", $this->sneaker, PDO::PARAM_INT);
        $stmt->bindParam(":stock", $this->size, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $changeQuantityProduct = true;
        }
        return $changeQuantityProduct;
    }

    //get all product on basket
    public function getNumberBasket()
    {

        $valueQuantity = 0;
        $stmt = $this->db->prepare("SELECT SUM(quantity) as 'quantity' FROM basket WHERE ID_user = :iduser GROUP BY ID_user");
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $fetch = $stmt->fetch();
            if ($stmt->rowCount() > 0) {
                $valueQuantity = $fetch["quantity"];
            }
        }
        return $valueQuantity;
    }


    //get number at product on basket
    public function getNumberOfProductOnBasket()
    {
        $quantityRequest = false;
        $stmt = $this->db->prepare("SELECT * FROM basket WHERE ID_product = :idproduct AND ID_user = :iduser AND ID_stock = :stock");
        $stmt->bindParam(":idproduct", $this->sneaker, PDO::PARAM_INT);
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        $stmt->bindParam(":stock", $this->size, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $fetch = $stmt->fetch();
            $quantityRequest = $fetch["quantity"] > 0 ? $fetch["quantity"] : $quantityRequest;
        }
        return $quantityRequest;
    }

    //get products on the basket
    public function getBasket()
    {
        $iduser = connect::getId();
        $basket = false;
        $stmt = $this->db->prepare("SELECT *, (basket.quantity * products.price) as 'total' FROM basket INNER JOIN products ON basket.ID_product = products.ID_product INNER JOIN images ON products.ID_product = images.ID_product INNER JOIN stock ON basket.ID_stock = stock.ID_stock WHERE ID_user = :iduser GROUP BY stock.ID_stock");
        $stmt->bindParam(":iduser", $iduser, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $basket = $stmt->fetchAll();
        }

        return $basket;
    }

    public function checkStockProducts()
    {

        $basket = false;
        $stmt = $this->db->prepare("SELECT * FROM stock WHERE ID_product = :idproduct AND ID_stock = :stock");
        $stmt->bindParam(":idproduct", $this->sneaker, PDO::PARAM_INT);
        $stmt->bindParam(":stock", $this->size, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $basket = $stmt->fetch();
        }

        return $basket["stock"];
    }
    public function getTotal()
    {
        $total = false;
        $stmt = $this->db->prepare("SELECT SUM(basket.quantity * products.price) as 'total' FROM basket INNER JOIN products ON basket.ID_product = products.ID_product WHERE basket.ID_user = :iduser GROUP BY basket.ID_user");
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $total = $stmt->fetch();
            }
        }
        return $total;
    }

    public function deleteBasketProduct()
    {
        $delete = false;
        $stmt = $this->db->prepare("DELETE FROM basket WHERE ID_user = :iduser AND ID_product = :idproduct AND ID_stock = :stock");
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        $stmt->bindParam(":idproduct", $this->sneaker, PDO::PARAM_INT);
        $stmt->bindParam(":stock", $this->size, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $delete = true;
        }

        return $delete;
    }


    public function cleanBasket()
    {
        $cleanBasket = false;
        $stmt = $this->db->prepare("DELETE FROM basket WHERE ID_user = :iduser");
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $cleanBasket = true;
        }
        return $cleanBasket;
    }

    public function getTotalByNum($num)
    {
        $getTotalByNum = false;
        $stmt = $this->db->prepare("SELECT SUM(quantity * price) as 'total' FROM basket_order WHERE numero = :numorder");
        $stmt->bindParam(":numorder", $num, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $getTotalByNum = $stmt->fetch();
        }
        return $getTotalByNum;
    }
}
