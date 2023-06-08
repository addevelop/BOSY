<?php
require_once("Models/verifExist.php");
abstract class Verif
{


    static function length($string, $min, $max)
    {

        return (strlen($string) < $max && strlen($string) > $min) == 1 ? true : false;
    }

    static function password($string, $string1)
    {
        if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!?@])[a-zA-Z\d!?@]{8,}$/", $string)) {
            if ($string == $string1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    static function email($string)
    {
        if (filter_var($string, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    static function emailExist($email)
    {
        $verifEmail = new verifExist();
        $verifEmail->setEmail($email);
        return $verifEmail->emailExist() ? true : false;
    }
}
