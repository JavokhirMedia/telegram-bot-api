<?php

namespace App\JavokhirMedia\Model\Helpers;

use App\JavokhirMedia\Model\mysql;

class Language
{
    public static function set($id, $lang)
    {
        return (new mysql)->query("UPDATE `users` SET `language` = '" . $lang . "' WHERE `user_id` = '" . $id . "'");
    }

    public static function get($id)
    {
        $query = "SELECT * FROM `users` WHERE `user_id` = '" . $id . "'";
        return (new mysql)->getDataFromOneColumn($query, "language");
    }
}