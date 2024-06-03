

<?php 
    include 'Connection.php';

    // Add Cash Details
if (isset($_POST['addcashdetail'])) {
    $customername = $_POST['customername'];
    $PostalAddress = $_POST['postaladdress'];
    $Contact = $_POST['contact'];
    

    $InsertQuery = "insert into cash_on_delivery (custid, Postal_Address, Contact) values ('$customername','$PostalAddress','$Contact')";
    $Check = mysqli_query($con, $InsertQuery);
    if ($Check) {
        echo "
                <script>
                window.location.href = '../CashonDelivery.php?added=1';
                </script>";
    } else {
        echo "
                <script>
                alert('Data Insertion Failed !!!');
                window.location.href = '../CashonDelivery.php';
                </script>";
    }
}


 // Update Cash Details
 if (isset($_POST['updatecashdetail'])) {
    $Id = $_POST['cashid'];
    $customername = $_POST['customername'];
    $PostalAddress = $_POST['postaladdress'];
    $Contact = $_POST['contact'];
    
    $query = "update cash_on_delivery set custid = '$customername', Postal_Address = '$PostalAddress', Contact = '$Contact' where cid  = '$Id'";

    $res = mysqli_query($con, $query) or die("Query Failed");
    if ($res) {
        echo "<script>
        window.location.href='../CashonDelivery.php?updated=1';
        </script>";
    }
     else {
        echo "<script> alert('Data Updation Failed');            
        window.location.href='../CashonDelivery.php';
        </script>";
    }
}


    // Delete Cash Details
    $DelID = $_GET['Delid'];
    $quer = "delete from  cash_on_delivery where cid = '$DelID'";
    $res = mysqli_query($con, $quer);
    echo $res;
    if ($res) {
    echo "
    <script>
    window.location.href = '../CashonDelivery.php?deleted=1';
    </script>";
    }
    mysqli_close($con);
?>