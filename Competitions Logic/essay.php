<?php 
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="style.css" rel="stylesheet"> -->
</head>
<body>

    <?php  
    
    
    if(isset($_POST['sub'])){
        if($_POST['text'] != ""){
            $data = $_POST['text'];
                       
            $folder = "Competitions/".$_SESSION['DatabaseName'].$_SESSION['Cust_id']." " .'competition.txt';
            $filename = $_SESSION['DatabaseName'].$_SESSION['Cust_id']. " " .'competition.txt';
            if(!file_exists($folder)){
                touch($_SESSION['DatabaseName'].$_SESSION['Cust_id']. " " .'competition.txt');
                $f = fopen($_SESSION['DatabaseName'].$_SESSION['Cust_id']. " " . "competition.txt","a");
                fwrite($f, "$data");
                fclose($f);
                rename($filename,"Competitions/$filename");
                echo "<script>alert('Your Essay Successfully Submitted via text file in server'); window.location.href='../index.php';</script>";
            }
            else{
                echo "<script>alert('file already exist'); window.location.href='../index.php';</script>";
            }
        }
        else{
            echo "<script>alert('Your fields are empty.'); window.location.href='Compitition.php';</script>";
        }        
    }    
    ?>
    <!-- <div class="container ml-auto" oncontextmenu="return false;" oncopy="return false;">
        <form action="" method="post">
            <input type="number" name="userid" disabled placeholder="Enter Your id">
            <input type="text" name="username" placeholder="Enter Your Name">
            <textarea name="text" id="" cols="80" rows="20"></textarea><br>
            <input type="submit" value="Submit" name="btn">
            
        </form>
    </div> -->
    
   
</body>
</html>