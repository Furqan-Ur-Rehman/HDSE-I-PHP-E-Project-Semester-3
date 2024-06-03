<?php 
    include 'Connection.php';

    // Add Category
    if (isset($_POST['AddCompetititon'])) {
        $CompName =  $_POST['compname'];
        $Topic =  $_POST['topic'];
        $startdate =  $_POST['startdate'];
        $passingmarks =  $_POST['passingmarks'];
        $totalmarks =  $_POST['totalmarks'];

        $CheckCategory = "select * from competition where comp_name = '$CompName'";

        $query = mysqli_query($con, $CheckCategory);
        $Catrgories = mysqli_num_rows($query);

        if($Catrgories){
            echo "
            <script>
            window.location.href = '../Compitition.php?exist=1';
            </script>";
        }
        else{
            $InsertQuery = "insert into competition (comp_name, Topics, start_date, Passing_Marks, Total_Marks) VALUES ('$CompName', '$Topic', '$startdate', '$passingmarks', '$totalmarks')";
            $Check = mysqli_query($con, $InsertQuery);
            if($Check){
                echo "
                <script>
                window.location.href = '../Compitition.php?added=1';
                </script>";
            }
            else{
                echo "
                <script>
                alert('Data Insertion Failed !!!');
                window.location.href = '../Compitition.php''
                </script>";
            }
        }
    }

    // Update Category
    if (isset($_POST['UpdateCompetititon'])) {
        $Id =  $_POST['competitionid'];
        $CompName =  $_POST['compname'];
        $Topic =  $_POST['topic'];
        $startdate =  $_POST['startdate'];
        $passingmarks =  $_POST['passingmarks'];
        $totalmarks =  $_POST['totalmarks'];

        $query = "update competition set comp_name='$CompName', Topics='$Topic', start_date='$startdate', Passing_Marks='$passingmarks', Total_Marks='$totalmarks'  where compid = '$Id'";
       
        $res = mysqli_query($con, $query) or die("Query Failed");
        if ($res) {
            echo "
            <script>
            window.location.href='../Compitition.php?updated=1';
            </script>";
        }
         else {
            echo "<script> alert('Data Insertion Failed');            
            window.location.href='../Compitition.php';
            </script>";
        }
    }

    // Delete Category
    $DelID = $_GET['Delid'];
    $quer = "delete from competition where compid = $DelID";
    $res = mysqli_query($con, $quer);
    echo $res;
    if ($res) {
    echo "
    <script>
    window.location.href = '../Compitition.php';
    </script>";
    }
    mysqli_close($con);
?>