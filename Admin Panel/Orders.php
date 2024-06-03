<?php
include "../Operations/Connection.php";
session_start();

include 'Layout/sidebar.php';
include 'Layout/header.php';
include 'Operations/Connection.php';

$query = "select * from booktype";
$queryrun = mysqli_query($con, $query);

$bookquery = "select * from books";
$runbookquery = mysqli_query($con, $bookquery);

$creditquery = "select * from credit_card";
$runcreditquery = mysqli_query($con, $creditquery);

$cashquery = "select * from cash_on_delivery";
$runcashquery = mysqli_query($con, $cashquery);

$custquery = "select * from customer";
$runcustquery =mysqli_query($con, $custquery);
$row = mysqli_fetch_assoc($runcustquery);


$weightquery = "select * from book_weight";
$runweight = mysqli_query($con, $weightquery);

$paymentquery = "select * from payment_method";
$runpaymentquery = mysqli_query($con, $paymentquery);

$delcharges = "select * from charge_on_weight";
$rundelcharges = mysqli_query($con, $delcharges);




 if (@$_SESSION['DatabaseRole'] == 'Admin') { ?>

<div class="pageMaterial" id="pageMaterial">
    
    <div class="Box">
            <div class="addbutton">
                <h1 onclick="openAddModal()">ADD NEW ORDER</h1>
            </div>
            <div class="categoryTable">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Order Id</th>
                      <th scope="col">Customer Id</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Book</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Payment Method</th>
                      <th scope="col">View Invoices</th>
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
                      <td><?= $data['custid'] ?></td>
                      <td><?= $data['Name'] ?></td>
                      <td><?= $data['Book_Name'] ?></td>
                      <td><?= $data['qty'] ?></td> 
                      <td><?= $data['PaymentMethod'] ?></td>
                      
                    
                    <td>
                    <a href="Invoice Logic/invoice.php?viewid=<?= $data['custid'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                <path
                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                            </svg></a>

                    </td>
                      <td><a href="Operations/Orders_Crud.php?Delid=<?= $data['orderid'] ?>" onclick="return confirm('Are you sure you want to delete?'); return false;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                      </svg></a>
                      <a href="Edit_Orders.php?Updid=<?= $data['orderid'] ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" onclick="openupdatecat()" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg></a>
                      <a href="View_Orders.php?viewid=<?= $data['orderid'] ?>">
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

    <div class="blurbg" id="bgblur" style="display: none;"></div>

    <div class="AddcategoryModal" id="AddcategoryModal" style="display: none;">
        <svg xmlns="http://www.w3.org/2000/svg" onclick="CloseAddModal()" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>
        <form action="Operations/Orders_Crud.php" method = "post">
            <div class="form-group row">
            <h1 class="col-12" style="padding-bottom: 5px; COLOR:#5271ff;">
                ADD <span style="color:rgba(31, 31, 31, 0.719);">ORDER<span>
            </h1>        

                    <label for="" class="col-3">Customer Name:</label>                   
                    <select class="form-control logininput col-9 mb-2" required id="" name = "CustName">
                        <option selected disabled>--Select Customer Name--</option>
                       <?php 
                       $query = "select  * from customer";
                       $runcustquery = mysqli_query($con, $query);
                       while($row = mysqli_fetch_assoc($runcustquery)): ?>
                        <option value="<?php echo $row['custid']; ?>"><?php echo $row['Name']; ?></option>
                        <?php endwhile; ?>
                    </select>



                    <label for="city" class="col-3">Select Book Name:</label>
                    <select class="form-control logininput col-9 mb-2" id="BookName" required name = "bookname">
                        <option selected disabled>--Select Book Name--</option>
                       <?php while($row = mysqli_fetch_assoc($runbookquery)): ?>
                        <option value="<?php echo $row['Bookid']; ?>"><?php echo $row['Book_Name']; ?></option>
                        <?php endwhile; ?>
                    </select>
              
                        <label for="" class="col-3" >Quantity:</label>
                        <input type="number" name="qty" id="EmpFName" required placeholder="Qty of Books" class="form-control logininput col-9 mb-2">

                        <label for="photo" class="col-3">Order Date:</label>
                        <input type="date" required class="form-control logininput col-9 mb-2" id="orderdate" name="orderdate">

                        <label for="" class="col-3">Payment_Method:</label>
                            <select class="form-control logininput col-9 mb-2" required name="payment" id="paymentmethod">
                            <option value="">--Select Payment Method--</option>
                            <?php while($row = mysqli_fetch_assoc($runpaymentquery)): ?>
                            <option value="<?php echo $row['PaymentId']; ?>"><?php echo $row['PaymentMethod']; ?></option>
                            <?php endwhile; ?>                        
                            </select>

                        <label for="city" class="col-3">Select BookType:</label>
                        <select class="form-control logininput col-9 mb-2" required id="Booktype" name = "booktype">
                            <option selected disabled>--Select BookType--</option>
                            <?php while($row = mysqli_fetch_assoc($queryrun)): ?>
                            <option disabled value="<?php echo $row['Typeid']; ?>"></option>
                            <?php endwhile; ?>
                        </select>


                        <label for="city" class="col-3">Select Delivery Locations:</label>
                    <select class="form-control logininput col-9 mb-2" required id="delivery" name ="dellocation">
                        <option require selected disabled value="">--Select Delivery Locations--</option>           
                    </select>

                    <label for="city" class="col-3">Select Delivery Charges (In Rs.):</label>
                    <select class="form-control logininput col-9 mb-2" required id="deliverychar" name ="deliverycharges">
                        <option selected disabled value="">--Select Delivery Charges(In Rs.)--</option>
                    </select>

                    <label for="city" class="col-3">Select Book Weight(in KG):</label>
                    <select class="form-control logininput col-9 mb-2" required id="BookWeight" name ="bookweight">
                        <option selected disabled value="">--Select Book Weight--</option>
                        <?php while($row = mysqli_fetch_assoc($runweight)): ?>
                            <option disabled value="<?php echo $row['weightid']?>"></option> 
                           <?php endwhile; ?>
                    </select>

                    <label for="city" class="col-3">Delivery Charges on BookWeight(In Rs.):</label>
                    <select class="form-control logininput col-9 mb-2" required id="deliveryweight" name ="deliverychargesweight">
                        <option selected disabled value="">--Delivery Charges on BookWeight(In Rs.)--</option>
                        <?php while($row = mysqli_fetch_assoc($rundelcharges)): ?>
                            <!-- <option value=""></option>  -->
                           <?php endwhile; ?>
                    </select>

                      <!-- Credit Card Modal Box start here -->
                      <form action="" id="formsubmit"> 
                          <div class="modal fade" id="creditcard" role="dialog">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Credit Card Details</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <!-- alert result message -->
                                          <div id="result-message" class="alert alert-success"></div> 
                                          <div class="modal-body">
                                              <div class="container">
                                                  <div class="row">
                                                      <div class="col-md-6">                    
                                                              <div class="form-group mt-2">
                                                              <?php echo @$_SESSION['CustName']; ?>
                                                                  <label for="" class="mb-1">Card Number:</label>
                                                                  <input type="text" class="form-control" required placeholder="789 456 123 698" id="cardnumber" name="cardnumber">
                                                              </div>                
                                                      </div>
                                                      <div class="col-md-6">                    
                                                              <div class="form-group mt-2">
                                                                  <label for="" class="mb-1">Date of Expiry:</label>
                                                                  <input type="date" class="form-control" required id="dateofexpiry" name="dateofexpiry">
                                                              </div>                
                                                      </div>
                                                  </div>

                                                  <div class="row">
                                                      <div class="col-md-6">                    
                                                              <div class="form-group mt-2">
                                                                  <label for="" class="mb-1">Title of Account:</label>
                                                                  <input type="text" class="form-control" required placeholder="Enter Your A/c Name" id="titleofac" name="titleofAc">
                                                              </div>                
                                                      </div>
                                                      <div class="col-md-6">                    
                                                          <div class="form-group mt-2">
                                                              <label for="" class="mb-1">Customer Name:</label>  
                                                              <input type="text" class="form-control" placeholder="Customer Name" disabled value="<?php echo @$_SESSION['CustName'];?>" name="<?php echo @$_SESSION['Cust_id'];?>">               
                                                          </div>               
                                                      </div>
                                                  </div>
                                              </div>  
                                          </div>
                                          <div class="modal-footer">
                                                  <!--Footer-->
                                                  <div class="modal-footer float-right">
                                                      <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                                                      <button type="button" id="btncredit" value="" name="" class="btn btn-dark">Submit Payment Method</button>
                                                  </div>
                                          </div>
                                  </div>
                              </div>
                          </div>
                      </form>
                      <!-- Credit Card Modal Box End here -->

                      <!-- Through Cash Modal Box Start here -->
                      <form action="" id="submitcashform">
                          <div class="modal fade" id="cashmodal" role="dialog">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Cash Details</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <!-- alert result message -->
                                      <div id="result-msg" class="alert alert-success"></div> 
                                      <div class="modal-body">
                                                  <div class="container">
                                                      <div class="row">
                                                      <div class="col-md-6">                    
                                                              <div class="form-group mt-2">
                                                                  <label for="" class="mb-1">Customer Name:</label> 
                                                                  <input type="text" class="form-control" required placeholder="Customer Name" disabled value="<?php echo @$_SESSION['CustName'];?>" name="<?php echo @$_SESSION['Cust_id'];?>">               
                                                                  
                                                              </div>               
                                                          </div>

                                                          <div class="col-md-6">                    
                                                                  <div class="form-group mt-2">
                                                                      <label for="" class="mb-1">Contact No:</label>
                                                                      <input type="text" class="form-control" required placeholder="Enter Your Contact No" id="contactno" name="contactno">
                                                                  </div>                
                                                          </div>
                                                      
                                                      </div>

                                                      <div class="row">
                                                          

                                                          <div class="col-md-12">                    
                                                                  <div class="form-group mt-2">
                                                                      <label for="" class="mb-1">Postal Address:</label>
                                                                      <textarea id="postaladdress" required name="PostalAddress" class="form-control" cols="30" rows="10"></textarea>
                                                                  </div>                
                                                          </div>
                                                          
                                                      </div>
                                                  </div>                          
                                      </div>
                                          <div class="modal-footer">
                                                  <!--Footer-->
                                                  <div class="modal-footer float-right">
                                                  <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                                                  <button type="button" id="submitcash" class="btn btn-dark">Save Cash Details</button>
                                                  </div>
                                          </div>
                                      
                                  </div>
                              </div>
                          </div>
                      </form>
                      <!-- Through Cash Modal Box End here -->

              <button type="submit" name="btn" class="btn btn-primary form-control mt-2" style="background-color:#5271ff;">Add</button>
            </div>
        </form>
    </div>
</div>

<?php } 

