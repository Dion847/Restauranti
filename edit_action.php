<?php
session_start();
if (!isset($_SESSION['session_token']) || !isset($_SESSION['user_email'])) {
    // Redirect to the login page or display an error message
    header("Location: ../login.php");
    exit();
} 

require_once '../controller/articleController.php';

$articleId = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$image = $_FILES["image"];

if($image["name"] == "")
{
    $image = false;
}
$articleController = new ArticleController();

if ($articleController->update($articleId, $title, $description, $image)) {
    header("Location: ../view/dashboard/index.php");
    exit();
} else {
    echo "Login failed. Please try again.";
}
