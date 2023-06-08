<?php
require_once("db.php");
class userClass
{
    public $array = [];
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $activate;
    public $mobile_phone;
    public $administration;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getUser($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users INNER JOIN administration ON users.ID_administration = administration.ID_administration  WHERE users.email = :email");
        $stmt->bindParam("email", $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch();
        $this->id = $user["ID_user"];
        $this->firstname = $user["firstname"];
        $this->lastname = $user["lastname"];
        $this->email = $user["email"];
        $this->activate = $user["activate"];
        $this->mobile_phone = $user["mobile_phone"];
        $this->administration = $user["administration"];

        return [
            "id" => $this->id,
            "firstname" =>  $this->firstname,
            "lastname" => $this->lastname,
            "email" => $this->email,
            "activate" => $this->activate,
            "mobile_phone" => $this->mobile_phone,
            "administration" => $this->administration


        ];
    }
}
