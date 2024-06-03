<?php 
    include 'Connection.php';

    if (isset($_POST['AddBook'])) {
        $FileProp = $_FILES['Image'];
        $FileName = $_FILES['Image']['name'];
        $FileType = $_FILES['Image']['type'];
        $FileTempLoc = $_FILES['Image']['tmp_name'];
    
        $FileSize = $_FILES['Image']['size'];
        
        $Name = $_POST['Name'];
        $AuthorName = $_POST['AuthorName'];
        $Edition = $_POST['Edition'];
        $Price = $_POST['Price'];
        $Delivery_Details = $_POST['deliverydetails']; 
        $Category =$_POST['category'];
        $dealer =$_POST['dealers'];
        $bookweight = $_POST['bookweight'];
        

        if($FileName != ""){
            if(strtolower($FileType) == 'image/jpeg' || strtolower($FileType) == 'image/jpg' || strtolower($FileType) == 'image/png' ){
                if($FileSize <= 1000000){
                    $folder = '../BooksImages/'. $FileName;
                    $folders = $folder;
                    if(file_exists($folder)){
                        echo "<script>alert('Image already Exists in the Folder.')</script>";
                    }
                
                    else{
                        if(move_uploaded_file($FileTempLoc, $folder)){
                            echo "<script>alert('Image Inserted Successfully!')</script>";
                        }
                        else{
                            echo "<script>alert('Image Insertion Failed.')</script>";
                        }
                    }
                    
                        //Images Work End Here
                    
                        $InsertQuery = "insert into books ( Book_Name, Image, Author_Name, Edition, Price, Delivery_Details, weight_in_Kg, DealersDetail, cat_id) 
                        values ('$Name','$folders', '$AuthorName', '$Edition', '$Price' ,'$Delivery_Details' ,'$bookweight' , '$dealer', '$Category')";
    
                        $asd = mysqli_query($con, $InsertQuery);
                        if($asd){      
                        move_uploaded_file($FileTempLoc, $folders);
                        echo "<script>alert('Data has been Inserted');window.location.href = '../Books.php?added=1'</script>";
                        }
                        else{
                            echo "<script>alert('Data Insertion Failed !!!');window.location.href = 'Books.php'</script>";
                        }
                }
                else{
                     echo "<script>alert('Your Image Size should be less than or equal to 1MB.'); window.location.href = '../Books.php';</script>";
                }
            }
            else{
                    echo "<script>alert('Your Image Format is not Supported.'); window.location.href = '../Books.php';</script>";
                }
    
        }
        else{
            echo "<script>alert('You dont Select an Image.'); window.location.href = '../Books.php';</script>";
        }
    } 

    // Update Category
    if (isset($_POST['updatebook'])) {

        // $FileProp = $_FILES['Image'];
        $FileName = $_FILES['Image']['name'];
        $FileType = $_FILES['Image']['type'];
        $FileTempLoc = $_FILES['Image']['tmp_name'];
        $FileSize = $_FILES['Image']['size'];
    
        $Id = $_POST['bookid'];
        $Name = $_POST['Name'];
        $AuthorName = $_POST['AuthorName'];
        $Edition = $_POST['Edition'];
        $Price = $_POST['Price'];
        $Delivery_Details = $_POST['deliverydetails'];
        $Category =$_POST['category'];
        $dealer =$_POST['dealers'];
        $bookweight = $_POST['bookweight'];

        

        //Images work start here
        if($FileName != ""){
            if(strtolower($FileType) == 'image/jpeg' || strtolower($FileType) == 'image/jpg' || strtolower($FileType) == 'image/png' ){
                if($FileSize <= 1000000){
                    $folder = '../BooksImages/'. $FileName;
                    $folders = $folder;
                    if(file_exists($folder)){
                        echo "<script>alert('Image already Exists in the Folder.')</script>";
                        
                    }
                
                    else{
                        if(move_uploaded_file($FileTempLoc, $folder)){
                            echo "<script>alert('Image Updated Successfully!')</script>";
                        }
                        else{
                            echo "<script>alert('Image Updation Failed.')</script>";
                        }
                    }
                    
                        //Images Work End Here
                    
                        $query = "update books set Book_Name='$Name', Image='$folders', Author_Name='$AuthorName', Edition='$Edition', Price='$Price',Delivery_Details ='$Delivery_Details', weight_in_Kg='$bookweight', DealersDetail='$dealer', cat_id='$Category' where Bookid = '$Id'";
                        $res = mysqli_query($con, $query) or die("Query Failed");
                        if ($res) {
                            echo "
                            <script>
                            alert('Data Updated Successfully!'); 
                            window.location.href='../Books.php?updated=1';
                            </script>";
                        }
                         else {
                            echo "<script> alert('Data Updation Failed');            
                            window.location.href='../Books.php';
                            </script>";
                        }
                }
                else{
                     echo "<script>alert('Your Image Size should be less than or equal to 1MB.'); window.location.href = '../Books.php';</script>";
                }
            }
            else{
                    echo "<script>alert('Your Image Format is not Supported.'); window.location.href = '../Books.php';</script>";
                }
    
        }
        else{
        
            $query = "update books set Book_Name='$Name', Author_Name='$AuthorName', Edition='$Edition', Price='$Price',Delivery_Details ='$Delivery_Details', weight_in_Kg='$bookweight', DealersDetail='$dealer', cat_id='$Category' where Bookid = '$Id'";
            $res = mysqli_query($con, $query) or die("Query Failed");
            echo "<script>alert('Image is not Updated!')</script>";
                if ($res) {
                echo "
                <script>
                alert('Data Updated Successfully!'); 
                window.location.href='../Books.php?updated=1';
                </script>";
                }
                else {
                echo "<script> alert('Data Updation Failed');            
                window.location.href='../Books.php';
                </script>";
                }
        }
    }
    

    // Delete Category
    $DelID = $_GET['Delid'];
    $quer = "delete from books where Bookid = '$DelID'";
    $res = mysqli_query($con, $quer);
    echo $res;
    if ($res) {
    echo "
    <script>
    alert('Data Deleted!!');
    window.location.href = '../Books.php?deleted=1';
    </script>";
    }
    mysqli_close($con);
?>