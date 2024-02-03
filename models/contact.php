<?php

require_once __DIR__ . '/../database/databaseConnection.php';

class Contact{

    private $conn;

    function __construct(){
        $this->conn = new DatabaseConnection();
        $this->conn = $this->conn->startConnection();
    }

    function getContacts() {
        $sql = "SELECT * FROM contact";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($contacts) {
            return $contacts;
        } 
        return [];
    }
}

?>