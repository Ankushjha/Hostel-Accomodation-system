<div class="container">
        <div class="create">
            <h1 class="h1">Create Room</h1>

        <?php  
        
        if(isset($_POST['create_room'])) {
            $room_type = $_POST['room_type'];
            $room_location = $_POST['room_location'];
            $room_status = $_POST['room_status'];
            $room_charge = $_POST['room_charge'];
            $room_payment_status = $_POST['room_payment_status'];

            $query = "INSERT INTO room (room_type, room_location, room_status, room_charge, room_payment_status) ";
            $query .= "VALUES('{$room_type}', '{$room_location}', '{$room_status}', '{$room_charge}', '{$room_payment_status}')";

            $create_room_query = mysqli_query($connection, $query);

            if(!$create_room_query) {
                die("QUERY FAILED ". mysqli_error($connection). ' ' . mysqli_errno($connection));
            }
            echo "<p class='para'>Room Inserted <a href='admin.php'>Go to Admin</a></p>";

        }
        
        ?>

            <div class="form">

            <form action="" method="POST" enctype="multipart/form-data">
            
            <div class="room_type">
                    <label class="label" for="room_type"> Type: </label>
                    <select  class="select" name="room_type" id="room_type" required>
                        <option value="Not Selected">Select Option</option>
                        <option value="Singlex">Singlex</option>
                        <option value="Deluxe">Deluxe</option>
                        <option value="Triplex">Triplex</option>
                    </select>
                </div>

                <div class="location">
                    <label class="label" for="room_location">Room Location: </label>
                    <select  class="select" name="room_location" id="room_location" required>
                        <option value="Not Selected">Select Option</option>
                        <option value="East Wing">East Wing</option>
                        <option value="West Wing">West Wing</option>
                        <option value="North Wing">North Wing</option>
                        <option value="South Wing">South Wing</option>
                    </select>
                </div>

                <div class="room_status">
                    <label class="label" for="room_status">Room Status:</label>
                    <select  class="select" name="room_status" id="room_status" required>
                        <option value="Not Selected">Select Option</option>
                        <option value="Available">Available</option>
                        <option value="Not Available">Not Available</option>
                    </select>
                </div>

                <div class="room_charge">
                    <label class="label" for="room_charge">Room Charge:</label>
                    <input class="input" type="number" name="room_charge" id="room_charge" placeholder="Room Charge*" required>
                </div>

                <div class="payment_status">
                    <labe class="label"l for="room_payment_status">Payment Status:</label>
                    <select  class="select" name="room_payment_status" id="payment_status" required>
                        <option value="Not Paid">Select Option</option>
                        <option value="Paid">Paid</option>
                        <option value="Not Paid">Not Paid</option>
                    </select>
                </div>

                <input class="btn_submit" type="submit" name="create_room" value="create" >
            </div>

            </form>
        </div>
    </div>
