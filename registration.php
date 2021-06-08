
<?php include "includes/db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Accommodation management System</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>

    <div id="container">
        <div class="division">
            <h1>Register </h1>
            <div class="form">


            <?php 
    

    if(isset($_POST['submit'])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $password = $_POST['password'];


        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($dob) && !empty($password)) {

            $firstname = mysqli_real_escape_string($connection, $firstname);
            $lastname = mysqli_real_escape_string($connection, $lastname);
            $email = mysqli_real_escape_string($connection, $email);
            $dob = mysqli_real_escape_string($connection, $dob);
            $password = mysqli_real_escape_string($connection, $password);

            $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10) );

            $query = "INSERT INTO student (firstname, lastname, email, dob, password) ";
            $query .= "VALUES('{$firstname}', '{$lastname}', '{$email}', '{$dob}', '{$password}')";
            $register_user_query = mysqli_query($connection, $query);
    
            if(!$register_user_query) {
                die("QUERY FAILED ". mysqli_error($connection). ' ' . mysqli_errno($connection));
            }
    
            $message = "Your Registration has been submitted";

        } else {

            $message = "Fields cannot be empty!";

        }
 
    } else {

        $message = "";

    }
    ?>


                <form action="registration.php" method="POST" id="signup-form">
                    <h4><?php echo $message; ?></h4>
                    <input type="text" name="firstname" placeholder="First Name*" required>
                    <input type="text" name="lastname" placeholder="Last Name*" required>
                    <input type="email" name="email" placeholder="Your Email*" required>
                    <div>
                        <label for="dob">DOB: </label>
                        <input type="date" name="dob" id="dob" required>
                    </div>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" name="submit" value="Register">
                </form>
            </div>
        </div>
    </div>
    
</body>

<script>
    const bgcolor = document.querySelector('.division');
    const input = document.querySelector('input');

    input.addEventListener('click', ()=> {
        bgcolor.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
    })
</script>
</html>