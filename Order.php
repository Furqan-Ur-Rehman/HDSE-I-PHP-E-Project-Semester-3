<?php 
include 'Operations/Connection.php';
include 'Layout/header.php';
include 'Layout/cart.php';
?>
<?php
$query = "select * from booktype";
$queryrun = mysqli_query($con, $query);

$bookquery = "select * from books";
$runbookquery = mysqli_query($con, $bookquery);
$Names = $_SESSION['DatabaseName']; 
$cartquery = "select * from cart
INNER JOIN books on books.Bookid = cart.Bookid
where Customer = '$Names'";

$runcartquery = mysqli_query($con, $cartquery);


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

?>

<div class="row page">

    <div class="col-12 p-2" style=" margin-top: 120px;">
        <div class="box">
            <h1 style="text-align:center; font-size: 25px;">ORDER SUMMARY</h1>
            <div class="categoryTable">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Book Id</th>
                            <th scope="col">Book Image</th>
                            <th scope="col">Book Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $CurrentCustomer = $_SESSION['DatabaseName']; 
                            $query = "select * from cart
                            INNER JOIN books on books.Bookid = cart.Bookid
                            where Customer = '$CurrentCustomer'";
                            $res = mysqli_query($con, $query);
                                 while ($data = mysqli_fetch_assoc($res)) { 
                                 echo '<tr>';
                                 ?>
                        <td><?= $data['Bookid'] ?></td>
                        <td> <img src="Admin Panel/Admin Panel/<?= $data['Image']?>" style="width: 50px;"></td>
                        <td><?= $data['Book_Name'] ?></td>
                        <td><?= $data['Price'] ?></td>
                        <td><?= $data['Qty'] ?></td>

                        <td><a href="Operations/Cart_Crud.php?Delid=<?= $data['Cartid'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                </svg></a>
                        </td>
                        <?php
                            echo '</tr>';
                                 }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-12 p-2" style=" margin-top: 10px;">
        <div class="box">
            <h1 style="text-align:center; font-size: 25px;">ORDER DETAILS</h1>
            <div class="blurbg" id="bgblur" style="display: none;"></div>

    <form action="Operations/Orders_Crud.php" method = "post">
        <div class="form-group row p-4">
            <?php
            $asss = "select * from cart
            INNER JOIN books on books.Bookid = cart.Bookid
            where Customer = '$Names'
            ";                        
            $ddd = mysqli_query($con, $asss);  
            $asd = mysqli_fetch_assoc($ddd)           
            ?>
            <input type="hidden" value="<?php echo $asd['Cartid']; ?>" name="cartid">
                <input type="hidden"  name = "CustName" id="" value="<?php echo @$_SESSION['Cust_id']; ?>">                 
                <label for="city" class="col-3">Select Cart Book</label>
                <select class="form-control logininput col-9 mb-2" id="BookName" name = "bookname">
                    <option selected disabled>Select Book</option>
                   <?php while($row = mysqli_fetch_assoc($runcartquery)): ?>
                    <option value="<?php echo $row['Bookid']; ?>"><?php echo $row['Book_Name']; ?></option>
                    <?php endwhile; ?>
                </select>
          
                    <label for="" class="col-3" >Quantity:</label>
                    <input type="number" name="qty" id="EmpFName" placeholder="Enter Qty of Book required" class="form-control logininput col-9 mb-2">

                    <label for="photo" class="col-3">Order Date:</label>
                    <input type="date" class="form-control logininput col-9 mb-2" id="orderdate" name="orderdate">

                    <label for="" class="col-3">Payment_Method:</label>
                        <select class="form-control logininput col-9 mb-2" name="payment" id="paymentmethod">
                        <option value="">Select Payment Method</option>
                        <?php while($row = mysqli_fetch_assoc($runpaymentquery)): ?>
                        <option value="<?php echo $row['PaymentId']; ?>"><?php echo $row['PaymentMethod']; ?></option>
                        <?php endwhile; ?>                        
                        </select>

                    <label for="city" class="col-3">Select BookType:</label>
                    <select class="form-control logininput col-9 mb-2" id="Booktype" name = "booktype">
                        <option selected disabled>Select BookType</option>
                        <?php while($row = mysqli_fetch_assoc($queryrun)): ?>
                        <option disabled value="<?php echo $row['Typeid']; ?>"></option>
                        <?php endwhile; ?>
                    </select>


                    <label for="city" class="col-3">Select Delivery Locations:</label>
                <select class="form-control logininput col-9 mb-2" require id="delivery" name ="dellocation">
                    <option require selected disabled value="">Select Delivery Area</option>           
                </select>



                <label for="city" class="col-3">Select Book Weight(in KG):</label>
                <select class="form-control logininput col-9 mb-2" id="BookWeight" name ="bookweight">
                    <option selected  value="">Select Book Weight</option>
                    <?php while($row = mysqli_fetch_assoc($runweight)): ?>
                        <option  value="<?php echo $row['weightid']?>"></option> 
                       <?php endwhile; ?>
                </select>
                <h1 class="col-12" style="font-size: 23px;margin-top:40px;margin-bottom:40px;">DELIVERY CHARGES INFORMATION</h1>
                <label for="city" class="col-3">Delivery Charges on Weight</label>
                <select  class="form-control logininput col-9 mb-2 bg-dark" id="deliveryweight" name ="deliverychargesweight" style="color:white;">
                    <option selected  value=""></option>
                    <?php while($row = mysqli_fetch_assoc($rundelcharges)): ?>
                        <!-- <option value=""></option>  -->
                       <?php endwhile; ?>
                </select>
                <label for="city" class="col-3">Delivery Charges </label>
                <select  class="form-control logininput col-9 mb-2 bg-dark" id="deliverychar" name ="deliverycharges" style="color:white;">
                    <option selected  value=""></option>
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
                                                              <input type="text" class="form-control" placeholder="789 456 123 698" id="cardnumber" name="cardnumber">
                                                          </div>                
                                                  </div>
                                                  <div class="col-md-6">                    
                                                          <div class="form-group mt-2">
                                                              <label for="" class="mb-1">Date of Expiry:</label>
                                                              <input type="date" class="form-control" id="dateofexpiry" name="dateofexpiry">
                                                          </div>                
                                                  </div>
                                              </div>

                                              <div class="row">
                                                  <div class="col-md-6">                    
                                                          <div class="form-group mt-2">
                                                              <label for="" class="mb-1">Title of Account:</label>
                                                              <input type="text" class="form-control" placeholder="Enter Your A/c Name" id="titleofac" name="titleofAc">
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
                                                              <input type="text" class="form-control" placeholder="Customer Name" disabled value="<?php echo @$_SESSION['CustName'];?>" name="<?php echo @$_SESSION['Cust_id'];?>">               
                                                              
                                                          </div>               
                                                      </div>

                                                      <div class="col-md-6">                    
                                                              <div class="form-group mt-2">
                                                                  <label for="" class="mb-1">Contact No:</label>
                                                                  <input type="text" class="form-control" placeholder="Enter Your Contact No" id="contactno" name="contactno">
                                                              </div>                
                                                      </div>
                                                  
                                                  </div>

                                                  <div class="row">
                                                      

                                                      <div class="col-md-12">                    
                                                              <div class="form-group mt-2">
                                                                  <label for="" class="mb-1">Postal Address:</label>
                                                                  <textarea id="postaladdress" name="PostalAddress" class="form-control" cols="30" rows="10"></textarea>
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

          <button type="submit" name="btn" class="btn btn-primary form-control mt-2" style="background-color:grey; border: none;">CONFIRM BOOK ORDER</button>
        </div>
    </form>
