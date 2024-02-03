<?php

require_once __DIR__ . '/../database/databaseConnection.php';

class User{

    private $conn;

    function __construct(){
        $this->conn = new DatabaseConnection();
        $this->conn = $this->conn->startConnection();
    }

    function getArticles() {
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($users) {
            return $users;
        } 
        return [];
    }

    function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        } 
        return false;
    }
}

?>