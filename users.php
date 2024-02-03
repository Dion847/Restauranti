<?php
session_start();
if (!isset($_SESSION['session_token']) || !isset($_SESSION['user_email'])) {
    // Redirect to the login page or display an error message
    header("Location: ../login.php");
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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
    <?php if($_SESSION['is_admin']){?>
        <a href="../../view/dashboard/create_user.php">Create</a>
    <?php }?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <?php if($_SESSION['is_admin']){?>
                <th colspan="2">Actions</th>
            <?php }?>
        </tr>

        <?php 
        include_once '../../models/user.php';

        $user = new User();

        $users = $user->getArticles();

        foreach($users as $user){
            $role = $user["is_admin"] == 1 ? 'Admin': 'User';

            if($_SESSION['is_admin']){
                echo 
                "
                <tr>
                        <td>$user[id]</td>
                        <td>$user[name]</td>
                        <td>$user[email]</td>
                        <td>$role</td>
                        <td><a onclick='return confirm(\"Are you sure you want to send the data\")' href='../../actions/delete_user.php?id=$user[id]'>Delete</a></td>
                </tr>
                ";
            }else{
                echo 
                "
                <tr>
                        <td>$user[id]</td>
                        <td>$user[name]</td>
                        <td>$user[email]</td>
                        <td>$role</td>
                </tr>";
            }
        }

        
        
        ?>
    </table>
</body>
</html>
