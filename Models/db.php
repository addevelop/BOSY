<?php


class Database
{
    public static function connect()
    {
        $db = new PDO("mysql:host=127.0.0.1;dbname=ebyso", "root", "");
        return $db;
    }
}
