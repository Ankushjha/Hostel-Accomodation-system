
<?php include "includes/db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Accommodation management System</title>
    <link rel="stylesheet" href="css/landing.css">
</head>
<body>
    <div id="container" class="container">
        <div class="box1">
            <img src="images/student.png"  alt="">
            <h1>Login for Student</h1>

            <div class="form">
                <form action="includes/student_login.php" method="post" id="student">
                    <input type="email" name="student_email" placeholder="Your Email*" required="required">
                    <input type="password" name="student_password" placeholder="Your Password*" required="required">
                    <button type="submit" name="student_login">Login</button>
                </form>
                <a href="registration.php">signUp?</a>
            </div>
        </div>
        <div class="box2">
            <img src="images/admin.png" alt="">
            <h1>Login for Admin</h1>
            <div class="form">
                <form action="includes/admin_login.php" method="post" id="admin">
                    <input type="email" name="admin_email" placeholder="Your Email">
                    <input type="password" name="admin_password" placeholder="Your Password">
                    <button type="submit" name="admin_login">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const box1 = document.querySelector('.box1');
        const box2 = document.querySelector('.box2');
        const adminForm = document.querySelector('#admin');
        const studentForm = document.querySelector('#student');
        const signupLink = document.querySelector('a');


        box1.addEventListener('click', function(){
            box2.style.padding="2rem";
            box1.style.padding="4rem";
            studentForm.style.display = "inherit";
            signupLink.style.display = "inherit";
            adminForm.style.display = "";

        });

        box2.addEventListener('click', function(){
            box1.style.padding="2rem";
            box2.style.padding="4rem";
            adminForm.style.display = "inherit";
            studentForm.style.display = "";
            signupLink.style.display = "";
        });

    </script>
</body>
</html>