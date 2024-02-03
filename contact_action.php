<?php 

require_once '../controller/contactController.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$contactController = new ContactController();

if ($contactController->store($name, $email, $message)) {
    alert("Successfully Registred");
    // header("Location: ../view/dashboard/index.php");
    // exit();
} else {
    echo "Login failed. Please try again.";
}
