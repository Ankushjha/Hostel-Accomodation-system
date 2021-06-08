<?php 
        
        if(isset($_POST['checkboxArray'])) {

            foreach($_POST['checkboxArray'] as $listValueId){
        
                $bulk_options = $_POST['bulk_options'];
        
                switch($bulk_options) {

                    case 'delete':
                        $query = "DELETE FROM room WHERE room_id = {$listValueId} ";
                        $update_to_delete_status = mysqli_query($connection, $query);
                        
                        if(!$update_to_delete_status) {
                            die("QUERY FAILED ". mysqli_error($connection). ' ' . mysqli_errno($connection));
                        }
                        
                        break;

                }

            }

        }
        
        ?>
    
        <form action="" method="post">

            <div class="table">


                <table id="admin">

                    
                <div id="bulkOptionsContainer">
            
                    <select class="form-control" name="bulk_options" id="">
                    
                    <option value="">Select Options</option>
                    <option value="delete">Delete</option>
                    
                    </select>
                
                </div>
                
                <div id="btnApply">
                    <input type="submit" name="submit" class="btn" value="Apply">
                </div>
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAllBoxes"></th>
                            <th>#ID</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th>Room Status</th>
                            <th>Charge</th>
                            <th>Payment Status</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
    
                    <tbody>

                    <?php 
                        $query = "SELECT * FROM room ORDER BY room_id DESC ";
                        $select_room = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_room)) {
                            $room_id = $row['room_id'];
                            $room_type = $row['room_type'];
                            $room_location = $row['room_location'];
                            $room_charge = $row['room_charge'];
                            $room_status = $row['room_status'];
                            $room_payment_status = $row['room_payment_status'];

                            echo "<tr>";

                    ?>
                            <td> <input type='checkbox' class='checkBoxes' name='checkboxArray[]' value='<?php echo $room_id; ?>'> </td>


                        <?php

                            echo"<td>$room_id</td>";
                            echo"<td>$room_type</td>";
                            echo"<td>$room_location</td>";
                            echo"<td>$room_status</td>";
                            echo"<td>$room_charge</td>";
                            echo"<td>$room_payment_status</td>";

                            echo "<td><a href='admin.php?source=update_room&r_id={$room_id}'>UPDATE</a></td>";
                            echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='admin.php?delete={$room_id}'>DELETE</a></td>";

                            echo "</tr>";

                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </form>

        <?php 
        
            if(isset($_GET['delete'])){
                $the_room_id = $_GET['delete'];

                $query = "DELETE FROM room WHERE room_id = {$the_room_id} ";
                $delete_query = mysqli_query($connection, $query);

                header("Location: admin.php");

                if(!$delete_query) {
                    die("QUERY FAILED ". mysqli_error($connection). ' ' . mysqli_errno($connection));
                }
            }

        ?>


<script>

// $(document).ready(function(){
//     $('#selectAllBoxes').click(function(event){

//         if(this.checked) {
//         $('.checkBoxes').each(function(){
//             this.checked = true;
//         });
//     } else {
//         $('.checkBoxes').each(function(){
//             this.checked = false;
//         });
//     }

//     });

    // $(document).ready(function(){
    //     $('#selectAllBoxes').click(function(){
    //         $(".checkBoxes").prop('checked', $(this).prop('checked'));
    //     });
    // });



</script>