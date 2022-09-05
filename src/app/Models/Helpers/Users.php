<?php

namespace App\JavokhirMedia\Model\Helpers;

use App\JavokhirMedia\Model\mysql;

class Users
{

    public static function set($id, $status)
    {
        return (new mysql)->query(
            "INSERT INTO `users` (`user_id`, `status`) VALUES (" . $id . ", " . $status . ")"
        );
    }

}