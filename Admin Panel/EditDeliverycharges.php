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
$ID = $_GET['Updid'];
$query = "select * from delivery_charges
INNER JOIN deliverylocation on deliverylocation.Locationid = delivery_charges.Delivery_Location
where chargeid = $ID";
$GetData = mysqli_query($con, $query);
$catdata = mysqli_fetch_assoc($GetData); 
?>
<div class="blurbg" id="bgblur" style="display: ;"></div>

<div class="AddcategoryModal" id="UpdatecategoryModal" style="display: ;">
    <svg xmlns="http://www.w3.org/2000/svg" onclick="window.location.href = 'Delivery_Locationmain.php';" fill="currentColor"
        class="bi bi-x" viewBox="0 0 16 16">
        <path
            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
    </svg>
    <form action="Operations/Deliverycharges_Crud.php" method="post">
        <div class="form-group">
            <input type="hidden" name="chargeid" value="<?= $catdata['chargeid']?>" class="form-control logininput">
            
            <label>Book Name</label>
            <input type="text" name="Bookname" class="form-control logininput" required id="bookname" value="<?= $catdata['BookName'] ?>">
            
            
            <label>Book Type</label>
            <input type="text" name="booktype" class="form-control logininput" required id="Booktype" value="<?= $catdata['Booktype'] ?>">
            

            <label>Delivery Location</label>
            <select name="deliverylocation" class="form-control logininput" id="Deliverylocation">
                <option value="<?= $catdata['Locationid'] ?>"><?= $catdata['Location'] ?></option>
                <?php 
                       $deliverylocquery = "select * from deliverylocation";
                       $rundeliveryquery = mysqli_query($con, $deliverylocquery);
                       while($row = mysqli_fetch_assoc($rundeliveryquery)): ?>
                        <option value="<?php echo $row['Locationid']; ?>"><?php echo $row['Location']; ?></option>
                        <?php endwhile; ?>
            </select>

            <label>Charge Amount</label>
            <input type="text" required name="Chargeamount" id="chargeamount" value="<?= $catdata['Charge_Amount']?>" class="form-control logininput">
            
            <button type="submit" name="updatedeliverycharges" class="btn btn-primary form-control mt-2"
                style="background-color:#5271ff;">Update</button>
        </div>
    </form>
</div>
   
    