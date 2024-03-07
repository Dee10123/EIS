<?php

class Database {
    private $host = "sql104.infinityfree.com";
    private $username = "if0_35298409";
    private $password = "EpxroSvacRaNcqV";
    private $dbname = "if0_35298409_wonderpets";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

?>