<?php

function backCreateProduct()
{
    require_once("Controllers/products/createPorductController.php");

    if (createProductController::create()) {
        $message = "Le produit a bien été créé";
    } else {
        $message = "problème";
    }

    getMessage($message);
}
