<?php

class connect
{
    public static function isConnect()
    {
        $isConnect = false;
        if (isset($_SESSION["connect"])) {
            $isConnect = true;
        }
        return $isConnect;
    }

    public static function getNames()
    {
        $getNames = "";
        if (self::isConnect()) {
            $getNames = $_SESSION["connect"]["firstname"] . " " . $_SESSION["connect"]["lastname"];
        }
        return $getNames;
    }

    public static function getId()
    {
        $getId = 0;
        if (self::isConnect()) {
            $getId = $_SESSION["connect"]["id"];
        }
        return $getId;
    }
}
