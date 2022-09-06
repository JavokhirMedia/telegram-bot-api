<?php

namespace App\JavokhirMedia\Model\Migrations;

use App\JavokhirMedia\Model\mysql;

class Users extends mysql
{

    public function __construct()
    {
        parent::__construct();
        $this->query
        (
            "CREATE TABLE `users`"
        );
    }

}