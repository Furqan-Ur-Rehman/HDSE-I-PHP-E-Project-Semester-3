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
$query = "select * from books
INNER JOIN category on category.Catid = books.cat_id
INNER JOIN dealers on dealers.dealerid = books.DealersDetail 
where Bookid = $ID";
$GetData = mysqli_query($con, $query);
$catdata = mysqli_fetch_assoc($GetData); 
?>
<div class="pageMaterial" id="pageMaterial">
<form action="Operations/Books_Crud.php" method = "post" enctype="multipart/form-data">

    <div class="Box row m-0">
        <div class="col-6 photoupload">
            <img src="BookImages/<?= $catdata['Image']?>" id="VisibleImage" required alt="">
            <input type="file" class="choosefile" id="Image" name="Image">
        </div>
        <input type="hidden" name="bookid" value="<?= $catdata['Bookid']?>">
        <div class="classform col-lg-6 col-md-12">
            <div class="form-group">
                <label for="">NAME</label>
                <input type="txt" class="form-control"  required value="<?= $catdata['Book_Name'] ?>" name="Name">
            </div>
            <div class="form-group">
                <label for="">AUTHOR NAME</label>
                <input type="txt" class="form-control" required value="<?= $catdata['Author_Name'] ?>" name="AuthorName">
            </div>
            <div class="form-group">
                <label for="">EDITION</label>
                <input type="txt" class="form-control" required value="<?= $catdata['Edition'] ?>" name="Edition">
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="txt" class="form-control" required value="<?= $catdata['Price'] ?>" name="Price">
            </div>
            <div class="form-group">
                <label for="">Delivery Details</label>
                <input type="txt" class="form-control" required value="<?= $catdata['Delivery_Details'] ?>" name="deliverydetails">
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select class="form-control" name="category" required>
                    <option value="<?= $catdata['cat_id'] ?>"><?= $catdata['category_name'] ?></option>
                    <?php
                    $fetchquery = "select * from category";
                    $query = mysqli_query($con, $fetchquery);
                    $output = "<option> Select Category </option>";
                    while($row = mysqli_fetch_assoc($query)){
                      
                        $output .= '<option name="'.$row['Catid'] .'" value="' .$row['Catid'] . '">'. $row['category_name'] . '</option>';
                    }
                    echo $output;
                ?>
                </select>
            </div>

            <div class="form-group">
                <label for="">Dealers Detail</label>
                <select class="form-control" name="dealers" required>
                <option value="<?= $catdata['dealerid'] ?>"><?= $catdata['contact'] ?></option>
                    <?php
                    $fetchquery = "select * from dealers";
                    $query = mysqli_query($con, $fetchquery);
                    $output = "<option> Select Dealers Contact </option>";
                    while($row = mysqli_fetch_assoc($query)){
                      
                        $output .= '<option value="' .$row['dealerid'] . '">'. $row['contact'] . '</option>';
                    }
                    echo $output;
                ?>
                </select>
            </div>


            <div class="form-group">
                <label for="">Book Weight</label>
                <input type="txt" class="form-control" required value="<?= $catdata['weight_in_Kg'] ?>" name="bookweight">
            </div>
            <div class="row m-0 p-0">
                <div class="col-12 m-0 p-0">
                    <button type="submit" name="updatebook" class="btn submitbutton btn-primary m-1">Update BOOK</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script>
$(document).ready(function () {


$("#Image").click(function () {
   $("#Image").trigger('click');
})

// $("#VisibleImage").click(function () {
//     $("#Image").trigger('click');
// })


$("#Image").change(function () {
    if (this.files && this.files[0]) {
        var fileReader = new FileReader();
        fileReader.readAsDataURL(this.files[0]);
        fileReader.onload = function (x) {

            $("#VisibleImage").attr('src', x.target.result);
        }
    }
})
})
</script>