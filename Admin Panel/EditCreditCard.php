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
$query = "select * from credit_card
INNER JOIN customer on customer.custid = credit_card.custid
where cardid = $ID";
$GetData = mysqli_query($con, $query);
$catdata = mysqli_fetch_assoc($GetData); 
?>
<div class="blurbg" id="bgblur" style="display: ;"></div>

<div class="AddcategoryModal" id="UpdatecategoryModal" style="display: ;">
    <svg xmlns="http://www.w3.org/2000/svg" onclick="window.location.href = 'CreditCardDetail.php';" fill="currentColor"
        class="bi bi-x" viewBox="0 0 16 16">
        <path
            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
    </svg>
    <form action="Operations/CreditCard_Crud.php" method="post">
        <div class="form-group">
            <input type="hidden" name="cardid" value="<?= $catdata['cardid']?>" class="form-control logininput">
            
            <label>Customer Name</label>
            <select class="form-control logininput" required id="customername" name = "customername">
                        <option value="<?= $catdata['custid'] ?>"><?= $catdata['Name'] ?></option>
                       <?php 
                       $customerquery = "select * from customer";
                       $runcustomerquery = mysqli_query($con, $customerquery);
                       while($row = mysqli_fetch_assoc($runcustomerquery)): ?>
                        <option value="<?php echo $row['custid']; ?>"><?php echo $row['Name']; ?></option>
                        <?php endwhile; ?>
            </select>

            <label>Card Number</label>
            <input type="text" name="cardnumber" class="form-control logininput" required id="cardnumber" value="<?= $catdata['cardnumber'] ?>">
            

            <label>Date of Expiry</label>
            <input type="date" name="DateofExpiry" class="form-control logininput" required id="dateofexpiry" value="<?= $catdata['Date_of_Expiry'] ?>">

            <label>Title of A/C</label>
            <input type="text" required name="Titleofac" id="TitleofAC" value="<?= $catdata['Title_of_Ac']?>" class="form-control logininput">
            
            <button type="submit" name="updatecreditcard" class="btn btn-primary form-control mt-2"
                style="background-color:#5271ff;">Update</button>
        </div>
    </form>
</div>
   
    