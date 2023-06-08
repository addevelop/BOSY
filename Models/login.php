<?php
require_once("users.php");
class Login extends Users
{
    private $email;
    private $password;
    private $db;

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :emai AND password = :password");
        $stmt->bindParam("email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam("password", $this->password, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            return true;
        } else {
            return false;
        }
    }
}
