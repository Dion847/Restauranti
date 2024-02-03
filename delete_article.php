<?php
session_start();
if (!isset($_SESSION['session_token']) || !isset($_SESSION['user_email']) || !$_SESSION['is_admin']) {
    // Redirect to the login page or display an error message
    header("Location: ../login.php");
    exit();
} 

require_once '../controller/articleController.php';


$articleController = new articleController();


$id = $_GET['id'];
$imagePath = $_GET['path'];

if ($articleController->delete($id, $imagePath)) {
    alert("Successfully Deleted");
} else {
    echo "Login failed. Please try again.";
}
