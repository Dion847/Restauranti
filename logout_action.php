<?php
session_start();
if (!isset($_SESSION['session_token']) || !isset($_SESSION['user_email'])) {
    // Redirect to the login page or display an error message
    header("Location: ../login.php");
    exit();
} 

require_once '../controller/userController.php';

$userController = new UserController();

$userController->logout();
?>