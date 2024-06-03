

<?php 
    include 'Connection.php';

    // Add Credit Card Details
if (isset($_POST['addcreditcard'])) {
    $customername = $_POST['customername'];
    $Cardnumber = $_POST['cardnumber'];
    $DateofExpiry = $_POST['dateofexpiry'];
    $TitleofAc = $_POST['titleofa/c'];

    $InsertQuery = "insert into credit_card (custid, cardnumber, Date_of_Expiry, Title_of_Ac) values ('$customername','$Cardnumber','$DateofExpiry', '$TitleofAc')";
    $Check = mysqli_query($con, $InsertQuery);
    if ($Check) {
        echo "
                <script>
                window.location.href = '../CreditCardDetail.php?added=1';
                </script>";
    } else {
        echo "
                <script>
                alert('Data Insertion Failed !!!');
                window.location.href = '../CreditCardDetail.php';
                </script>";
    }
}


 // Update Credit Card Details
 if (isset($_POST['updatecreditcard'])) {
    $Id = $_POST['cardid'];
    $customername = $_POST['customername'];
    $Cardnumber = $_POST['cardnumber'];
    $DateofExpiry = $_POST['DateofExpiry'];
    $TitleofAc = $_POST['Titleofac'];

    $query = "update credit_card set custid = '$customername', cardnumber = '$Cardnumber', Date_of_Expiry = '$DateofExpiry',
    Title_of_Ac = '$TitleofAc' where cardid  = '$Id'";

    $res = mysqli_query($con, $query) or die("Query Failed");
    if ($res) {
        echo "<script>
        window.location.href='../CreditCardDetail.php?updated=1';
        </script>";
    }
     else {
        echo "<script> alert('Data Updation Failed');            
        window.location.href='../CreditCardDetail.php';
        </script>";
    }
}


    // Delete Credit Card Details
    $DelID = $_GET['Delid'];
    $quer = "delete from  credit_card where cardid = '$DelID'";
    $res = mysqli_query($con, $quer);
    echo $res;
    if ($res) {
    echo "
    <script>
    window.location.href = '../CreditCardDetail.php?deleted=1';
    </script>";
    }
    mysqli_close($con);
?>