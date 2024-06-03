<?php 
session_start();

include "Operations/Connection.php"; 


$cardnumber = @$_POST['cardnumber'];
$dateofexpiry = @$_POST['dateofexpiry'];
$AcTitle = @$_POST['titleofAc'];
$CustName = $_SESSION['Cust_id'];

$insertquery = "insert into credit_card (cardnumber,Date_of_Expiry,Title_of_Ac,	custid) values('$cardnumber','$dateofexpiry','$AcTitle','$CustName')";
$runquery = mysqli_query($con, $insertquery);
$_SESSION['creditcard'] = $runquery;
$output="";
if($runquery){
    $output = "Data inserted Successfully!";
}
else{
    $output = "Data insertion Failed!";
}
echo $output;
?>