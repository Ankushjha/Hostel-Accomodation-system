
    <div class="container">
        <div class="create">
            <h1 class="h1">Update Room</h1>

        <?php  

            if(isset($_GET['r_id'])) {

                $the_room_id = $_GET['r_id'];

            }


            $query = "SELECT * FROM room WHERE room_id = $the_room_id";
            $select_room_by_id = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_room_by_id)) {
                $room_id = $row['room_id'];
                $room_type = $row['room_type'];
                $room_location = $row['room_location'];
                $room_status = $row['room_status'];
                $room_charge = $row['room_charge'];
                $room_payment_status = $row['room_payment_status'];
            }
                    
        if(isset($_POST['update_room'])) {
            $room_type = $_POST['room_type'];
            $room_location = $_POST['room_location'];
            $room_status = $_POST['room_status'];
            $room_charge = $_POST['room_charge'];
            $room_payment_status = $_POST['room_payment_status'];

            $query = "UPDATE room SET ";
            $query .= "room_type = '{$room_type}', ";
            $query .= "room_location = '{$room_location}', ";
            $query .= "room_status = '{$room_status}', ";
            $query .= "room_charge = '{$room_charge}', ";
            $query .= "room_payment_status = '{$room_payment_status}' ";
            $query .= "WHERE room_id = {$the_room_id} ";

            $update_room_query = mysqli_query($connection, $query);

            if(!$update_room_query) {
                die("QUERY FAILED ". mysqli_error($connection). ' ' . mysqli_errno($connection));
            }
            echo "<p class='para'>Room Updated <a href='admin.php'>Go to Admin</a> Or <a href='admin.php'>Update More Rooms</a> </p>";

        }
        
        ?>

            <div class="form">

            <form action="" method="POST" enctype="multipart/form-data">
            
            <div class="room_type">
                    <label class="label" for="room_type"> Type: </label>
                    <select class="select" name="room_type" id="room_type" required>
                        <option value="<?php echo $room_type; ?>"><?php echo $room_type; ?></option>

                        <?php

                            switch($room_type) {
                                case 'Not Selected';
                                    echo "<option value='Singlex'>Singlex</option>";
                                    echo "<option value='Deluxe'>Deluxe</option>";
                                    echo "<option value='Triplex'>Triplex</option>";
                                break;

                                case 'Singlex';
                                    echo "<option value='Deluxe'>Deluxe</option>";
                                    echo "<option value='Triplex'>Triplex</option>";
                                break;

                                case 'Deluxe';
                                    echo "<option value='Singlex'>Singlex</option>";
                                    echo "<option value='Triplex'>Triplex</option>";
                                break;

                                case 'Triplex';
                                    echo "<option value='Singlex'>Singlex</option>";
                                    echo "<option value='Deluxe'>Deluxe</option>";
                                break;

                                default:
                                    echo $room_type;
                                break;

                            }

                        ?>

                    </select>
                </div>

                <div class="location">
                    <label class="label" for="room_location">Room Location: </label>
                    <select class="select" name="room_location" id="room_location" required>
                        <option value="<?php echo $room_location; ?>"><?php echo $room_location; ?></option>
                        
                        <?php

                            switch($room_location) {
                                case 'Not Selected';
                                    echo "<option value='East Wing'>East Wing</option>";
                                    echo "<option value='West Wing'>West Wing</option>";
                                    echo "<option value='North Wing'>North Wing</option>";
                                    echo "<option value='South Wing'>South Wing</option>";
                                break;

                                case 'East Wing';
                                    echo "<option value='West Wing'>West Wing</option>";
                                    echo "<option value='North Wing'>North Wing</option>";
                                    echo "<option value='South Wing'>South Wing</option>";
                                break;

                                case 'West Wing';
                                    echo "<option value='East Wing'>East Wing</option>";
                                    echo "<option value='North Wing'>North Wing</option>";
                                    echo "<option value='South Wing'>South Wing</option>";
                                break;

                                case 'North Wing';
                                    echo "<option value='East Wing'>East Wing</option>";
                                    echo "<option value='West Wing'>West Wing</option>";
                                    echo "<option value='South Wing'>South Wing</option>";
                                break;

                                case 'South Wing';
                                    echo "<option value='East Wing'>East Wing</option>";
                                    echo "<option value='North Wing'>North Wing</option>";
                                    echo "<option value='West Wing'>West Wing</option>";
                                break;

                                default:
                                    echo $room_location;
                                break;

                            }
                        
                        ?>

                    </select>
                </div>

                <div class="room_status">
                    <label class="label" for="room_status">Room Status:</label>
                    <select class="select" name="room_status" id="room_status" required>
                        <option value="<?php echo $room_status; ?>"><?php echo $room_status; ?></option>
                        <?php 

                            if($room_status == 'Not Selected') {

                            echo "<option value='Available'>Available</option>";
                            echo "<option value='Not Available'>Not Available</option>";

                            } elseif($room_status == 'Not Available') {

                                echo "<option value='Available'>Available</option>";

                            } else {
                                
                                    echo "<option value='Not Available'>Not Available</option>";

                                }

                        ?>
                    </select>
                </div>

                <div class="room_charge">
                    <label class="label" for="room_charge">Room Charge:</label>
                    <input value="<?php echo $room_charge;?>" class="input" type="number" name="room_charge" id="room_charge" placeholder="Room Charge*" required>
                </div>

                <div class="payment_status">
                    <label class="label" for="room_payment_status">Payment Status:</label>
                    <select class="select" name="room_payment_status" id="payment_status" required>
                        <option value="<?php echo $room_payment_status; ?>"><?php echo $room_payment_status; ?></option>
                        <?php 

                            if($room_payment_status == 'Paid') {
                            echo "<option value='Not Paid'>Not Paid</option>";
                            } else {
                            echo "<option value='Paid'>Paid</option>";
                            }

                        ?>
                    </select>
                </div>

                <input class="btn_submit" type="submit" name="update_room" value="Update" >
            </div>

            </form>
        </div>
    </div>