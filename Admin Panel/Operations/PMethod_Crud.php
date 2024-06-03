<?php 
    include 'Connection.php';

    // Add Category
    if (isset($_POST['addpaymentmethod'])) {
        $Method = $_POST['method'];


        $CheckCategory = "select * from payment_method where PaymentMethod = '$Method'";

        $query = mysqli_query($con, $CheckCategory);
        $Catrgories = mysqli_num_rows($query);

        if($Catrgories){
            echo "
            <script>
            window.location.href = '../PaymentMethod.php?exist=1';
            </script>";
        }
        else{
            $InsertQuery = "insert into payment_method (PaymentMethod) values ('$Method')";
            $Check = mysqli_query($con, $InsertQuery);
            if($Check){
                echo "
                <script>
                window.location.href = '../PaymentMethod.php?added=1';
                </script>";
            }
            else{
                echo "
                <script>
                alert('Data Insertion Failed !!!');
                window.location.href = '../PaymentMethod.php''
                </script>";
            }
        }
    }

    // Update Category
    if (isset($_POST['updatePaymentMethod'])) {
        $ID = $_POST['methodId'];
        $Method = $_POST['method'];

        $query = "update payment_method set PaymentMethod='$Method' where PaymentId = '$ID'";
       
        $res = mysqli_query($con, $query) or die("Query Failed");
        if ($res) {
            echo "
            <script>
            window.location.href='../PaymentMethod.php?updated=1';
            </script>";
        }
         else {
            echo "<script> alert('Data Insertion Failed');            
            window.location.href='../PaymentMethod.php';
            </script>";
        }
    }

    // Delete Category
    $DelID = $_GET['Delid'];
    $quer = "delete from payment_method where PaymentId = $DelID";
    $res = mysqli_query($con, $quer);
    echo $res;
    if ($res) {
    echo "
    <script>
    window.location.href = '../PaymentMethod.php?deleted=1';
    </script>";
    }
    mysqli_close($con);
?>