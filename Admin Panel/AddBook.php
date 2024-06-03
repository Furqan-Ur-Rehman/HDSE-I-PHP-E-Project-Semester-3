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
<div class="pageMaterial" id="pageMaterial">
<form action="Operations/Books_Crud.php" method = "post" enctype="multipart/form-data">

    <div class="Box row m-0">

         <div class="col-6 photoupload">
         <img src="https://winaero.com/blog/wp-content/uploads/2019/09/Photos-app-icon-256-colorful.png" style="width:250px; height: 250px;" id="VisibleImage" alt="">
         <input type="file" class="choosefile" id="Image" name="Image" required>
       </div>
        <div class="classform col-lg-6 col-md-12">
            <div class="form-group">
                <label for="">NAME</label>
                <input type="txt" class="form-control" name="Name" required>
            </div>
            <div class="form-group">
                <label for="">AUTHOR NAME</label>
                <input type="txt" class="form-control" name="AuthorName" required>
            </div>
            <div class="form-group">
                <label for="">EDITION</label>
                <input type="txt" class="form-control" name="Edition" required>
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="txt" class="form-control" name="Price" required>
            </div>
            <div class="form-group">
                <label for="">Delivery Details</label>
                <input type="txt" class="form-control" name="deliverydetails" required>
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select class="form-control" name="category" required>
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
                <label for="">Dealers Contact</label>
                <select class="form-control" name="dealers" required>
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
                <input type="txt" class="form-control" name="bookweight" required>
                
            </div>
            <div class="row m-0 p-0">
                <div class="col-12 m-0 p-0">
                    <button type="submit" name="AddBook" class="btn submitbutton btn-primary m-1">ADD BOOK</button>
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