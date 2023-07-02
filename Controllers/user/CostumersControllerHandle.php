<?php
require_once("../../Models/Ajax/Costumers.php");
if (isset($_POST['addressExist'])) {
    if (isset($_POST["title"]) && isset($_POST["address"]) && isset($_POST["zip_code"]) && isset($_POST["city"]) && isset($_POST["description"])) {
        $address = new CostumersClass();
        $address->checkAddress($_POST["title"], $_POST["address"], $_POST["zip_code"], $_POST["city"], $_POST["description"]);
    }
}

if (isset($_POST['updateAddress'])) {
}
