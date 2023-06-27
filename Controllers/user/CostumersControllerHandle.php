<?php
require_once("../../Models/Ajax/Costumers.php");
if (isset($_POST['addressExist'])) {
    if (isset($_POST["title"]) && isset($_POST["address"]) && isset($_POST["zip_code"]) && isset($_POST["city"]) && isset($_POST["description"])) {
        $address = new CostumersClass();
        $address->updateAddress();
    }
    CostumersController::getAddressById();
}

if (isset($_POST['updateAddress'])) {
}
