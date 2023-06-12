<?php
require_once("basketController.php");

if (isset($_POST["type"]) && $_POST["type"] == "direct") {
    echo $_POST["sneaker"];
    $add = "false";
    $basket = new basketController();

    if ($basket->add($_POST["sneaker"], $_POST["quantity"])) {
        $add = "true";
    }
    echo "valid";
    exit;
}
