<link rel="stylesheet" href="Css/RegisterForm.css">
</head>
<?php include("header.php");?>
<body>
    <div class="container">
        <h2>Sign in</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="loginForm" onSubmit="return validateForm()" method="post">

            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Your first name..." id="firstname" name="name" required>

            <label for="surname"><b>Surname</b></label>
            <input type="text" placeholder="Your last name..." id="lastname" name="surname" required>

            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Your email..." id="email" name="email" required>

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Your username..." id="username" name="username" required>
            
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Your password..." id="psw" name="password" required>

            <button type="submit">Sign in</button>

        </form>
        <?php include_once '../controller/registerController.php';?>
    </div>

    <script>
        function validateForm() {
            var name = document.forms["loginForm"]["name"].value;
            var surname = document.forms["loginForm"]["surname"].value;
            var username = document.forms["loginForm"]["username"].value;
            var email = document.forms["loginForm"]["email"].value;
            var password = document.forms["loginForm"]["psw"].value;

            var nameRegex = /^[A-Z][a-z]+$/
            if(!nameRegex.test(name)) {
                alert('Invalid Name!');
                return false;
            }

            var surnameRegex = /^[A-Z][a-z]+$/
            if(!surnameRegex.test(surname)) {
                alert('Invalid Surname!');
                return false;
            }

            var usernameRegex = /^[a-zA-Z]+$/
            if(!usernameRegex.test(username)) {
                alert('Invalid Username!');
                return false;
            }

            var emailRegex = /[a-zA-Z.-_]+@+[a-z]+\.+[a-z]{2,3}$/
            if(!emailRegex.test(email)) {
                alert('Invalid email!');
                return false;
            }

            var passwordRegex = /^[A-Z][a-zA-Z]+\d{1,3}$/
            if(!passwordRegex.test(password)) {
                alert('Invalid password!');
                return false;
            }

            alert('Your account has been sucessfully registered');
            return true;
        }
    </script>

</body>

</html>