<?php
session_start();
if ($_SESSION['DatabaseRole'] == 'Admin') {
} 
else {
    echo "<script>window.location.href = '../index.php'</script>";
}
include 'Layout/sidebar.php';
include 'Layout/header.php';
include 'Operations/Connection.php';
?>
<?php
$ID = $_GET['viewid'];
$query = "select * from order_table
            INNER JOIN customer on customer.custid = order_table.Custid
            INNER JOIN books on books.Bookid = order_table.bookid
            INNER JOIN payment_method on payment_method.PaymentId = order_table.Payment_Method
            INNER JOIN booktype on booktype.Typeid = order_table.BookType
            INNER JOIN deliverylocation on deliverylocation.Locationid = order_table.Delivery_on_Location
            INNER JOIN delivery_charges on delivery_charges.chargeid = order_table.Delivery_Charges
            INNER JOIN book_weight on book_weight.weightid  = order_table.Weight_of_Book_in_Kg 
            INNER JOIN charge_on_weight on charge_on_weight.kgid  = order_table.Charge_on_Weight 

            where order_table.orderid = $ID
            ";
$GetData = mysqli_query($con, $query);
$Data = mysqli_fetch_assoc($GetData); 
?>
<div class="pageMaterial" id="pageMaterial">
    <div class="Box">
            <div class="categoryTable">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Order Id</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Book</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Payment Method</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $querys = 'select * from order_table 
                    INNER JOIN customer on customer.custid = order_table.Custid
                    INNER JOIN books on books.Bookid = order_table.bookid
                    INNER JOIN payment_method on payment_method.PaymentId = order_table.Payment_Method
                    ';
                    $res = mysqli_query($con, $querys);
                    while ($data = mysqli_fetch_assoc($res)) {
                    echo '<tr>'; ?>  
                      <th scope="row"><?= $data['orderid'] ?></th>
                      <td><?= $data['Name'] ?></td>
                      <td><?= $data['Book_Name'] ?></td>
                      <td><?= $data['qty'] ?></td> 
                      <td><?= $data['PaymentMethod'] ?></td>

                      <td><a href="Operations/Orders_Crud.php?Delid=<?= $data['orderid'] ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                      </svg></a>
                      <a href="Edit_Dealers.php?Updid=<?= $data['orderid'] ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" onclick="openupdatecat()" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg></a>
                      <a href="View_Account.php?viewid=<?= $data['orderid'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                <path
                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                            </svg></a>
                      </td>
                    <?php echo '</tr>';
                    } ?>
                  </tbody>
                </table>
                <div>
    </div>
</div>


   
<div class="blurbg" id="bgblur" style="display: ;"></div>

<div class="AddcategoryModal" id="AddcategoryModal" style="display: ;">
    <svg xmlns="http://www.w3.org/2000/svg" onclick="window.location.href = 'Orders.php';" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
    </svg>
    <form action="Operations/Account_Crud.php" method = "post">
        <div class="Viewaccount form-group row">
            <h1 class="col-12" style="padding-bottom: 5px; COLOR:#5271ff;">
                View <span style="color:rgba(31, 31, 31, 0.719);">ORDER<span>
            </h1>
            <label class="col-3">Order No.</label>
            <input type="text" disabled value = "<?= $Data['orderid']?>" name="customerid" class="form-control logininput col-2 mb-2">
            
            <label class="col-3"  style="text-align: center;">Order Date</label>
            <input type="date" disabled value = "<?= $Data['order_date']?>" name="orderdate" class="form-control logininput col-4 mb-2">

            <label class="col-3" >Customer</label>
            <input type="text" disabled value = "<?= $Data['Name']?>" name="name" class="form-control logininput col-9 mb-2">

            <label class="col-3">Book</label>
            <input type="text" disabled value = "<?= $Data['Book_Name']?>" name="bookname" class="form-control logininput col-9 mb-2">

            <label class="col-3">Quantity</label>
            <input type="text" disabled value = "<?= $Data['qty']?>" name="quantity" class="form-control logininput col-9 mb-2">

            <label class="col-3">Book Type</label>
            <input type="text" disabled value = "<?= $Data['Type']?>" name="type" class="form-control logininput col-9 mb-2">

            <label class="col-3">Delivery Type</label>
            <input type="text" disabled value = "<?= $Data['Location']?>" name="deliverytype" class="form-control logininput col-9 mb-2">
            
            <label class="col-3">Delivery Charges</label>
            <input type="text" disabled value = "<?= $Data['Charge_Amount']?>" name="deliverycharges" class="form-control logininput col-9 mb-2">
            
            <label class="col-3">Book Weight</label>
            <input type="text" disabled value = "<?= $Data['weight']?>" name="bookweight" class="form-control logininput col-9 mb-2">
            
            <label class="col-3">Charge On Kg</label>
            <input type="text" disabled value = "<?= $Data['charge']?>" name="bookweight" class="form-control logininput col-9 mb-2">
        </div>
    </form>
</div>