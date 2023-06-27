<?php
require_once("Controllers/commons/connectController.php");
require_once("Models/db.php");
class Costumers
{
    private $iduser;
    private $db;

    public function __construct()
    {
        $this->iduser = connect::getId();
        $this->db = Database::connect();
    }

    public function getAddressById()
    {
        $getaddress = false;
        $stmt = $this->db->prepare("SELECT * FROM users INNER JOIN address ON users.ID_user = address.ID_user WHERE users.ID_user = :iduser");
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $getaddress = $stmt->fetch();
            }
        }
        return $getaddress;
    }

    public function getInfoById()
    {
        $infos = false;
        $stmt = $this->db->prepare("SELECT * FROM users WHERE ID_user = :iduser");
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_STR);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $infos = $stmt->fetch();
            }
        }
        return $infos;
    }
}
