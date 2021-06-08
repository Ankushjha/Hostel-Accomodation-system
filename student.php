
<?php include "includes/db.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Accommodation management System</title>
    <link rel="stylesheet" href="css/student.css">
</head>
<body>
    <div id="container">

        <div class="navbar">
            <div class="navbar-class">
                <div class="navbar-image">
                    <img src="images/student.png" alt="">
                </div>
                <div class="navbar-content">
                    <a class="checkin" href="#">Check In</a>
                    <a class="checkout" href="#">Check Out</a>
                </div>
            </div>

        </div>
    
        <div class="table">
            <table id="student">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Type</th>
                        <th>Location</th>
                        <th>Charge</th>
                        <th class="checkout">Check out</th>
                        <th class="checkin">Check in</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Singlex</td>
                        <td>West Wing</td>
                        <td>35</td>
                        <td class="checkout"><a href="#">CHECK OUT</a></td>
                        <td class="checkin"><a href="#">CHECK IN</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Duplex</td>
                        <td>East Wing</td>
                        <td>30</td>
                        <td class="checkout"><a href="#">CHECK OUT</a></td>
                        <td class="checkin"><a href="#">CHECK IN</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <script>
    const checkIn = document.querySelectorAll('.checkin');
        const checkOut = document.querySelectorAll('.checkout');
        
        checkIn.addEventListener ('click', ()=>{
            checkOut.style.display='inherit';
            checkIn.style.display='none';
        })
        
        checkOut.addEventListener('click', ()=>{
            checkOut.style.display='none';
            checkIn.style.display="inherit";
        })
        
        </script>
</body>
</html>