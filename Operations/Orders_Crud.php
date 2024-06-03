<?php 
    include 'Connection.php';
    session_start();

    // // Add Category
    // if (isset($_POST['addpaymentmethod'])) {
    //     $Method = $_POST['method'];


    //     $CheckCategory = "select * from payment_method where PaymentMethod = '$Method'";

    //     $query = mysqli_query($con, $CheckCategory);
    //     $Catrgories = mysqli_num_rows($query);

    //     if($Catrgories){
    //         echo "
    //         <script>
    //         alert('Method Already Exist');
    //         window.location.href = '../PaymentMethod.php';
    //         </script>";
    //     }
    //     else{
    //         $InsertQuery = "insert into payment_method (PaymentMethod) values ('$Method')";
    //         $Check = mysqli_query($con, $InsertQuery);
    //         if($Check){
    //             echo "
    //             <script>
    //             alert('Data has been Inserted');
    //             window.location.href = '../PaymentMethod.php';
    //             </script>";
    //         }
    //         else{
    //             echo "
    //             <script>
    //             alert('Data Insertion Failed !!!');
    //             window.location.href = '../PaymentMethod.php''
    //             </script>";
    //         }
    //     }
    // }

    // Update Category
    if (isset($_POST['Updateorder'])) {
        $ID = $_POST['orderid'];
        $bookName = $_POST['bookname'];
        $qty = $_POST['quantity'];
        $Payment = $_POST['payment'];
        $OrderDate = $_POST['orderdate'];
        $CustomerName = $_POST['custid'];
        $booktype = $_POST['booktype'];
        $locationtype = $_POST['dellocation'];
        $delcharges = $_POST['deliverycharges'];
        $BookWeight = $_POST['bookweight'];
        $chargeonweight = $_POST['deliverychargesweight'];

        echo $ID;
        $query = "update order_table set bookid ='$bookName', qty = '$qty', Payment_Method = '$Payment', 
        order_date = '$OrderDate', Custid ='$CustomerName', BookType = '$booktype', 
        Delivery_on_Location = '$locationtype', Delivery_Charges = '$delcharges', 
        Weight_of_Book_in_Kg = '$BookWeight', Charge_on_Weight ='$chargeonweight' where orderid = '$ID'";
       
        $res = mysqli_query($con, $query) or die("Query Failed");
        echo $res;
        if ($res) {
            echo "
            <script> alert('Data Updated');
            window.location.href='../Order.php';
            </script>";
        }
         else {
            echo "<script> alert('Data Insertion Failed');            
            window.location.href='../Orders.php';
            </script>";
        }
    }

    



//Insert data into Order Table
if(isset($_POST['btn'])){
    $bookName = $_POST['bookname'];
    $qty = $_POST['qty'];
    $Payment = $_POST['payment'];
    $OrderDate = $_POST['orderdate'];
    $CustomerName = $_POST['CustName'];
    $booktype = $_POST['booktype'];
    $locationtype = $_POST['dellocation'];
    $delcharges = $_POST['deliverycharges'];
    $BookWeight = $_POST['bookweight'];
    $chargeonweight = $_POST['deliverychargesweight'];
    $cart = $_POST['cartid'];

    echo $CustomerName;
    if($locationtype == ""){
        echo "<script>window.location.href='../Order.php?fill=1';</script>";
    }

    $querydata = "insert into order_table(bookid,qty,Payment_Method,order_date,Custid,BookType,Delivery_on_Location,Delivery_Charges,Weight_of_Book_in_Kg,Charge_on_Weight) values('$bookName','$qty','$Payment','$OrderDate','$CustomerName','$booktype','$locationtype','$delcharges','$BookWeight','$chargeonweight')";
    $runquery = mysqli_query($con, $querydata);
    @$_SESSION['InsertOrder'] = $runquery;
    
    if($runquery){
        $DelID = $_POST['cartid'];
        $quer = "delete from cart where Cartid = '$DelID'";
        $res = mysqli_query($con, $quer);
        echo $res;
        if ($res) {
        }
        mysqli_close($con);
            // Delete Category
            echo "<script>
            window.location.href='../Order.php?done=1';</script>";

    }
    else{
        echo "<script>alert('Data insertion failed!')</script>";
    }   
}
// else{
//     echo "<script>alert('Please fill the Delivery Location where you want deliver a book.')</script>";
// }






?>