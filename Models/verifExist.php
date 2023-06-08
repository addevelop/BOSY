<?php
require_once("db.php");

class verifExist
{
    private $email;
    private $mobile_phone;
    private $password;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
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



    public function emailExist()
    {

        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam("email", $this->email, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count > 0 ? false : true;
    }

    
}
