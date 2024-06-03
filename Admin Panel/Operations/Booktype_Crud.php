<?php 
    include 'Connection.php';

    // Add Category
if (isset($_POST['addbooktype'])) {
    $Type = $_POST['type'];
    $Book = $_POST['bookname'];

    $InsertQuery = "insert into booktype (Type, booksName) values ('$Type','$Book')";
    $Check = mysqli_query($con, $InsertQuery);
    if ($Check) {
        echo "
                <script>
                window.location.href = '../Booktype.php?added=1';
                </script>";
    } else {
        echo "
                <script>
                alert('Data Insertion Failed !!!');
                window.location.href = '../Booktype.php';
                </script>";
    }
}



    // Delete Category
    $DelID = $_GET['Delid'];
    $quer = "delete from booktype where Typeid = $DelID";
    $res = mysqli_query($con, $quer);
    echo $res;
    if ($res) {
    echo "
    <script>
    window.location.href = '../Booktype.php?deleted=1';
    </script>";
    }
    mysqli_close($con);
?>