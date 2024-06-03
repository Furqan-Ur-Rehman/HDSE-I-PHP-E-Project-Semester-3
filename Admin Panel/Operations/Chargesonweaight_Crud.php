<?php 
    include 'Connection.php';

    // Add Category
    if (isset($_POST['addchargesonweight'])) {
        $Charges = $_POST['charges'];
        $Weight = $_POST['weight'];

            $InsertQuery = "insert into charge_on_weight (charge, Weightid) values ('$Charges','$Weight')";
            $Check = mysqli_query($con, $InsertQuery);
            if($Check){
                echo "
                <script>
                window.location.href = '../Chargeonweight.php?added=1';
                </script>";
            }
            else{
                echo "
                <script>
                alert('Data Insertion Failed !!!');
                window.location.href = '../Chargeonweight.php';
                </script>";
            }
        }
    


    // Delete Category
    $DelID = $_GET['Delid'];
    $quer = "delete from charge_on_weight where kgid = $DelID";
    $res = mysqli_query($con, $quer);
    echo $res;
    if ($res) {
    echo "
    <script>
    window.location.href = '../Chargeonweight.php?deleted=1';
    </script>";
    }
    mysqli_close($con);
?>