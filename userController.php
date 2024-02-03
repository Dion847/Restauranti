<?php 

require_once '../models/user.php';

class UserController {
    private $conn;

    function __construct(){
        $this->conn = new DatabaseConnection();
        $this->conn = $this->conn->startConnection();
    }

    public function login($email, $password) {
        session_start();
        $user = new User();
        $user = $user->getUserByEmail($email);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $session_token = bin2hex(random_bytes(16));
        $_SESSION['session_token'] = $session_token;
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['is_admin'] = $user['is_admin'] == 1;

        if ($user && password_verify($password, $user['password'])) {
            return true;
        }
        return false;
    }

    public function store($name, $username, $email, $isAdmin, $password)
    {
        $sql = "INSERT INTO users (name,username,email,password, is_admin) VALUES (?,?,?,?,?)";

        $statement = $this->conn->prepare($sql);

        $statement->execute([$name,$username,$email, $password, $isAdmin]);

        header("Location: ../view/dashboard/users.php");
    }

    public function logout() {
        session_start();

        $_SESSION = [];
        session_destroy();

        header("Location: ../view/login.php");
        exit();
    }

    function delete($id){
        $sql = "DELETE FROM users WHERE id=?";
        $statement = $this->conn->prepare($sql);
        $statement->execute([$id]);
        header("Location: ../view/dashboard/users.php");
    } 

    
}
