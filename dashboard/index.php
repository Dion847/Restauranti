<?php
session_start();

if (!isset($_SESSION['session_token']) || !isset($_SESSION['user_email'])) {
    // Redirect to the login page or display an error message
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <header>
        <h1>Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="users.php">Users</a></li>
            <li><a href="articles.php">Articles</a></li>
            <li><a href="contact.php">Contacts</a></li>
            <li>
                <form action="../../actions/logout_action.php" method="post">
                    <button type="submit" style="background: red;border: 1px solid white;padding: 5px;font-weight: bold;" >Logout</button>
                </form>
            </li>
        </ul>
    </nav>
    <main>
        <a href="users.php"><img src="assets/images/user.png" alt=""></a>
        <a href="articles.php"><img src="assets/images/articles.png" alt=""></a>  
        <a href="contact.php"><img src="assets/images/contact.png" alt=""></a>      
    </main>
</body>
</html>