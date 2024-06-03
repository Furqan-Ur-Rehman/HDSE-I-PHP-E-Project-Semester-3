<?php 
include "Operations/Connection.php";

$charonweight = $_POST['Weight_id'];
echo $charonweight;

$DeliverycharWeight = "select * from charge_on_weight where Weightid = $charonweight";
$runquery = mysqli_query($con, $DeliverycharWeight);

$output = "";
while($row = mysqli_fetch_assoc($runquery)){
    $output .='<option value=" '. $row['kgid'] .'">'.$row['charge']. '</option>';
}

echo $output;
?>