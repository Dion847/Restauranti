<?php
session_start();

if (!isset($_SESSION['session_token']) || !isset($_SESSION['user_email'])) {
    // Redirect to the login page or display an error message
    header("Location: ../login.php");
    exit();
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>Create Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
        }

        .container {
            width: 300px;
            padding: 16px;
            background-color: white;
            margin: 0 auto;
            margin-top: 100px;
            border: 1px solid black;
            border-radius: 4px;
        }

        input[type=text],input[type=file],
        textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: orange;
            color: black;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        a {
            color: black;
            text-decoration: none;
        }

        a:hover {
            color: orange;
        }
    </style>
</head>

<body>
    <div class="container">
        <form name="createForm" method="post" action="../../actions/create_action.php" enctype="multipart/form-data">
            <label for="title"><b>Title</b></label>
            <input type="text" placeholder="Enter title" id="title" name="title" required>
            <label for="title"><b>Description</b></label>
            <textarea placeholder="Description" id="description" name="description"></textarea>
            <label for="image"><b>Image</b></label>
            <input type="file" name="image" required accept=".jpg,.jpeg" >
            <button type="submit">Save</button>
        </form>
    </div>

</body>
</html>