</div>
    <div class="alert alert-success" role="alert" id="added" style="position:fixed; bottom:0px; right: 20px; display: none; box-shadow: 3px 3px 3px 2px rgba(0, 0, 0, 0.126);">
    Your Order has been <b>Confirmed</b> Sucessfully!
</div>
<div class="alert alert-warning" role="alert" id="fill" style="position:fixed; bottom:0px; right: 20px; display: none; box-shadow: 3px 3px 3px 2px rgba(0, 0, 0, 0.126);">
    Please Complete Order Information First!
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script>
    // BookType
    $('#BookName').on('change',function(){
        var booknameid = this.value;
        console.log(booknameid);
        $.ajax({
            url: 'Admin Panel/Bookname.php',
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
            url: 'Admin Panel/BookWeight.php',
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
            url: 'Admin Panel/dropdown.php',
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
            url: 'Admin Panel/delivery_charges.php',
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
            url: 'Admin Panel/ChargesonWeight.php',
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
                                    url: 'Admin Panel/CreditCard.php',
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
                                    url: 'Admin Panel/Cash.php',
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
        </div>
    </div>

<?php
@
  $ID = $_GET['done'];
  if ($ID) {
    echo "<script>
  document.getElementById('added').style.display = 'block';

  const myTimeout = setTimeout(myGreeting, 5000);

  function myGreeting() {
    document.getElementById('added').style.display = 'none';
    window.location.href='Order.php';

  }
    </script>";
    }

    @$ID = $_GET['fill'];
    if ($ID) {
      echo "<script>
    document.getElementById('fill').style.display = 'block';
  
    const myTimeout = setTimeout(myGreeting, 5000);
  
    function myGreeting() {
      document.getElementById('fill').style.display = 'none';
  
    }
      </script>";
      }
    ?>