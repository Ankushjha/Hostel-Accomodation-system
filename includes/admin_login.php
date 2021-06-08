<?php include "db.php"; ?>

<?php session_start(); ?>

<?php 

    if(isset($_POST['admin_login'])) {
        $email = $_POST['admin_email'];
        $password = $_POST['admin_password'];

        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM admin WHERE admin_email = '{$email}' ";
        $select_admin_query = mysqli_query($connection, $query);

        if(!$select_admin_query) {
            die("QUERY FAILED!!". mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($select_admin_query)) {
            $db_a_id = $row['a_id'];
            $db_firstname = $row['firstname'];
            $db_lastname = $row['lastname'];
            $db_email = $row['admin_email'];
            $db_password = $row['admin_password'];
        }

        if($email != $db_email && $password != $db_password) {
            
            header("Location: ../landing.php");

        } else if($email == $db_email && $password == $db_password){

            $_SESSION['firstname'] = $db_firstname;
            $_SESSION['lastname'] = $db_lastname;
            $_SESSION['admin_email'] = $db_lastname;

            header("Location: ../admin.php");

        } else {
            
            header("Location: ../index.php");

        }

    }

?>