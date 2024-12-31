<?php
// config/database.php

class Database {
    private $host = 'localhost'; 
    private $db_name = 'smartbike'; 
    private $username = 'smartbike'; 
    private $password = 'smartbike'; 
    public $conn;

    public function __construct() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "pgsql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }

    public function query($sql) {
        try {
            $stmt = $this->conn->prepare($sql);  
            $stmt->execute();  
            return $stmt;  
        } catch (PDOException $exception) {
            echo "Query error: " . $exception->getMessage();
        }
    }

   
    public function fetchAll($sql) {
        $stmt = $this->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Retourne un tableau associatif
    }
}
