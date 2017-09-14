<?php namespace App\Http\Controllers;

class Resource
{
    private static $params = array();

    public static function getAllParams()
    {
        return self::$params;
    }
}