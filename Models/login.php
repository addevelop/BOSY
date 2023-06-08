<?php
require_once("db.php");
require_once("userClass.php");
class Login
{
    private $email;
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
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function login()
    {
        $connect = "no connect";
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $stmt->bindParam("email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam("password", $this->password, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            $connect = "connect";
            $user = new userClass();

            $_SESSION["connect"] = $user->getUser($this->email);
        }

        return $connect;
    }
}
