<?php
require_once("Models/users.php");
class getUsers
{
    public static function getUserbyId($id)
    {
        $getUserById = new Users($id);
        return $getUserById->getUserById();
    }
}
