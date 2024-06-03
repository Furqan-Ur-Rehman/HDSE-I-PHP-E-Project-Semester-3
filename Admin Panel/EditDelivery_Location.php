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
$query = "select * from deliverylocation
INNER JOIN booktype on booktype.Typeid = deliverylocation.Loc_on_booktype
where Locationid = $ID";
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
    <form action="Operations/Deliverylocation_Crud.php" method="post">
        <div class="form-group">
            <input type="hidden" name="LocationId" value="<?= $catdata['Locationid']?>" class="form-control logininput">
            
            <label>Location</label>
            <input type="text" name="locations" class="form-control logininput" required id="Location" value="<?= $catdata['Location'] ?>">
            

            <label>Book Type</label>
            <select class="form-control logininput" required id="Booktype" name = "booktype">
                        <option value="<?php echo $catdata['Typeid']; ?>"><?php echo $catdata['Type']; ?></option>
                       <?php 
                       $bookquery = "select * from booktype";
                       $runbookquery = mysqli_query($con, $bookquery);
                       while($row = mysqli_fetch_assoc($runbookquery)): ?>
                        <option value="<?php echo $row['Typeid']; ?>"><?php echo $row['Type']; ?></option>
                        <?php endwhile; ?>
            </select>

            <label>Book Name</label>
            <input type="text" required name="bookname" id="Bookname" value="<?= $catdata['BooksName']?>" class="form-control logininput">
            <button type="submit" name="updatedeliverylocation" class="btn btn-primary form-control mt-2"
                style="background-color:#5271ff;">Update</button>
        </div>
    </form>
</div>
   
    