<?php
session_start();

if (!isset($_SESSION['session_token']) || !isset($_SESSION['user_email'])) {
    // Redirect to the login page or display an error message
    header("Location: ../login.php");
    exit();
}


require_once '../../models/article.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .crud-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .button {
            display: inline-block;
            padding: 10px 15px;
            text-decoration: none;
            background-color: #007BFF;
            color: #fff;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <form action="../../actions/logout_action.php" method="post">
        <button type="submit" style="background: red;border: 1px solid white;padding: 5px;font-weight: bold;" >Logout</button>
    </form>
    <a href="../../view/dashboard/create.php">Create</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Image</th>
            <th colspan="2">Actions</th>
        </tr>

        <?php 
        include_once '../../models/article.php';

        $article = new Article();

        $articles = $article->getArticles();

        foreach($articles as $article){
            if($_SESSION['is_admin']){
                echo 
                "
                <tr>
                        <td>$article[title]</td>
                        <td>$article[description] </td>
                        <td><img style='width:150px;' src='../../$article[image]' /> </td>
                        <td><a href='edit.php?id=$article[id]'>Edit</a> </td>
                        <td><a onclick='return confirm(\"Are you sure you want to send the data\")' href='../../actions/delete_article.php?id=$article[id]&path=$article[image]'>Delete</a></td>
                </tr>
                ";
            }else{
                echo 
                "
                <tr>
                        <td>$article[title]</td>
                        <td>$article[description] </td>
                        <td><img style='width:150px;' src='../../$article[image]' /> </td>
                        <td><a href='edit.php?id=$article[id]'>Edit</a> </td>
                </tr>
                ";
            }
        }
    ?>
    </table>
</body>
</html>