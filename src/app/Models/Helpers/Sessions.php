<?php

namespace App\JavokhirMedia\Model\Helpers;

use App\JavokhirMedia\Model\mysql;

class Sessions
{

    public static function set($id, $session)
    {
        return (new mysql)->query("UPDATE `users` SET `session` = '" . $session . "' WHERE `user_id` = '" . $id . "'");
    }

    public static function get($id): string
    {
        $query = "SELECT * FROM `users` WHERE `user_id` = " . $id;
        return (new mysql)->getDataFromOneColumn($query, "session");
    }

    public static function delete($id)
    {
        (new mysql)->query("UPDATE `users` SET `session` = '' WHERE `user_id` = '" . $id . "'");
    }

}