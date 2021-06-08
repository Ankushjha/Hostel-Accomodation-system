
<?php include "includes/db.php"; ?>

<?php ob_start(); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Accommodation management System</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/loader.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <div id="container">
        <div class="navbar">
            <div class="name">
                <h5> <?php echo $_SESSION['firstname']; ?> </h5>
             </div>
            <div class="navbar-class">
                <div class="navbar-image">
                    <a href="admin.php"><img src="images/admin.png" alt=""> </a>
            </div>
                <div class="navbar-content">
                    <a href="admin.php?source=create_room">Insert</a>
                    <a href="includes/admin_logout.php">Log Out</a>
                </div>
            </div>

        </div>

            <?php 

                if(isset($_GET['source'])) {
                    $source = $_GET['source'];
                    } else {
                    $source ='';
                }

                switch($source) {
                case 'create_room';
                    include "includes/add_room.php";
                break;

                case 'update_room';
                    include "includes/update_room.php";
                break;


                default:
                    include "includes/view_all_rooms.php";
                break;

                }

            ?>

    </div>

    <!-- <script src="js/script.js"></script> -->
</body>
</html>