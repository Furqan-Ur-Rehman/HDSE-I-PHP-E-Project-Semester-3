<?php 
    include 'Connection.php';

    // Add Category
    if (isset($_POST['addAccount'])) {
        $DOR = $_POST['DOR'];
        $Role = $_POST['Role'];
        $Age = $_POST['Age'];
        $Name = $_POST['Name'];
        $Address = $_POST['Address'];
        $Qualification = $_POST['Qualification'];
        $Contact = $_POST['Contact'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];

        $CheckCategory = "select * from customer where Email = '$Email'";

        $query = mysqli_query($con, $CheckCategory);
        $Catrgories = mysqli_num_rows($query);

        if($Catrgories){
            echo "
            <script>
            window.location.href = '../Accounts.php?exist=1';
            </script>";
        }
        else{
            $InsertQuery = "insert into customer (Name, Role, Age, Qualification, Contact, Address, Email, Password, dateofregistration) values ('$Name','$Role','$Age','$Qualification','$Contact','$Address','$Email','$Password','$DOR')";
            $Check = mysqli_query($con, $InsertQuery);
            if($Check){
                echo "
                <script>
                window.location.href = '../Accounts.php?added=1';
                </script>";
            }
            else{
                echo "
                <script>
                alert('Data Insertion Failed !!!');
                window.location.href = '../Accounts.php';
                </script>";
            }
        }
    }

    // Update Category
    if (isset($_POST['UpdateAccount'])) {
        $Id =  $_POST['customerid'];
        $DOR = $_POST['DOR'];
        $Role = $_POST['Role'];
        $Age = $_POST['Age'];
        $Name = $_POST['Name'];
        $Address = $_POST['Address'];
        $Qualification = $_POST['Qualification'];
        $Contact = $_POST['Contact'];
        $Email = $_POST['Email'];
        $password = $_POST['password'];

        $query = "update customer set Name='$Name', Role='$Role', Age='$Age', Qualification='$Qualification', Contact='$Contact', Address='$Address', Email='$Email', Password = '$password', dateofregistration = '$DOR' where custid = '$Id'";
       
        $res = mysqli_query($con, $query) or die("Query Failed");
        if ($res) {
            echo "
            <script> 
            window.location.href='../Accounts.php?updated=1';
            </script>";
        }
         else {
            echo "<script> alert('Data Insertion Failed');            
            window.location.href='../Accounts.php';
            </script>";
        }
    }

    // Delete Category
    $DelID = $_GET['Delid'];
    $quer = "delete from customer where custid = $DelID";
    $res = mysqli_query($con, $quer);
    echo $res;
    if ($res) {
    echo "
    <script>
    window.location.href = '../Accounts.php?deleted=1';
    </script>";
    }
    mysqli_close($con);
?>