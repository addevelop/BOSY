<?php

class params
{
    public static function getParams($params, $name)
    {
        $value = false;
        foreach ($params as $param) {
            $currentParam = explode("=", $param);
            if ($currentParam[0] == $name) {
                $value = $currentParam[1];
            }
        }
        return $value;
    }
}
