<?php

require_once("Controllers/commons/connectController.php");
require_once("Models/db.php");
class Delivred
{

    public $iduser;
    public $db;

    public function __construct()
    {
        $this->iduser = connect::getId();
        $this->db = Database::connect();
    }

    public function getWay()
    {
        $getWay = false;
        $stmt = $this->db->query("SELECT * FROM delivred");
        if ($stmt->execute()) {
            $fetch = $stmt->fetchAll();
            $getWay = $fetch;
        }
        return $getWay;
    }
}
