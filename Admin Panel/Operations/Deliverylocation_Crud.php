

<?php 
    include 'Connection.php';

    // Add Delivery Location
if (isset($_POST['adddelivery_location'])) {
    $Location = $_POST['Location'];
    $Bookname = $_POST['bookname'];
    $BookType = $_POST['booktype'];

    $InsertQuery = "insert into deliverylocation (Location, BooksName, Loc_on_booktype) values ('$Location','$Bookname','$BookType')";
    $Check = mysqli_query($con, $InsertQuery);
    if ($Check) {
        echo "
                <script>
                window.location.href = '../Delivery_Locationmain.php?added=1';
                </script>";
    } else {
        echo "
                <script>
                alert('Data Insertion Failed !!!');
                window.location.href = '../Delivery_Locationmain.php';
                </script>";
    }
}


 // Update Delivery Location
 if (isset($_POST['updatedeliverylocation'])) {
    $Id = $_POST['LocationId'];
    $Location = $_POST['locations'];
    $Booktype = $_POST['booktype'];
    $Bookname = $_POST['bookname'];

    $query = "update deliverylocation set Location = '$Location', BooksName = '$Bookname', Loc_on_booktype = '$Booktype' where Locationid  = '$Id'";

    $res = mysqli_query($con, $query) or die("Query Failed");
    if ($res) {
        echo "<script>
        window.location.href='../Delivery_Locationmain.php?updated=1';
        </script>";
    }
     else {
        echo "<script> alert('Data Insertion Failed');            
        window.location.href='../Delivery_Locationmain.php';
        </script>";
    }
}


    // Delete Delivery Location
    $DelID = $_GET['Delid'];
    $quer = "delete from  deliverylocation where Locationid = $DelID";
    $res = mysqli_query($con, $quer);
    echo $res;
    if ($res) {
    echo "
    <script>
    window.location.href = '../Delivery_Locationmain.php?deleted=1';
    </script>";
    }
    mysqli_close($con);
?>