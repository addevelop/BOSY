<?php
function isExist($string)
{
    if (isset($string)) {
        return $string;
    } else {
        return "";
    }
}
