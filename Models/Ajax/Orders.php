<?php
if(!session_start())
{
    session_start();
}

require_once("../commons/connectController.php");
require_once("../../Models/db.php");
class Orders
{
    public $iduser;
    public $db;
    
    public function __construct()
    {
        $this->iduser = connect::getId();
        $this->db = Database::connect();
    }
    
}