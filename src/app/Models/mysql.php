<?php

namespace App\JavokhirMedia\Model;

class mysql
{

    public string $host;
    public string $username;
    public string $password;
    public string $name;

    public $connection;

    public function __construct()
    {
        $this->host = getenv('DATABASE_HOST');
        $this->username = getenv('DATABASE_USERNAME');
        $this->password = getenv('DATABASE_PASSWORD');
        $this->name = getenv('DATABASE_NAME');

        $this->connection = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->name
        );

        if (!$this->connection)
            echo mysqli_connect_errno() . ":" . mysqli_connect_error();
        else
            echo "Connection is successfully";
    }

    public function query($query)
    {
        return mysqli_query(
            $this->connection,
            $query
        );
    }

    public function fetchAssoc($query)
    {
        return mysqli_fetch_assoc($this->query($query));
    }

    public function fetchArray($query)
    {
        return mysqli_fetch_array($this->query($query));
    }

    public function getDataFromOneColumn($query, $row)
    {
        return $this->fetchAssoc($query)[$row];
    }

    public function deleteWithValue($row, $value, $table = 'users')
    {
        $query = "DELETE FROM `users` WHERE `" . $row . "` = '" . $value . "'";
        return (new mysql)->query($query);
    }

}