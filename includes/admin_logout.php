
<?php session_start(); ?>


<?php  

$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['admin_email'] = null;

    header("Location: ../index.php");

?>