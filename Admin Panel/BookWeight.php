<?php 
include "Operations/Connection.php";

$weightid = $_POST['type_id'];
echo $weightid;

$DeliveryWeight = "select * from book_weight where Booktype = $weightid";
$runquery = mysqli_query($con, $DeliveryWeight);

$output = "<option> Select Book Weight </option>";
while($row = mysqli_fetch_assoc($runquery)){
    $output .='<option value=" '. $row['weightid'] .'">'.$row['weight']. '</option>';
    // $output .= '<input type="text" value="'$row['weight']'" . name="'$row['weightid']'">';
}

echo $output;
?>