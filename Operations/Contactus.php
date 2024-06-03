<?php include 'Connection.php'; ?>
<?php session_start(); ?>

<?php if (isset($_POST['sendmsg'])) {
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Message = $_POST['message'];

        $query = "insert into contactpage_table (Name, Email, Message) VALUES ('$Name','$Email','$Message')";
        $res = mysqli_query($con, $query) or die("Query Failed");
        if ($res) {
            echo "
            <script>
            window.location.href='../Contact.php?sended=1';
            </script>";
        }
         else {
            echo "<script>;            
            window.location.href='../Contact.php';
            </script>";
        }
    }