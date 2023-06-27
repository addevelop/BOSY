<?php
require_once("basketController.php");

if (isset($_POST["type"]) && $_POST["type"] == "direct") {
    $add = "false";

    if (basketController::add($_POST["sneaker"], $_POST["quantity"])) {
        $add = "true";
    }
    exit;
}


