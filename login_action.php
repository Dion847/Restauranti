<?php 

//require_once 'User.php';
require_once '../controller/userController.php';

$email = $_POST['email'];
$password = $_POST['password'];

$userController = new UserController();

if ($userController->login($email, $password)) {
    header("Location: ../view/dashboard/index.php");
    exit();
} else {
    echo "Login failed. Please try again.";
}
