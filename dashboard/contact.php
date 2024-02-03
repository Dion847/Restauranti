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
    <title>User CRUD</title>
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
    <h2>Logout</h2>
    <form action="../../actions/logout_action.php" method="post">
        <button type="submit" style="background: red;border: 1px solid white;padding: 5px;font-weight: bold;" >Logout</button>
    </form>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>

        <?php 
        include_once '../../models/contact.php';

        $contact = new Contact();

        $contacts = $contact->getContacts();

        foreach($contacts as $contact){
        echo 
        "
        <tr>
                <td>$contact[name]</td>
                <td>$contact[email]</td>
                <td>$contact[message]</td>
        </tr>
        ";
        }

        
        
        ?>
    </table>
</body>
</html>