<?
if (!session_start()) {
    session_start();
}
require_once("db.php");
require_once("../../Controllers/commons/connectController.php");
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
            $this->updateAddress();
        }
    }

    public function updateAddress()
    {
        $updateAddress = false;
        $stmt = $this->db->prepare("UPDATE FROM address SET title = :title, address = :address, zip_code = :zipcode, description = :description WHERE ID_user = :iduser");
        $stmt->bindParam(":title", $this->title, PDO::PARAM_STR);
        $stmt->bindParam(":address", $this->address, PDO::PARAM_STR);
        $stmt->bindParam(":zipcode", $this->zip_code, PDO::PARAM_INT);
        $stmt->bindParam(":description", $this->description, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $updateAddress = true;
        }
        return $update
    }
}
