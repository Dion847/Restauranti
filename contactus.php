<?php include("header.php");?>
<link rel="stylesheet" href="Css/Contact Us.css">
    </style>
</head>

<body>
    <div class="container">
        <h2>Contact Us</h2>
        <form name="contactForm" action="/submit_contact_us" onSubmit="return validateForm()" method="post" id=contact>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your name..." required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your email..." required>

            <label for="subject">Message</label>
            <textarea id="subject" name="message" placeholder="Write something.." style="height: 100px"
                required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        function validateForm() {
            var name = document.forms["contactForm"]["name"].value;
            var email = document.forms["contactForm"]["email"].value;

            var nameRegex = /^[A-Z][a-z]+$/
            if (!nameRegex.test(name)) {
                alert("Please enter a valid name!");
                return false;
            }

            var emailRegex = /[a-zA-Z.-_]+@+[a-z]+\.+[a-z]{2,3}$/
            if(!emailRegex.test(email)) {
                alert('Please enter a valid email addres!');
                return false;
            }

            alert('Mesazhi juaj do te dergohet tek ekipet tona dhe do te pergjigjemi se shpejti!');
            return true;
        }
    </script>
</body>

</html>