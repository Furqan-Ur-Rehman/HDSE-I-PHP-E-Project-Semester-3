

<?php 
    include 'Connection.php';

    // Add Delivery Charges
if (isset($_POST['adddelivery_charges'])) {
    $BookName = $_POST['Bookname'];
    $BookType = $_POST['Booktype'];
    $DeliveryLocation = $_POST['Deliverylocation'];
    $Chargeamount = $_POST['chargeamount'];

    $InsertQuery = "insert into delivery_charges (BookName, Booktype, Delivery_Location, Charge_Amount) values ('$BookName','$BookType','$DeliveryLocation', '$Chargeamount')";
    $Check = mysqli_query($con, $InsertQuery);
    if ($Check) {
        echo "
                <script>
                window.location.href = '../Deliverychargesmain.php?added=1';
                </script>";
    } else {
        echo "
                <script>
                alert('Data Insertion Failed !!!');
                window.location.href = '../Deliverychargesmain.php';
                </script>";
    }
}


 // Update Delivery Charges
 if (isset($_POST['updatedeliverycharges'])) {
    $Id = $_POST['chargeid'];
    $Bookname = $_POST['Bookname'];
    $Booktype = $_POST['booktype'];
    $DeliveryLocation = $_POST['deliverylocation'];
    $Chargeamount = $_POST['Chargeamount'];

    $query = "update delivery_charges set BookName = '$Bookname', Booktype = '$Booktype', Delivery_Location = '$DeliveryLocation', Charge_Amount = '$Chargeamount' where chargeid  = '$Id'";

    $res = mysqli_query($con, $query) or die("Query Failed");
    if ($res) {
        echo "<script>
        window.location.href='../Deliverychargesmain.php?updated=1';
        </script>";
    }
     else {
        echo "<script> alert('Data Insertion Failed');            
        window.location.href='../Deliverychargesmain.php';
        </script>";
    }
}


    // Delete Delivery Charges
    $DelID = $_GET['Delid'];
    $quer = "delete from  delivery_charges where chargeid = '$DelID'";
    $res = mysqli_query($con, $quer);
    echo $res;
    if ($res) {
    echo "
    <script>
    window.location.href = '../Deliverychargesmain.php?deleted=1';
    </script>";
    }
    mysqli_close($con);
?>