<?php
require_once("Models/db.php");
require_once("Controllers/commons/connectController.php");
class getOrder
{
    public $iduser;
    public $db;

    public function __construct()
    {
        $this->iduser = connect::getId();
        $this->db = Database::connect();
    }

    public function getLastOrder()
    {
        $getOrder = false;
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE ID_user = :iduser ORDER BY ID_order DESC LIMIT 1");
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $order = $stmt->fetch();
            $getOrder = $this->getAllProductByNumero($order["numero"]);
        }
        return $getOrder;
    }

    public function getAllProductByNumero($numOrder)
    {
        $getAllProductByNumero = false;
        $stmt = $this->db->prepare("SELECT * FROM orders INNER JOIN basket_order ON orders.numero = basket_order.numero WHERE orders.ID_user = :iduser AND orders.numero = :numorder");
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        $stmt->bindParam(":numorder", $numOrder, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $getAllProductByNumero = $stmt->fetchAll();
        }
        return $getAllProductByNumero;
    }

    public function getNumLastOrder()
    {
        $getNumLastOrder = false;
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE ID_user = :iduser ORDER BY ID_order DESC LIMIT 1");
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        if ($stmt->execute()) {

            $getNumLastOrder = $stmt->fetch();
        }

        return $getNumLastOrder;
    }

    public function getOrdersById()
    {
        $getOrdersById = false;
        $stmt = $this->db->prepare("SELECT orders.ID_order, orders.numero, orders.created_at, status_orders.title as 'status_orders', images.path, orders.total, SUM(basket_order.quantity) as 'quantity' FROM orders INNER JOIN basket_order ON orders.numero = basket_order.numero INNER JOIN images ON basket_order.ID_product = images.ID_product INNER JOIN status_orders ON orders.status = status_orders.status WHERE orders.ID_user = :iduser GROUP BY basket_order.numero ORDER BY orders.ID_order DESC");
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $getOrdersById = $stmt->fetchAll();
        }
        return $getOrdersById;
    }

    public function getOrderByNum($num)
    {
        $getOrderByNum = false;
        $stmt = $this->db->prepare("SELECT orders.ID_order, orders.numero as 'numero', orders.created_at, basket_order.title, orders.ID_user, images.path, status_orders.title as 'status_orders', basket_order.quantity, orders.total, basket_order.price as 'price' FROM orders INNER JOIN basket_order ON orders.numero = basket_order.numero INNER JOIN images ON basket_order.ID_product = images.ID_product INNER JOIN status_orders ON orders.status = status_orders.status WHERE orders.ID_user = :iduser AND orders.numero = :numorder");
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        $stmt->bindParam(":numorder", $num, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $getOrderByNum = $stmt->fetchAll();
        }
        return $getOrderByNum;
    }

    public function getInfosByNum($num)
    {
        $getInfosByNum = false;
        $stmt = $this->db->prepare("SELECT * FROM orders INNER JOIN status_orders ON orders.status = status_orders.status WHERE orders.ID_user = :iduser AND orders.numero = :numorder");
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        $stmt->bindParam(":numorder", $num, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $getInfosByNum = $stmt->fetch();
        }
        return $getInfosByNum;
    }
}
