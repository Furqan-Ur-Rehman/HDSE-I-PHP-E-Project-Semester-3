<?php 
include "Operations/Connection.php";

$booknameid = $_POST['bname_id'];
echo $booknameid;

$Booktype = "select * from booktype where booksName = $booknameid";
$runquery = mysqli_query($con, $Booktype);

$output = "<option> Select BookType </option>";
while($row = mysqli_fetch_assoc($runquery)){
    $output .='<option value=" '. $row['Typeid'] .'">'.$row['Type']. '</option>';
}

echo $output;
?>