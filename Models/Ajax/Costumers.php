<?php
if (!session_start()) {
    session_start();
}
require_once("../../Models/db.php");
require_once("../commons/connectController.php");
class CostumersClass
{
    public $iduser;
    public $db;
    public $title;
    public $address;
    public $zip_code;
    public $city;
    public $description;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->iduser = connect::getId();
    }

    public function checkAddress($title, $address, $zip_code, $city, $description)
    {
        echo "heu";
        $this->title = $title;
        $this->address = $address;
        $this->zip_code = $zip_code;
        $this->city = $city;
        $this->description = $description;
        $checkAddress = false;
        $stmt = $this->db->prepare("SELECT * FROM address WHERE ID_user = :iduser");
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $checkAddress = true;
            echo "update";

            $this->updateAddress();
        }
        else
        {
            echo "create";

            $this->createAddress();
        }
        echo "heu";
    }

    public function updateAddress()
    {
        $updateAddress = false;
        $stmt = $this->db->prepare("UPDATE address SET title = :title, address = :address, zip_code = :zipcode, city = :city, description = :description WHERE ID_user = :iduser");
        $stmt->bindParam(":title", $this->title, PDO::PARAM_STR);
        $stmt->bindParam(":address", $this->address, PDO::PARAM_STR);
        $stmt->bindParam(":zipcode", $this->zip_code, PDO::PARAM_INT);
        $stmt->bindParam(":city", $this->city, PDO::PARAM_STR);
        $stmt->bindParam(":description", $this->description, PDO::PARAM_STR);
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $updateAddress = true;
        }
        return $updateAddress;
    }

    public function createAddress()
    {
        $createAddress = false;
        $date = date("Y-m-d");
        $country = "France";
        $activate = 1;
        $stmt = $this->db->prepare("INSERT INTO address(title, address, zip_code, city, country, created_at, description, activate, ID_user) VALUES(:title, :address, :zipcode, :city, :country, :createdat, :description, :activate, :iduser)");
        $stmt->bindParam(":title", $this->title, PDO::PARAM_STR);
        $stmt->bindParam(":address", $this->address, PDO::PARAM_STR);
        $stmt->bindParam(":zipcode", $this->zip_code, PDO::PARAM_INT);
        $stmt->bindParam(":city", $this->city, PDO::PARAM_STR);
        $stmt->bindParam(":country", $country, PDO::PARAM_STR);
        $stmt->bindParam(":createdat", $date, PDO::PARAM_STR);
        $stmt->bindParam(":activate", $activate, PDO::PARAM_INT);
        $stmt->bindParam(":description", $this->description, PDO::PARAM_STR);
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $createAddress = true;
        }
        return $createAddress;
    }
}
