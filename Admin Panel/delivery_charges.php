<?php
include "Operations/Connection.php";

if(isset($_POST['Location_id'])){


 $DevLocation_id = $_POST['Location_id'];
  echo $DevLocation_id;
$query_delivery = "select * from delivery_charges where Delivery_Location = $DevLocation_id";
$runquery = mysqli_query($con, $query_delivery);

$output = '';
    while($row = mysqli_fetch_assoc($runquery)){
        $output .= '<option value="' .$row['chargeid'] . '">'. $row['Charge_Amount'] . '</option>';
    }

    echo $output;
}

?>