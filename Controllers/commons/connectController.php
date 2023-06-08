<?php

function isConnect()
{
    $isConnect = false;
    if (isset($_SESSION["connect"])) {
        $isConnect = true;
    }
    return $isConnect;
}

function getNames()
{
    $getNames = "";
    if (isset($_SESSION["connect"])) {
        $getNames = $_SESSION["connect"]["firstname"] . " " . $_SESSION["connect"]["lastname"];
    }
    return $getNames;
}
