<?php 
session_start();
include "Operations/Connection.php"; 


$CustomerName = $_SESSION['Cust_id'];
$ContactNo = $_POST['contactno'];
$Postaladdress = $_POST['PostalAddress'];

$insertquery = "insert into cash_on_delivery (Postal_Address,Contact,custid) values('$Postaladdress','$ContactNo','$CustomerName')";
$runquery = mysqli_query($con, $insertquery);
 
$output="";
if($runquery){
    $output = "Data inserted Successfully!";
}
else{
    $output = "Data insertion Failed!";
}
echo $output;


?>