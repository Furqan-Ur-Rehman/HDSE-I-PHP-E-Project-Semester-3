<?php 
include "Operations/Connection.php";
    $booktype_id = $_POST['type_id'];
    echo $booktype_id;
    $delivery_location = "select * from deliverylocation where Loc_on_booktype = $booktype_id";
    $query = mysqli_query($con, $delivery_location);

    $output = '<option> Select Delivery Location</option>';
    while($row = mysqli_fetch_assoc($query)){
        $output .= '<option value="' .$row['Locationid'] . '">'. $row['Location'] . '</option>';
    }
    echo $output;



   

?>