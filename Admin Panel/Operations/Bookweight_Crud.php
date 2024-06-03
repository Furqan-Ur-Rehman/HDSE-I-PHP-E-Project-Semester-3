

<?php 
    include 'Connection.php';

    // Add Category
if (isset($_POST['addweight'])) {
    $weight = $_POST['weight'];
    $Book = $_POST['bookname'];
    $BookType = $_POST['booktype'];

    $InsertQuery = "insert into book_weight (weight, bookid, Booktype) values ('$weight','$Book','$BookType')";
    $Check = mysqli_query($con, $InsertQuery);
    if ($Check) {
        echo "
                <script>
                window.location.href = '../Booksweightmain.php?added=1';
                </script>";
    } else {
        echo "
                <script>
                alert('Data Insertion Failed !!!');
                window.location.href = '../Booksweightmain.php';
                </script>";
    }
}



    // Delete Category
    $DelID = $_GET['Delid'];
    $quer = "delete from book_weight where weightid = $DelID";
    $res = mysqli_query($con, $quer);
    echo $res;
    if ($res) {
    echo "
    <script>
    window.location.href = '../Booksweightmain.php?deleted=1';
    </script>";
    }
    mysqli_close($con);
?>