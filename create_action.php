<?php 

require_once '../controller/articleController.php';

$title = $_POST['title'];
$description = $_POST['description'];
$image = $_FILES["image"];

$articleController = new ArticleController();

if ($articleController->store($title, $description, $image)) {
    alert("Successfully Registred");
    // header("Location: ../view/dashboard/index.php");
    // exit();
} else {
    echo "Login failed. Please try again.";
}
