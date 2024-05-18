<?php
class User
{
    private $conn;

    public function __construct($db_conn)
    {
        $this->conn = $db_conn;
    }

    public function register($username, $password)
    {
    }

    public function login($username, $password)
    {
    }
}
?>