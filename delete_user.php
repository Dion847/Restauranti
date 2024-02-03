<?php
session_start();
if (!isset($_SESSION['session_token']) || !isset($_SESSION['user_email']) || !$_SESSION['is_admin']) {
    // Redirect to the login page or display an error message
    header("Location: ../login.php");
    exit();
}

require_once '../controller/userController.php';


$userController = new userController();


$id = $_GET['id'];

if ($userController->delete($id)) {
    alert("Successfully Deleted");
} else {
    echo "Login failed. Please try again.";
}
