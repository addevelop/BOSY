<?php
require_once("Models/users.php");
require_once("Controllers/commons/VerifController.php");
require_once("Models/login.php");




// if (isset($_POST["inscription"])) {
//     $error = verifInscription($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["mobile_phone"], $_POST["password"], $_POST["password1"]);
// }

class usersController
{



    public function save()
    {
        if (isset($_POST)) {
            $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : false;
            $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : false;
            $email = isset($_POST["email"]) ? $_POST["email"] : false;
            $mobile_phone = isset($_POST["mobile_phone"]) ? $_POST["mobile_phone"] : false;
            $password = isset($_POST["password"]) ? $_POST["password"] : false;
            $password1 = isset($_POST["password1"]) ? $_POST["password1"] : false;
            if ($firstname && $lastname && $email && $mobile_phone && $password && $password1) {
                switch (false) {
                    case Verif::length($firstname, 2, 100):
                        $error = "votre Prénom doit contenir entre 1 et 101 charactères";
                        break;
                    case Verif::length($lastname, 2, 100):
                        $error = "votre Nom doit contenir entre 1 et 101 charactères";
                        break;
                    case Verif::email($email):
                        $error = "votre email n'est pas correct";
                        break;
                    case Verif::emailExist($email):
                        $error = "cet email existe déjà";
                        break;
                    case Verif::password($password, $password1):
                        $error = "votre mot de passe n'est pas correct";
                        break;
                    default:
                        $save = new Users();
                        $save->setfirstname($firstname);
                        $save->setLastname($lastname);
                        $save->setEmail($email);
                        $save->setMobilePhone($mobile_phone);
                        $save->setPassword($password);
                        if ($save->save()) {
                            $error = 1;
                        } else {
                            $error = "Problème";
                        }
                }
                return $error;
            }
            return "Veuillez remplir tout les champs";
        }
    }

    public function login()
    {
        $message = false;
        if (isset($_POST)) {
            $email = isset($_POST["email"]) ? $_POST["email"] : false;
            $password = isset($_POST["password"]) ? $_POST["password"] : false;

            if ($email && $password) {

                $login = new Login();
                $login->setEmail($email);
                $login->setPassword($password);
                if ($login->login()) {
                    $message = true;
                    $_SESSION["connect"] = $email;
                }
            }
        }
        return $message;
    }
}
