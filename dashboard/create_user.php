<?php
session_start();
if (!isset($_SESSION['session_token']) || !isset($_SESSION['user_email']) || !$_SESSION['is_admin']) {
    // Redirect to the login page or display an error message
    header("Location: ../login.php");
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="../../assets/registrationStyle.css" />
</head>

<body>
    <h1>Registration Form</h1>
    <p>Please fill out this form with the required information</p>

    <fieldset>
        <form method="post" action="../../actions/create_user_action.php">
            <label for="first-name">Name: <input id="first-name" name="name" type="text"
                    required /></label>
            <label for="username">Username: <input id="username" name="username" type="text"
                    required /></label>
            <label for="email">Enter Your Email: <input id="email" name="email" type="email" required /></label>
            <label for="password">Create a Password: <input id="password" name="password"
                    type="password" required />
            </label>        
    </fieldset>

    <label for="terms-and-conditions">
        <input class="inline" id="terms-and-conditions" type="checkbox" name="is_admin" value="1" /> Is Admin?</a>
    </label>
    <input type="submit" value="Register" />
    </form>

</body>
</html>