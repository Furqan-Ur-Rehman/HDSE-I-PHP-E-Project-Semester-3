
<!-- CartBox -->
<div id="alerts"></div>
<div class="cartbox-blur" id="cartboxbackblur" style="opacity: 0; width: 0px;">
</div>
<div class="CartBox" id="cartBox"  style="margin-right: -650px;">
    <div class="Cartbox-Header" >
        <h1>Order Summary</h1>
        <div class="closecartbox" onclick="closecartbox()">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="24" fill="currentColor" class="bi bi-x-lg"
                viewBox="0 0 16 16">
                <path
                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
            </svg>
        </div>
    </div>
    <div class="cartbox-body">
    <?php
    @
        $CurrentCustomer = $_SESSION['DatabaseName']; 
        $query = "select * from cart
        INNER JOIN books on books.Bookid = cart.Bookid
        where Customer = '$CurrentCustomer'";
        $res = mysqli_query($con, $query);
             while ($data = mysqli_fetch_assoc($res)) { ?>
        <div class="cartproduct">
            <div class="cartproductimage col-2">
                <img src="Admin Panel/Admin Panel/<?= $data['Image']?>" alt="">
            </div>
            <div class="col-6 cartproductDetails " style="line-height: 35px;">
                <h1><?= $data['Book_Name'] ?></h1>
                <h2><?= $data['Price'] ?></h2>
            </div>
            <div class="productQuantity col-2">
                <input type="number" value="<?= $data['Qty'] ?>"></input>
            </div>

            <div class="cartproductdelete col-2">
            <a href="Operations/Cart_Crud.php?Delid=<?= $data['Cartid'] ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" style="padding:17px;" width="100%"
                    height="100%" class="bi bi-trash" viewBox="0 0 16 16">
                    <path
                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd"
                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>
             </a>
            </div>
        </div>
        <?php
        }?>
    </div>
    <?php
       @ $CurrentCustomer = $_SESSION['DatabaseName']; 
        if($CurrentCustomer){
        echo '<a class="cartcheckout"  href="Order.php">ORDER NOW</a>';
        }
        else{
            echo '<a class="cartcheckout" href="#">ORDER NOW</a>';
        }
    ?>


</div>
