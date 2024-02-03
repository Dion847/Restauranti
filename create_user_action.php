<?php
session_start();
if (!isset($_SESSION['session_token']) || !isset($_SESSION['user_email']) || !$_SESSION['is_admin']) {
    // Redirect to the login page or display an error message
    header("Location: ../login.php");
    exit();
}

require_once '../controller/userController.php';

$name = $_POST['name'];
$username = $_POST['username'];
$email= $_POST['email'];
$isAdmin= $_POST['is_admin'] ?? 0;
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$userController = new UserController();

if ($userController->store($name, $username, $email, $isAdmin, $password)) {
    header("Location: ../view/dashboard/users.php");
    exit();
} else {
    echo "Login failed. Please try again.";
}
