<?php 

require_once '../models/contact.php';

class ContactController {
    
    private $conn;

    function __construct(){
        $this->conn = new DatabaseConnection();
        $this->conn = $this->conn->startConnection();
    }

    public function store($name, $email, $message)
    {
        $sql = "INSERT INTO contact (name,email,message) VALUES (?,?,?)";

        $statement = $this->conn->prepare($sql);

        $statement->execute([$name,$email,$message]);

        header("Location: ../view/index.php");
    }

}
