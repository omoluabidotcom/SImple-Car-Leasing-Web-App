<?php

class Database {

    // database connection credentials
    private $host = 'localhost';
    private $user = 'root';
    private $db = 'dbb_wootcars';
    private $pass = '';
    private $connection;

    // db connection method
    public function connect() {

        $this->connection = null;

        $this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->db, $this->user, $this->pass);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // returning connection
        return $this->connection;
        
    }
}

?>