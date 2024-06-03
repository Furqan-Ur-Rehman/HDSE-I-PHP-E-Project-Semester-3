<?php 
    include 'Connection.php';

    // Add Category
    if (isset($_POST['AddDealer'])) {
        $Dealer_name = $_POST['Dealer_Name'];
        $Dealer_Location = $_POST['Dealer_Location'];
        $shop_Name = $_POST['Shop_Name'];
        $City = $_POST['City'];
        $contact = $_POST['Contact'];

        $CheckCategory = "select * from dealers where Dealer_name = '$Dealer_name'";

        $query = mysqli_query($con, $CheckCategory);
        $Catrgories = mysqli_num_rows($query);

        if($Catrgories){
            echo "
            <script>
            alert('Email Already Exist');
            window.location.href = '../Dealers.php';
            </script>";
        }
        else{
            $InsertQuery = "insert into dealers (Dealer_name, Dealers_Location, shop_Name, City, contact ) values ('$Dealer_name', '$Dealer_Location', '$shop_Name', '$City', '$contact')";
            $Check = mysqli_query($con, $InsertQuery);
            if($Check){
                echo "
                <script>
                alert('Data has been Inserted');
                window.location.href = '../Dealers.php';
                </script>";
            }
            else{
                echo "
                <script>
                alert('Data Insertion Failed !!!');
                window.location.href = '../Dealers.php''
                </script>";
            }
        }
    }

    // Update Category
    if (isset($_POST['UpdateDealer'])) {
        $Id =  $_POST['DealerId'];
        $Name = $_POST['DealerName'];
        $ShopName = $_POST['shopName'];
        $Location = $_POST['DealerLocation'];
        $City = $_POST['City'];
        $Contact = $_POST['Contact'];

        $query = "update dealers set Dealer_name = '$Name' , Dealers_Location = '$Location', shop_Name = '$ShopName', City = '$City', contact = '$Contact' where dealerid = '$Id'";
       
        $res = mysqli_query($con, $query) or die("Query Failed");
        if ($res) {
            echo "
            <script> alert('Data Updated');
            window.location.href='../Dealers.php';
            </script>";
        }
         else {
            echo "<script> alert('Data Insertion Failed');            
            window.location.href='../Dealers.php';
            </script>";
        }
    }

    // Delete Dealer
    $DelID = $_GET['Delid'];
    $quer = "delete from dealers where dealerid = $DelID";
    $res = mysqli_query($con, $quer);
    echo $res;
    if ($res) {
    echo "
    <script>
    alert('Data Deleted!!');
    window.location.href = '../Dealers.php';
    </script>";
    }
    mysqli_close($con);
?>