<?php include("header.php");?>
<?php 

session_start();

if (isset($_SESSION['session_token']) || isset($_SESSION['user_email'])) {
    header("Location: ../view/dashboard/index.php");
    exit();
}

?>
<link rel="stylesheet" href="Css/LoginForm.css">
</head>

<body>
    <div class="container">
        <h2>Log in</h2>
        <form name="loginForm" onSubmit="return validateForm()" method="post">
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Your email..." id="email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Your password..." id="psw" name="psw" required>

            <a href="register.php">Don't have an account? Sign up
                here.</a>

            <button type="submit">Login</button>

        </form>
    </div>

    <script>
        function validateForm() {
            var email = document.forms["loginForm"]["email"].value;
            var password = document.forms["loginForm"]["psw"].value;

            var emailRegex = /[a-zA-Z.-_]+@+[a-z]+\.+[a-z]{2,3}$/
            if(!emailRegex.test(email)) {
                alert('Email is incorrect');
                return false;
            }

            var passwordRegex = /^[A-Z][a-zA-Z]+\d{1,3}$/
            if(!passwordRegex.test(password)) {
                alert('Password is incorrect');
                return false;
            }

            alert('You have logged in into your account!');
            return true;
        }
    </script>

</body>

</html>