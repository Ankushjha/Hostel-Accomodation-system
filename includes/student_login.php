<?php include "db.php"; ?>

<?php session_start(); ?>

<?php 

    if(isset($_POST['student_login'])) {
        $email = $_POST['student_email'];
        $password = $_POST['student_password'];

        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM student WHERE email = '{$email}' ";
        $select_student_query = mysqli_query($connection, $query);

        if(!$select_student_query) {
            die("QUERY FAILED!!". mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($select_student_query)) {
            $db_s_id = $row['s_id'];
            $db_firstname = $row['firstname'];
            $db_lastname = $row['lastname'];
            $db_email = $row['email'];
            $db_dob = $row['dob'];
            $db_password = $row['password'];
        }

        if(password_verify($password, $db_password)) {
            $_SESSION['firstname'] = $db_firstname;
            $_SESSION['lastname'] = $db_lastname;
            $_SESSION['email'] = $db_email;
            $_SESSION['dob'] = $db_dob;

            header("Location: ../student.php");
        } else{
            header("Location: ../index.php");
        }

    }

?>