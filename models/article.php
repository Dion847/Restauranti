<?php

require_once __DIR__ . '/../database/databaseConnection.php';

class Article{

    private $conn;

    function __construct(){
        $this->conn = new DatabaseConnection();
        $this->conn = $this->conn->startConnection();
    }

    function insertArticle($article){

        $conn = $this->connection;

        $id = $user->getId();
        $name = $user->getName();
        $surname = $user->getSurname();
        $email = $user->getEmail();
        $username = $user->getUsername();
        $password = $user->getPassword();

        $sql = "INSERT INTO user (id,name,surname,email,username,password) VALUES (?,?,?,?,?,?)";

        $statement = $conn->prepare($sql);

        $statement->execute([$id,$name,$surname,$email,$username,$password]);

        echo "<script> alert('User has been inserted successfuly!'); </script>";

    }

    function getArticles() {
        $sql = "SELECT * FROM articles";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($articles) {
            return $articles;
        } 
        return [];
    }
    
    function getArticle($id){
        $sql = "SELECT * FROM articles WHERE id='$id'";

        $statement = $this->conn->query($sql);
        $article = $statement->fetch();

        return $article;
    }
}

?>