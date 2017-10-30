<?php
namespace Huifang\Web\Http\Controllers;

class Resource
{
    private static $params = array();

    public static function getAllParams()
    {
        return self::$params;
    }
}