elseif(@$_SESSION['DatabaseRole'] == 'Customer'){
?>
<div class="pageMaterial" id="pageMaterial">
    
    <div class="Box">
            <div class="categoryTable">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Order Id</th>
                      <th scope="col">Customer Id</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Book</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Payment Method</th>
                      <th scope="col">View Invoices</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $querys = 'select * from order_table 
                    INNER JOIN customer on customer.custid = order_table.Custid
                    INNER JOIN books on books.Bookid = order_table.bookid
                    INNER JOIN payment_method on payment_method.PaymentId = order_table.Payment_Method
                    where order_table.Custid = "'.@$_SESSION['Cust_id'].'"
                    ';
                    $res = mysqli_query($con, $querys);
                    while ($data = mysqli_fetch_assoc($res)) {
                    echo '<tr>'; ?>  
                      <th scope="row"><?= $data['orderid'] ?></th>
                      <td><?= $data['custid'] ?></td>
                      <td><?= $data['Name'] ?></td>
                      <td><?= $data['Book_Name'] ?></td>
                      <td><?= $data['qty'] ?></td> 
                      <td><?= $data['PaymentMethod'] ?></td>
                      
                    
                    <td>
                    <a href="Invoice Logic/invoice.php?viewid=<?= $data['custid'] ?>">
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

    <div class="blurbg" id="bgblur" style="display: none;"></div>

</div>

<?php } 
else {
    echo "<script>window.location.href = '../index.php'</script>";
}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script>
        // BookType
        $('#BookName').on('change',function(){
            var booknameid = this.value;
            console.log(booknameid);
            $.ajax({
                url: 'Bookname.php',
                type: "POST",
                data:{
                    bname_id: booknameid
                },
                success:function(result){
                    console.log(result);
                    $('#Booktype').html(result);
                }
            })
        });

        // BookWeight
        $('#Booktype').on('change',function(){
            var booktype_id = this.value;
             console.log(booktype_id);
            $.ajax({
                url: 'BookWeight.php',
                type: "POST",
                data:{
                    type_id: booktype_id
                },
                success:function(result){
                    console.log(result);
                    $('#BookWeight').html(result);
                }
            })
        });


        // DeliveryLocation
        $('#Booktype').on('change',function(){
            var booktype_id = this.value;
             console.log(booktype_id);
            $.ajax({
                url: 'dropdown.php',
                type: "POST",
                data:{
                    type_id: booktype_id
                },
                success:function(result){
                    console.log(result);
                    $('#delivery').html(result);
                }
            })
        });

        //Delivery Charges
        $('#delivery').on('change',function(){
            var DeliveryLoc_id = this.value;
            $.ajax({
                url: 'delivery_charges.php',
                type: "POST",
                data:{
                    Location_id: DeliveryLoc_id
                },
                success:function(result){
                       console.log(result);
                     $('#deliverychar').html(result);
                }
            })
        });

        //Weight of the Book
        $('#BookWeight').on('change', function(){
            var weightid = this.value;
            console.log(weightid);
            $.ajax({
                url: 'ChargesonWeight.php',
                type: "POST",
                data:{
                    Weight_id : weightid
                },
                success:function(result){
                    console.log(result);
                    $('#deliveryweight').html(result);
                }
            })
        });

            //Credit  Card and Cash 
            $('#paymentmethod').change(function(){
                var paymethod = this.value;
                console.log(paymethod);
                    if(paymethod == 1){
                        $("#creditcard").modal('show');
                        $('#result-message').hide();
                                $('#btncredit').click(function(){
                                    $.ajax({
                                        url: 'CreditCard.php',
                                        type: "POST",
                                        data: $('#formsubmit').serialize(),
                                        success: function(result){
                                            $('#result-message').fadeIn();
                                            $('#formsubmit').trigger("reset");
                                            $('#result-message').html(result);
                                            console.log(result);
                                            setTimeout(function(){
                                            $('#result-message').fadeOut("slow");   
                                            }, 1000);
                                            
                                        }
                                    })
                                });
                            
                    }
                    else{
                        $("#cashmodal").modal('show');
                        $('#result-msg').hide();
                            $('#submitcash').click(function(){
                                $.ajax({
                                        url: 'Cash.php',
                                        type: "POST",
                                        data: $('#submitcashform').serialize(),
                                        success: function(result){
                                            $('#result-msg').fadeIn();
                                            $('#submitcashform').trigger("reset");
                                            $('#result-msg').html(result);
                                            console.log(result);
                                            setTimeout(function(){
                                            $('#result-msg').fadeOut("slow");   
                                            }, 1000);
                                            
                                        }
                                    })
                            });
                    }
                    

                    // OR

                // if($(this).val() == 1){
                //     $("#creditcard").modal('toggle');
                // }
                // else{
                //     $("#cashmodal").modal('toggle');
                // }
            });
        
    </script>
