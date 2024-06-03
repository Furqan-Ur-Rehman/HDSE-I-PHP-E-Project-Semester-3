<?php 
    include 'Connection.php';

    // Add Category
    if (isset($_POST['AddWinner'])) {
        $Compitition =  $_POST['winnercompititon'];
        $Winner =  $_POST['winnerCustomer'];
        $Price =  $_POST['winnerprice'];


        $CheckCategory = "select * from winners where custid = '$Winner'";

        $query = mysqli_query($con, $CheckCategory);
        $Catrgories = mysqli_num_rows($query);

        if($Catrgories){
            echo "
            <script>
            window.location.href = '../CompititionWinner.php?exist=1';
            </script>";
        }
        else{
            $InsertQuery = "insert into winners ( compid, prizes, custid) VALUES ( '$Compitition', '$Price','$Winner')";
            $Check = mysqli_query($con, $InsertQuery);
            if($Check){
                echo "
                <script>
                window.location.href = '../CompititionWinner.php?added=1';
                </script>";
            }
            else{
                echo "
                <script>
                alert('Data Insertion Failed !!!');
                window.location.href = '../CompititionWinner.php''
                </script>";
            }
        }
    }

    // Update Category
    if (isset($_POST['UpdateWinner'])) {
        $Id =  $_POST['winnerid'];
        $Compitition =  $_POST['winnercompititon'];
        $Winner =  $_POST['winnerCustomer'];
        $Price =  $_POST['winnerprice'];

        $query = "update winners set compid='$Compitition', prizes='$Price', custid='$Winner' where winid = '$Id'";
        $res = mysqli_query($con, $query) or die("Query Failed");
        if ($res) {
            echo "
            <script> 
            window.location.href='../CompititionWinner.php?updated=1';
            </script>";
        }
         else {
            echo "<script> alert('Data Insertion Failed');            
            window.location.href='../CompititionWinner.php';
            </script>";
        }
    }

    // Delete Category
    $DelID = $_GET['Delid'];
    $quer = "delete from winners where winid = $DelID";
    $res = mysqli_query($con, $quer);
    echo $res;
    if ($res) {
    echo "
    <script>
    window.location.href = '../CompititionWinner.php?deleted=1';
    </script>";
    }
    mysqli_close($con);
?>