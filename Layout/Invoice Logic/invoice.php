<?php 
include "../Operations/Connection.php";
session_start();

if($_SESSION['DatabaseName'] == ""){
    echo "<script>alert('Please Login first!'); window.location.href = '../../index.php';</script>";
}

$ID = $_GET['viewid'];
$query = "select * from customer where custid = $ID";
$GetData = mysqli_query($con, $query);
$catdata = mysqli_fetch_assoc($GetData); 

$ordertable = "select * from order_table INNER JOIN books on order_table.bookid = books.Bookid 
INNER JOIN payment_method on order_table.Payment_Method = payment_method.PaymentId 
INNER JOIN booktype on order_table.BookType = booktype.Typeid 
INNER JOIN delivery_charges on order_table.Delivery_Charges = delivery_charges.chargeid 
INNER JOIN charge_on_weight on order_table.Charge_on_Weight = charge_on_weight.kgid where Custid = $ID";
$runordertable = mysqli_query($con, $ordertable);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="invoice.css">
    <script src="invoice.js"></script>
</head>
<body>


    <button type="button" style="margin-left:1150px;" class="btn btn-light" onclick="printpage()">Print & Save as PDF</button>
    <div class="container mt-3 bg-white col-md-9" style="border: none; box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.5);">           
         
            <img src="Logo.png" alt="" width="300px" height="35px" style="margin-top:40px; margin-bottom:30px;">
            <span style="margin-left:45%; font-weight:bold;">Invoice Date: <span style="border-bottom:2px solid black;"> <?php echo date("d/M/Y")?></span></span>
            <h2 style="color:lightblue;">Invoice Details</h2>
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="form-group mt-2">
                    <p style="font-weight:bold; margin-bottom:2px;">Customer Name: <span style="border-bottom:2px solid black; margin-bottom:2px;"><?= $catdata['Name'] ?></span></p>
                        <!-- <input type="text" disabled placeholder="Customer Name" class="form-control"  value="<?php echo @$_SESSION['DatabaseName']; ?>" name="<?php echo @$_SESSION['Cust_id'];?>">                 -->
                        
                    </div>
                    
                    
                </div>

                <div class="col-md-12">                    
                    <div class="form-group mt-2">
                    <p style="font-weight:bold; margin-bottom:2px;">Customer Email:  <span style="border-bottom:2px solid black; margin-bottom:2px;"><?php echo @$catdata['Email']; ?></span></p>
                        <!-- <input type="text" disabled placeholder="Customer Email" class="form-control"  value="<?php echo @$_SESSION['CustEmail']; ?>" name="<?php echo @$_SESSION['Cust_id'];?>">                 -->
                        
                    </div>                   
                </div>

                <div class="col-md-12">                    
                    <div class="form-group mt-2">
                    <p style="font-weight:bold; border-bottom:3px dashed blue;">Customer Contact:    <span style="border-bottom:1px solid black; margin-bottom:2px;"> <?php echo @$catdata['Contact']; ?></span></p>
                        <!-- <input type="text" disabled placeholder="Customer Contact" class="form-control"  value="<?php echo @$_SESSION['CustContact']; ?>" name="<?php echo @$_SESSION['Cust_id'];?>">                 -->
                        
                    </div>                   
                </div>

            </div>                
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-striped table-bordered table-white">
                    <tr>
                        <th class="text-dark">Book Name</th>
                        <th class="text-dark">Order ID</th>
                        <th class="text-dark">Order Date</th>
                        <th class="text-dark">Mode of Payment</th>
                        <th class="text-dark">Book Type</th>
                        <th class="text-dark">Book Price(Rs.) (A)</th>
                        <th class="text-dark">Qty (B)</th>
                        <th class="text-dark">Delivery Charges (C)</th>
                        <th class="text-dark">Del Charges on Per BookWeight (D)</th>
                        <th class="text-dark">Total Del Charges on Books'qty (D*B = E)</th>
                        <th class="text-dark">Total Price (A*B+C+E)</th>
                    </tr>

                    
                    <?php global $total; while($ass_order = mysqli_fetch_assoc($runordertable)){ 
                        $price = @$ass_order['Price'];
                        $qty = @$ass_order['qty'];
                        $chargeamount = @$ass_order['Charge_Amount'];
                        $charge = @$ass_order['charge'];
                        $total +=  $price *  $qty + $chargeamount + $charge * $qty;
                        echo '<tr>' ?>
                        <td><?php echo @$ass_order['Book_Name'] ?></td>
                        <td><?php echo @$ass_order['orderid']  ?></td>
                        <td><?php echo @$ass_order['order_date']  ?></td>
                        <td><?php echo @$ass_order['PaymentMethod']  ?></td>
                        <td><?php echo @$ass_order['Type']  ?></td>
                        <td style="text-align:right;  font-size:18px; font-family:'Courier New', Courier, monospace" ><?php echo @$ass_order['Price']  ?></td>
                        <td style="text-align:right;  font-size:18px; font-family:'Courier New', Courier, monospace"><?php echo @$ass_order['qty']  ?></td>
                        <td style="text-align:right;  font-size:18px; font-family:'Courier New', Courier, monospace"><?php echo @$ass_order['Charge_Amount']  ?></td>
                        <td style="text-align:right;  font-size:18px; font-family:'Courier New', Courier, monospace"><?php echo @$ass_order['charge']  ?></td>
                        <td style="text-align:right;  font-size:18px; font-family:'Courier New', Courier, monospace"><?php echo  @$ass_order['charge'] * @$ass_order['qty']  ?></td>
                        <td style="text-align:right; font-weight:bold; font-size:20px; font-family:'Courier New', Courier, monospace"><?php echo @$ass_order['Price'] * @$ass_order['qty'] + @$ass_order['Charge_Amount'] + @$ass_order['charge'] * @$ass_order['qty']  ?></td>
                        <?php echo '</tr>'; } ?>
                    
                </table>
                <h4  style="margin-right:10px;">Total Amount Rs.:<span style="border-bottom:5px double black; border-top:5px double black;"><?php echo $total; ?>/-</span></h4>
            </div>
        </div>
    </div>
</body>
</html>