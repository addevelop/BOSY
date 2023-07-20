<?php

require_once("db.php");
require_once("Controllers/commons/connectController.php");

class Users
{
    private $firstname;
    private $lastname;
    private $email;
    private $mobile_phone;
    private $password;
    private $activate;
    private $administration;
    private $date;
    private $db;
    private $iduser;

    public function __construct($id = null)
    {
        $this->db = Database::connect();
        $this->setIduser($id);
    }



    public function setfirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setMobilePhone($mobile_phone)
    {
        $this->mobile_phone = $mobile_phone;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setIdUser($id)
    {
        $this->iduser = $id != null && connect::isAdmin() ? $id : connect::getId();
    }



    public function save()
    {
        $date = date("Y-m-d");
        $activate = 1;
        $administration = 1;

        $stmt = $this->db->prepare("INSERT INTO users(firstname, lastname, email, mobile_phone, password, activate, created_at, ID_administration) VALUES(:fn, :ln,:em,:mp,:pw,:act,:ca,:adm)");
        // $stmt->bindParam('sssssiis', $this->firstname, $this->lastname, $this->email, $this->mobile_phone, $this->password, $this->activate, $this->date, $this->administration);
        $stmt->bindParam(":fn", $this->firstname, PDO::PARAM_STR);
        $stmt->bindParam(":ln", $this->lastname, PDO::PARAM_STR);
        $stmt->bindParam(":em", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":mp", $this->mobile_phone, PDO::PARAM_STR);
        $stmt->bindParam(":pw", $this->password, PDO::PARAM_STR);
        $stmt->bindParam(":act", $activate, PDO::PARAM_INT);
        $stmt->bindParam(":ca", $date, PDO::PARAM_STR);
        $stmt->bindParam(":adm", $administration, PDO::PARAM_INT);


        $result = false;

        if ($stmt->execute()) {
            $resutlt = true;
        }

        return true;
    }

    public function getUserById()
    {
        $getUserById = false;
        $stmt = $this->db->prepare("SELECT * FROM users WHERE ID_user = :iduser");
        $stmt->bindParam(":iduser", $this->iduser, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $getUserById = $stmt->fetch();
        }

        return $getUserById;
    }
}
