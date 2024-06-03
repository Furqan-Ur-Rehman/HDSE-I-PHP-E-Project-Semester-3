<?php include 'Connection.php'; ?>
<?php session_start(); ?>


<?php if (isset($_POST['addtocart'])) {
    $Bookid = $_POST['Bookid'];
    $BookPrice = $_POST['Price'];
    $Qty = $_POST['qty'];
    $Customer = @$_SESSION['DatabaseName'];
    // if(@$Customer == ""){
    //     echo "
    //     <script>
    //     alert('Login First');
    //     window.location.href='../index.php';
    //     </script>";
    // }
    
    if($Customer){
        $query = "insert into cart (Customer, Bookid, Price, Qty) VALUES ('$Customer','$Bookid','$BookPrice','$Qty')";

        $res = mysqli_query($con, $query) or die("Query Failed");
        if (@$res) {
            echo "
            <script>
            window.location.href='../Books.php?sended=1';
            </script>";
        }
         else {
            echo "<script> alert('Data Insertion Failed');            
            window.location.href='../Books.php';
            </script>";
        }
    }
    else{
        echo "
        <script>
        alert('Login First');
        window.location.href='../index.php';
        </script>";
    }

}
    // Delete Cart
    $DelID = $_GET['Delid'];
    $quer = "delete from cart where Cartid = $DelID";
    $res = mysqli_query($con, $quer);
    echo $res;
    if ($res) {
    echo "
    <script>
    alert('Data Deleted!!');
    window.location.href = '../Order.php';
    </script>";
    }
    else{
        echo "<script>window.location.href = '../Order.php';</script>";
    }
    mysqli_close($con);