<?php include 'Connection.php'; ?>
<?php session_start(); ?>

<!-- Login -->
<?php if (isset($_POST['LoginButton'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    $CheckEmail = "select * from customer where Email =  '$Email'";

    $query = mysqli_query($con, $CheckEmail);
    $EmailFound = mysqli_num_rows($query);

    if ($EmailFound) {
        $res = mysqli_fetch_assoc($query);
        $_SESSION['DatabasePassword'] = $res['Password'];
        
        if(@$_SESSION['DatabasePassword'] == $Password){
            @$_SESSION['DatabaseName'] = $res['Name']; // echo $_SESSION['db_Name'];
            $_SESSION['Cust_id'] = $res['custid'];
            $_SESSION['CustEmail'] = $res['Email'];
            $_SESSION['CustContact'] =$res['Contact'];
            $_SESSION['DatabaseRole'] = $res['Role'];
            
            if($_SESSION['DatabaseRole'] == "Admin"){
                echo "<script>alert('Login Successfully');window.location.href = '../Admin Panel/index.php'</script>";
            }
            if($_SESSION['DatabaseRole'] == "Customer"){
                echo "<script>alert('Login Successfully');window.location.href = '../Admin Panel/index.php'</script>";
            }
            else if( $_SESSION['DatabaseRole'] == "Member"){
                echo "<script>alert('Login Successfully');window.location.href = '../Admin Panel/index.php'</script>";
            }
        }
        else{
            echo "<script>alert('Password is Incorrect'); window.location.href = '../index.php'</script>";
        }
        // header('location:Admin Panel/')
    }
    else{
        echo "<script>alert('Email is Incorrect'); window.location.href = '../index.php'</script>";
    }
} 
?>

<!-- Register -->
<?php if (isset($_POST['RegisterButton'])) {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Contact = $_POST['Contact'];
    $Address = $_POST['Address'];

    $EncreptedPassword = password_hash($Password, PASSWORD_BCRYPT);

    $CheckEmail = "select * from customer where Email = '$Email'";

    $query = mysqli_query($con, $CheckEmail);
    $EmailFound = mysqli_num_rows($query);

    if($EmailFound){
        echo "<script>alert('Email Already Exist')</script>";
    }
    else{
        $Date = date("d/m/Y");
        $Role = "Customer";
        $InsertQuery = "insert into customer (Name, Email, Password, Contact, Address, Role, dateofregistration) values ('$Name','$Email','$Password','$Contact','$Address', '$Role', '$Date')";
        $Check = mysqli_query($con, $InsertQuery);
        if($Check){
            echo "<script>alert('Data has been Inserted');window.location.href = '../index.php'</script>";
        }
        else{
            echo "<script>alert('Data Insertion Failed !!!');window.location.href = '../index.php'</script>";
        }
    }

} ?>


<?php if (isset($_POST['Logout'])) {
    session_destroy();
    echo "<script>window.location.href = '../index.php';</script>";
}
?>